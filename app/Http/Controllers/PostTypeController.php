<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostTypeStore;
use App\Http\Requests\PostTypeUpdate;
use App\Service\PostType;
use App\Service\Traits\DataMessage;

use App\Http\Requests;

class PostTypeController extends Controller
{
    use DataMessage;

    /**
     * @var PostType
     */
    private $postTypeService;

    /**
     * PostTypeController constructor.
     */
    public function __construct(PostType $postTypeService)
    {
        $this->postTypeService = $postTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.post-types.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->postTypeService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post-types.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostTypeStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostTypeStore $request)
    {
        $this->postTypeService->store($request->except(['_token']));

        return backendRedirect('post-type')->with($this->getMessage('store'));
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
        $data['postType'] = $this->postTypeService->getPostTypeById($id);

        return view('backend.post-types.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostTypeUpdate $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostTypeUpdate $request, $id)
    {
        $this->postTypeService->update($id, $request->except(['_token']));

        return backendRedirect('post-type')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postTypeService->destroy($id);

        return backendRedirect('post-type')->with($this->getMessage('delete'));
    }
}
