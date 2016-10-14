<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStore;
use App\Service\Category;
use App\Service\Traits\DataMessage;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    use DataMessage;

    /**
     * @var Category
     */
    private $categoryService;

    /**
     * CategoryController constructor.
     * @param Category $categoryService
     */
    public function __construct(Category $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories.list');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return $this->categoryService->datatableData();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
        $this->categoryService->store(1, $request->except('_token'));

        return backendRedirect('category')->with($this->getMessage('store'));
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
        $data['category'] = $this->categoryService->getCategoryById($id);

        return view('backend.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->categoryService->update($id, $request->except(['_token']));

        return backendRedirect('category')->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryService->destroy($id);

        return backendRedirect('category')->with($this->getMessage('delete'));
    }
}
