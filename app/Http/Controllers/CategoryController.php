<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStore;
use App\Service\Category;
use App\Service\PostType;
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
     * @var PostType
     */
    private $postTypeService;

    /**
     * CategoryController constructor.
     * @param Category $categoryService
     */
    public function __construct(Category $categoryService, PostType $postTypeService)
    {
        $this->categoryService = $categoryService;
        $this->postTypeService = $postTypeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($postTypeId)
    {
        $data['postTypeId'] = $postTypeId;
        return view('backend.categories.list', $data);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData($postTypeId)
    {
        return $this->categoryService->datatableData($postTypeId);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($postTypeId)
    {
        $data['categorySelect'] = $this->categoryService->categorySelect('parent_id', $postTypeId);
        $data['postTypeId'] = $postTypeId;
        return view('backend.categories.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request, $postTypeId)
    {
        $this->categoryService->store($postTypeId, $request->except('_token'));

        return backendRedirect('post-category/'. $postTypeId)->with($this->getMessage('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postTypeId, $id)
    {
        $category = $this->categoryService->getCategoryById($id);
        $data['category'] = $category;
        $data['postTypeId'] = $postTypeId;
        $data['categorySelect'] = $this->categoryService->categorySelect('parent_id', $postTypeId, $category->parent_id);
        return view('backend.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postTypeId, $id)
    {
        $this->categoryService->update($postTypeId, $id, $request->except(['_token']));

        return backendRedirect('post-category/'. $postTypeId)->with($this->getMessage('update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($postTypeId, $id)
    {
        if ($this->categoryService->hasPost($id)) {
            return backendRedirect('post-category/' . $postTypeId .'/' . $id .'/transfer');
        }

        $this->categoryService->destroy($id);

        return backendRedirect('post-category/'. $postTypeId)->with($this->getMessage('delete'));
    }

    public function transfer($postTypeId, $id)
    {
        $data['postTypeId'] = $postTypeId;
        $data['id'] = $id;
        $data['categorySelect'] = $this->categoryService->categorySelect('transfer_to', $postTypeId, null, $id);
        return view('backend.categories.transfer', $data);
    }

    public function transferThenDelete(Request $request, $postTypeId, $id)
    {
        $this->categoryService->transferPostsTo($id, $request->input(['transfer_to']));

        $this->categoryService->destroy($id);

        return backendRedirect('post-category/'. $postTypeId)->with($this->getMessage('delete'));
    }
}
