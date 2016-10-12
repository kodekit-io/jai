<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionStore;
use App\Http\Requests\PermissionUpdate;
use App\Service\DataMessage;
use App\Service\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;

class PermissionController extends Controller
{
    use DataMessage;

    /**
     * @var Permission
     */
    private $permissionService;

    /**
     * PermissionController constructor.
     */
    public function __construct(Permission $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.permissions.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->permissionService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.permissions.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStore $request)
    {
        $this->permissionService->store($request->except('_token'));

        return backendRedirect('permission')->with($this->getMessage('store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['permission'] = $this->permissionService->getPermissionById($id);

        return view('backend.permissions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionUpdate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdate $request, $id)
    {
        $this->permissionService->update($id, $request->only(['name']));

        return backendRedirect('permission')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->permissionService->destroy($id);

        return backendRedirect('permission')->with($this->getMessage('delete'));
    }
}
