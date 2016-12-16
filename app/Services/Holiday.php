<?php

namespace App\Service;

use App\Models\Holiday as HolidayModel;
use App\Service\Traits\DatatableParameters;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Holiday
{
    use DatatableParameters;

    protected $baseUrl = 'holiday';

    /**
     * @return mixed
     */
    public function datatableData()
    {
        $postTypes = $this->all();
        $actions = $this->actionParameters(['edit', 'delete']);
        return (new DatatableGenerator($postTypes))
            ->addActions($actions)
            ->addColumn('holiday_date', function($holiday) {
                return Carbon::createFromFormat('Y-m-d', $holiday->date)->format('j-F-Y');
            })
            ->generate();
    }

    public function all()
    {
        return HolidayModel::all();
    }

    public function store(array $inputs)
    {
        $startDate = $inputs['start_date'];
        $endDate = $inputs['end_date'];
        $title = $inputs['title'];
        $desc = $inputs['description'];

        $startCarbon = Carbon::createFromFormat('d-M-y', $startDate);
        $endCarbon = Carbon::createFromFormat('d-M-y', $endDate);
        while ($startCarbon->lte($endCarbon)) {
            HolidayModel::create([
                'title' => $title,
                'description' => $desc,
                'date' => $startCarbon->format('Y-m-d'),
                'created_by' => Auth::user()->id
            ]);

            $startCarbon->addDay(1);
        }

    }

    public function getHolidayById($id)
    {
        return HolidayModel::find($id);
    }

    public function update($id, array $inputs)
    {
        $holiday = HolidayModel::find($id);
        $holiday->title = $inputs['title'];
        $holiday->description = $inputs['description'];
        $holiday->date = Carbon::createFromFormat('d-M-Y', $inputs['date'])->format('Y-m-d');
        $holiday->created_by = Auth::user()->id;
        $holiday->save();

    }

    public function destroy($id)
    {
        HolidayModel::destroy($id);
    }

    public function isHoliday($date)
    {
        $holiday = HolidayModel::where('date', $date);
        if ($holiday->count() > 0) {
            return true;
        }

        return false;
    }
}