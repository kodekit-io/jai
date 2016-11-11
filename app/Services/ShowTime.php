<?php

namespace App\Service;


use App\Models\Show;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Form;

class ShowTime
{
    use DatatableParameters;

    protected $baseUrl = 'showtime';

    protected $showTimeTypes = [
        '1' => 'All Day',
        '2' => 'Particular',
        '3' => 'Limited'
    ];

    /**
     * @return mixed
     */
    public function datatableData()
    {
        $params = [
            'lang' => 'en'
        ];
        $shows = $this->getShows($params);

        $actions = $this->actionParameters(['edit', 'delete']);
        return (new DatatableGenerator($shows))
            ->addColumn('show_type', function($show) {
                return $this->showTimeTypes[$show->show_type];
            })
            ->addColumn('title', function($show) {
                return $show->details()->where('lang', 'en')->first()->title;
            })
            ->addColumn('content', function($show) {
                return $show->details()->where('lang', 'en')->first()->content;
            })
            ->addActions($actions)
            ->generate();
    }

    public function all()
    {
        return Show::all();
    }

    public function getShowById($id)
    {
        return Show::find($id);
    }

    public function store(array $inputs)
    {
        $day = isset($inputs['day']) ? $inputs['day'] : '';
        $startDate = isset($inputs['start_date']) ? ($inputs['start_date'] == '' ? '1970-01-01' : Carbon::createFromFormat('m/d/Y', $inputs['start_date'])->format('Y-m-d')) : '1970-01-01';
        $endDate = isset($inputs['end_date']) ? ($inputs['end_date'] == '' ? '1970-01-01' : Carbon::createFromFormat('m/d/Y', $inputs['end_date'])->format('Y-m-d')) : '1970-01-01';
        $startTime = isset($inputs['start_time']) ? ($inputs['start_time'] == '' ? '00:00' : $inputs['start_time']) : '00:00';
//        $endTime = isset($inputs['end_time']) ? ($inputs['end_time'] == '' ? '00:00:00' : $inputs['end_time']) : '00:00:00';

        $show = Show::create([
            'show_type' => $inputs['show_type'],
            'created_by' => \Auth::user()->id,
            'day' => $day,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'start_time' => $startTime,
            'end_time' => '00:00'
        ]);

        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $show->details()->create([
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'ShowDetail'),
                'content' => $content,
                'lang' => $lang
            ]);

            $metaDesc = isset($inputs['meta_description'][$lang]) ? $inputs['meta_description'][$lang] : '';
            if ($metaDesc != '') {
                $show->metas()->create([
                    'meta_key' => 'meta_description-' . $lang,
                    'meta_value' => $metaDesc
                ]);
            }
        }

        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        if ($mediaId != '') {
            $show->medias()->attach($mediaId);
        }
    }

    public function update($id, array $inputs)
    {
        $day = isset($inputs['day']) ? $inputs['day'] : '';
        $startDate = isset($inputs['start_date']) ? ($inputs['start_date'] == '' ? '1970-01-01' : Carbon::createFromFormat('m/d/Y', $inputs['start_date'])->format('Y-m-d')) : '1970-01-01';
        $endDate = isset($inputs['end_date']) ? ($inputs['end_date'] == '' ? '1970-01-01' : Carbon::createFromFormat('m/d/Y', $inputs['end_date'])->format('Y-m-d')) : '1970-01-01';
        $startTime = isset($inputs['start_time']) ? ($inputs['start_time'] == '' ? '00:00' : $inputs['start_time']) : '00:00';

        $show = Show::find($id);
        $show->show_type = $inputs['show_type'];
        $show->created_by = \Auth::user()->id;
        $show->day = $day;
        $show->start_date = $startDate;
        $show->end_date = $endDate;
        $show->start_time = $startTime;
        $show->end_time = '00:00';
        $show->save();

        $show->details()->delete();
        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $show->details()->create([
                'lang' => $lang,
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'ShowDetail'),
                'content' => $content,
            ]);

            $metaDesc = isset($inputs['meta_description'][$lang]) ? $inputs['meta_description'][$lang] : '';
            if ($metaDesc != '') {
                $show->metas()->where('meta_key', 'meta_description-' . $lang)->delete();
                $show->metas()->create([
                    'meta_key' => 'meta_description-' . $lang,
                    'meta_value' => $metaDesc
                ]);
            }
        }

        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        if ($mediaId != '') {
            $show->medias()->sync([$mediaId]);
        }
    }

    public function getShowWithDetails(array $params)
    {
        $query = DB::table('shows')
            ->join('show_details', 'shows.id', '=', 'show_details.show_id')
            ->select('shows.*', 'show_details.title', 'show_details.slug', 'show_details.content');

        if (isset($params['show_type'])) {
            $query->where('shows.show_type', $params['show_type']);
        }

        if (isset($params['created_by'])) {
            $query->where('created_by', $params['created_by']);
        }

        if (isset($params['lang'])) {
            $query->where('lang', $params['lang']);
        }

        return $query;
    }

    public function getShowTimeTypes()
    {
        return $this->showTimeTypes;
    }

    public function getShowTimeTypeById($id)
    {
        return $this->showTimeTypes[$id];
    }

    public function getShows($params)
    {
        $shows = Show::where('id', '>', 0);

        if (isset($params['show_type'])) {
            $shows = $shows->where('show_type', $params['show_type']);
        }

        if (isset($params['created_by'])) {
            $shows = $shows->where('created_by', $params['created_by']);
        }

        return $shows->get();
    }

    public function getShowsWithDetails(array $params)
    {
        $shows = DB::table('shows')
            ->join('show_details', 'shows.id', '=', 'show_details.show_id')
            ->select('shows.*', 'show_details.title', 'show_details.slug', 'show_details.content');

        if (isset($params['lang'])) {
            $shows = $shows->where('lang', $params['lang']);
        }

        if (isset($params['show_type'])) {
            $shows = $shows->where('show_type', $params['show_type']);
        }

        if (isset($params['created_by'])) {
            $shows = $shows->where('created_by', $params['created_by']);
        }

        return $shows;
    }

    public function showTimeSelect($name, $defaultValue = null)
    {
        $form = new FormGenerator();

        $showTimes = $this->getShowTimeTypes();

        $fields = [
            'withBlank' => true
        ];

        if (!is_null($defaultValue)) {
            $fields['selected'] = $defaultValue;
        }

        return $form->dbSelect($showTimes, $name, $fields, ['class' => 'form-control', 'id' => 'showtime']);
    }

    public function daySelect($name, $defaultValue = null)
    {
        $arrDay = config('languages.languages.en.days');

        return Form::select($name, $arrDay, $defaultValue, ['class' => 'form-control']);
    }

    public function destroy($id)
    {
        Show::destroy($id);
    }

}