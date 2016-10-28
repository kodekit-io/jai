<?php

namespace App\Service;


use App\Models\Package as PackageModel;
use App\Service\Traits\DatatableParameters;
use Illuminate\Support\Facades\Auth;

class Package
{
    use DatatableParameters;

    protected $packageType = [
        1 => 'Normal',
        2 => 'Special (Contact Us)'
    ];

    protected $baseUrl = 'package';

    public function datatableData()
    {
        $packages = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($packages))
            ->addColumn('title', function($package) {
                return $package->details()->where('lang', 'en')->first()->title;
            })
            ->addColumn('content', function($package) {
                return $package->details()->where('lang', 'en')->first()->content;
            })
            ->addActions($actions)
            ->generate();
    }

    public function all()
    {
        return PackageModel::all();
    }

    public function store(array $inputs)
    {
        $package = PackageModel::create([
            'package_type_id' => $inputs['package_type_id'],
            'normal_price' => $inputs['normal_price'],
            'weekend_price' => $inputs['weekend_price'],
            'holiday_price' => $inputs['holiday_price'],
            'created_by' => Auth::user()->id
        ]);

        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $package->details()->create([
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'PackageDetail'),
                'content' => $content,
                'lang' => $lang
            ]);
        }

//        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
//        if ($mediaId != '') {
//            $package->medias()->attach($mediaId, ['media_type' => 'featured']);
//        }
    }

    public function getServiceById($id)
    {
        return PackageModel::find($id);
    }

    public function update($id, array $inputs)
    {
        $package = PackageModel::find($id);
        $package->package_type_id = $inputs['package_type_id'];
        $package->normal_price = $inputs['normal_price'];
        $package->weekend_price = $inputs['weekend_price'];
        $package->holiday_price = $inputs['holiday_price'];
        $package->created_by = Auth::user()->id;
        $package->save();

        $package->details()->delete();
        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $package->details()->create([
                'lang' => $lang,
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'PackageDetail'),
                'content' => $content,
            ]);
        }
    }

    public function destroy($id)
    {
        PackageModel::destroy($id);
    }

    public function packageTypeSelect($name, $defaultValue = null)
    {
        $form = new FormGenerator();

        $packages = $this->getPackageType();

        $fields = [
            'withBlank' => true
        ];

        if (!is_null($defaultValue)) {
            $fields['selected'] = $defaultValue;
        }
        return $form->dbSelect($packages, $name, $fields, ['class' => 'form-control', 'id' => 'package-type']);
    }

    public function getPackageType()
    {
        return $this->packageType;
    }
}