<?php

namespace App\Service;


use App\Models\Show;
use App\Service\Traits\DatatableParameters;

class ShowTime
{
    use DatatableParameters;

    protected $baseUrl = 'showtime';

    /**
     * @return mixed
     */
    public function datatableData()
    {
        $shows = $this->all();
        $actions = $this->actionParameters(['edit', 'delete']);
        return (new DatatableGenerator($shows))
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
        $startDate = isset($inputs['start_date']) ? $inputs['start_date'] : '';
        $endDate = isset($inputs['end_date']) ? $inputs['end_date'] : '';
        $startTime = isset($inputs['start_time']) ? $inputs['start_time'] : '';
        $endTime = isset($inputs['end_time']) ? $inputs['end_time'] : '';

        $show = Show::create([
            'show_type' => $inputs['show_type'],
            'created_by' => \Auth::user()->id,
            'day' => $day,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'start_time' => $startTime,
            'end_time' => $endTime
        ]);

        foreach ($inputs['title'] as $lang => $title) {
            $content = $inputs['content'][$lang];
            $show->details()->create([
                'title' => $title,
                'slug' => getSlugOnModelByTitle($title, 'PostDetail'),
                'content' => $content,
                'lang' => $lang
            ]);
        }
    }
}