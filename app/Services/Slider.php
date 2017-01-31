<?php

namespace App\Service;


use App\Models\Slider as SliderModel;
use App\Models\SliderItem;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use File;

class Slider
{
    use DatatableParameters;

    protected $baseUrl = 'slider';
    /**
     * @var
     */
    private $languageService;

    /**
     * Slider constructor.
     * @param Language $languageService
     */
    public function __construct(Language $languageService)
    {
        $this->languageService = $languageService;
    }

    public function datatableData()
    {
        $sliders = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($sliders))
            ->addActions($actions)
            ->addColumn('post_date', function($post) {
                return Carbon::createFromFormat('Y-m-d H:i:s', $post->publish_date)->format('j-M-y H:i:s');
            })
            ->generate();
    }

    private function all()
    {
        return SliderModel::all();
    }

    public function store(array $inputs)
    {
        $availableLanguages = $this->languageService->getAvailableLanguages();

        $slider = SliderModel::create([
            'title' => $inputs['title'],
            'publish_date' => Carbon::createFromFormat('d-F-Y - H:i', $inputs['publish_date'])->format('Y-m-d H:i'),
            'user_id' => Auth::user()->id
        ]);

        $items = $inputs['items'];

        foreach ($items as $key => $item) {
            foreach ($availableLanguages as $lang => $config) {
                $itemImage = isset($item['image-' . $lang]) ? $item['image-' . $lang] : '' ;
                $content = isset($item['title-' . $lang]) ? $item['title-' . $lang] : '' ;
                $link = isset($item['link-' . $lang]) ? $item['link-' . $lang] : '';

                // store the uploaded image
                $imageName = $itemImage != '' ? $this->uploadSliderImage($itemImage) : $itemImage;

                $slider->items()->create([
                    'lang' => $lang,
                    'content' => $content,
                    'link' => $link,
                    'file_name' => $imageName,
                    'order' => $key
                ]);
            }
        }

    }

    public function findSliderById($id)
    {
        return SliderModel::find($id);
    }

    private function uploadSliderImage($itemImage)
    {
        $imageName = $itemImage->getClientOriginalName();
        $folder = 'uploads/sliders/';
        if (! File::exists(public_path($folder))) {
            File::makeDirectory(public_path($folder), 0775, true, true);
        }
        $image = Image::make($itemImage);
        $publicUrl = $folder . $imageName;
        $imagePath = public_path($publicUrl);
        $image->save($imagePath);

        return $imageName;
    }

    public function update($id, array $inputs)
    {
        $availableLanguages = $this->languageService->getAvailableLanguages();

        $slider = SliderModel::find($id);
        $slider->title = $inputs['title'];
        $slider->publish_date = Carbon::createFromFormat('d-F-Y - H:i', $inputs['publish_date'])->format('Y-m-d H:i');
        $slider->save();

        $items = $inputs['items'];

        // if deleted
        foreach ($availableLanguages as $lang => $config) {
            $currentItems = $slider->items()->where('lang', $lang)->get();
            foreach ($currentItems as $currentItem) {
                if (! array_key_exists($currentItem->order, $items)) {
                    $currentItem->delete();
                }
            }
        }


        foreach ($items as $key => $item) {
            foreach ($availableLanguages as $lang => $config) {
                $itemImage = isset($item['image-' . $lang]) ? $item['image-' . $lang] : '' ;
                $content = isset($item['title-' . $lang]) ? $item['title-' . $lang] : '' ;
                $link = isset($item['link-' . $lang]) ? $item['link-' . $lang] : '';

                // store the uploaded image
                $imageName = $itemImage != '' ? $this->uploadSliderImage($itemImage) : $itemImage;

                $sliderItems = $slider->items()->where('order', $key)->where('lang', $lang);
                // check existing item
                if ($sliderItems->count() > 0) {
                    $sliderItem = $sliderItems->first();
                    $sliderItem->content = $content;
                    $sliderItem->link = $link;
                    if($imageName != '') {
                        $sliderItem->file_name = $imageName;
                    }
                    $sliderItem->save();
                } else {
                    $slider->items()->create([
                        'lang' => $lang,
                        'content' => $content,
                        'link' => $link,
                        'file_name' => $imageName,
                        'order' => $key
                    ]);
                }
            }
        }
    }

    public function destroy($id)
    {
        $slider = SliderModel::find($id);
        $slider->items()->delete();
        $slider->delete();
    }

    public function getSliderWithItems(array $params)
    {
        $query = DB::table('sliders')
            ->join('slider_items', 'sliders.id', '=', 'slider_items.slider_id');

        // search by slider_id
        if (isset($params['id'])) {
            $query = $query->where('sliders.id', $params['id']);
        }

        // search by title
        if (isset($params['title'])) {
            $query = $query->where('sliders.title', $params['title']);
        }

        // search by lang
        if (isset($params['lang'])) {
            $lang = $params['lang'];
            $query = $query->where('slider_items.lang', $lang);
        }

        if (isset($params['order_by'])) {
            $query = $query->orderBy($params['order_by'], 'asc');
        }

        if (isset($params['order_by_desc'])) {
            $query = $query->orderBy($params['order_by_desc'], 'desc');
        }

        return $query->get();
    }

}