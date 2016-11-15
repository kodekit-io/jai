<?php

namespace App\Service;


use App\Models\Career as CareerModel;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Career
{

    use DatatableParameters;

    protected $baseUrl = 'career';

    public function datatableData()
    {
        $careers = $this->getCareers();

        $actions = $this->actionParameters(['edit', 'delete']);
        return (new DatatableGenerator($careers))
            ->addColumn('position', function($career) {
                return $career->details()->where('lang', 'en')->first()->position;
            })
            ->addColumn('active_date', function($career) {
                return Carbon::createFromFormat('Y-m-d', $career->active_date)->format('j F, Y');
            })
            ->addColumn('description', function($career) {
                return $career->details()->where('lang', 'en')->first()->description;
            })
            ->addActions($actions)
            ->generate();
    }

    public function getCareers($params = [])
    {
        $careers = CareerModel::where('id', '>', 0);

        if (isset($params['department'])) {
            $careers = $careers->where('department', $params['department']);
        }

        return $careers->get();
    }

    public function findById($id)
    {
        return CareerModel::find($id);
    }

    public function store(array $inputs)
    {
        $department = isset($inputs['department']) ? $inputs['department'] : '';
        $activeDate = isset($inputs['active_date']) ? ($inputs['active_date'] == '' ? '1970-01-01' : Carbon::createFromFormat('m/d/Y', $inputs['active_date'])->format('Y-m-d')) : '1970-01-01';
        $contactPerson = isset($inputs['contact_person']) ? $inputs['contact_person'] : '';

        $career = CareerModel::create([
            'department' => $department,
            'active_date' => $activeDate,
            'contact_person' => $contactPerson
        ]);

        foreach ($inputs['title'] as $lang => $title) {
            $description = $inputs['content'][$lang];
            $career->details()->create([
                'lang' => $lang,
                'position' => $title,
                'slug' => getSlugOnModelByTitle($title, 'CareerDetail'),
                'description' => $description
            ]);

            $metaDesc = isset($inputs['meta_description'][$lang]) ? $inputs['meta_description'][$lang] : '';
            if ($metaDesc != '') {
                $career->metas()->create([
                    'meta_key' => 'meta_description-' . $lang,
                    'meta_value' => $metaDesc
                ]);
            }
        }
    }

    public function update($id, array $inputs)
    {
        $department = isset($inputs['department']) ? $inputs['department'] : '';
        $activeDate = isset($inputs['active_date']) ? ($inputs['active_date'] == '' ? '1970-01-01' : Carbon::createFromFormat('m/d/Y', $inputs['active_date'])->format('Y-m-d')) : '1970-01-01';
        $contactPerson = isset($inputs['contact_person']) ? $inputs['contact_person'] : '';

        $career = CareerModel::find($id);
        $career->department = $department;
        $career->active_date = $activeDate;
        $career->contact_person = $contactPerson;
        $career->save();

        $career->details()->delete();
        foreach ($inputs['title'] as $lang => $title) {
            $description = $inputs['content'][$lang];
            $career->details()->create([
                'lang' => $lang,
                'position' => $title,
                'slug' => getSlugOnModelByTitle($title, 'CareerDetail'),
                'description' => $description
            ]);

            $metaDesc = isset($inputs['meta_description'][$lang]) ? $inputs['meta_description'][$lang] : '';
            if ($metaDesc != '') {
                $career->metas()->where('meta_key', 'meta_description-' . $lang)->delete();
                $career->metas()->create([
                    'meta_key' => 'meta_description-' . $lang,
                    'meta_value' => $metaDesc
                ]);
            }
        }
    }

    public function destroy($id)
    {
        CareerModel::destroy($id);
    }

    public function getCareerWithDetails(array $params = [])
    {
        $query = DB::table('careers')->whereDate('active_date', '>=', date('Y-m-d'))
            ->join('career_details', 'careers.id', '=', 'career_details.career_id')
            ->select('careers.*', 'career_details.lang', 'career_details.position', 'career_details.description', 'career_details.slug');

        // search by lang
        if (isset($params['lang'])) {
            $lang = $params['lang'];
            $query = $query->where('career_details.lang', $lang);
        }

        return $query;
    }

}