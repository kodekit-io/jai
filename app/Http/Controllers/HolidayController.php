<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayStoreRequest;
use App\Http\Requests\HolidayUpdateRequest;
use App\Service\Holiday;
use App\Service\Traits\DataMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class HolidayController extends Controller
{
    use DataMessage;
    /**
     * @var Holiday
     */
    protected $holidayService;

    /**
     * HolidayController constructor.
     * @param Holiday $holidayService
     */
    public function __construct(Holiday $holidayService)
    {
        $this->holidayService = $holidayService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.holidays.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->holidayService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.holidays.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HolidayStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HolidayStoreRequest $request)
    {
        $this->holidayService->store($request->except(['_token']));

        return backendRedirect('holiday')->with($this->getMessage('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = $this->holidayService->getHolidayById($id);
        $data['holiday'] = $holiday;
        $data['holidayShownDate'] = Carbon::createFromFormat('Y-m-d', $holiday->date)->format('d-M-Y');

        return view('backend.holidays.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HolidayUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HolidayUpdateRequest $request, $id)
    {
        $this->holidayService->update($id, $request->except(['_token']));

        return backendRedirect('holiday')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->holidayService->destroy($id);

        return backendRedirect('holiday')->with($this->getMessage('delete'));
    }
}
