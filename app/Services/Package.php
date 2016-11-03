<?php

namespace App\Service;


use App\Models\Package as PackageModel;
use App\Service\Traits\DatatableParameters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $generalAdmission = isset($inputs['is_general_admission']) ? 1 : 0;
        $package = PackageModel::create([
            'package_type_id' => $inputs['package_type_id'],
            'normal_price' => $inputs['normal_price'],
            'weekend_price' => $inputs['weekend_price'],
            'holiday_price' => $inputs['holiday_price'],
            'created_by' => Auth::user()->id,
            'is_general_admission' => $generalAdmission
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

        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        if ($mediaId != '') {
            $package->medias()->attach($mediaId);
        }
    }

    public function getServiceById($id)
    {
        return PackageModel::find($id);
    }

    public function update($id, array $inputs)
    {
        $generalAdmission = isset($inputs['is_general_admission']) ? 1 : 0;
        $package = PackageModel::find($id);
        $package->package_type_id = $inputs['package_type_id'];
        $package->normal_price = $inputs['normal_price'];
        $package->weekend_price = $inputs['weekend_price'];
        $package->holiday_price = $inputs['holiday_price'];
        $package->created_by = Auth::user()->id;
        $package->is_general_admission = $generalAdmission;
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

        $mediaId = isset($inputs['featured_image_id']) ? $inputs['featured_image_id'] : '' ;
        if ($mediaId != '') {
            $package->medias()->sync([$mediaId]);
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

    public function getPackages(array $params)
    {
        $packageField = 'package_type_id';
        $createdByField = 'created_by';

        $query = DB::table('packages')
            ->join('package_details', 'packages.id', '=', 'package_details.package_id')
            ->leftJoin('package_has_medias', 'packages.id', '=', 'package_has_medias.package_id')
            ->leftJoin('media', 'package_has_medias.media_id', '=', 'media.id')
            ->select('packages.*', 'package_details.title', 'package_details.content', 'package_details.slug', 'media.file_name');

        // search by package type
        if ( isset($params[$packageField]) ) {
            $query->where($packageField, $params[$packageField]);
        }

        // search by creator
        if ( isset($params[$createdByField]) ) {
            $query->where($createdByField, $params[$createdByField]);
        }

        // search by lang
        if (isset($params['lang'])) {
            $lang = $params['lang'];
            $query = $query->where('package_details.lang', $lang);
        }

        return $query->get();
    }
}