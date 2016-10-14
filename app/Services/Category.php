<?php

namespace App\Service;

use App\Models\Category as CategoryModel;
use App\Service\Traits\DatatableParameters;

class Category
{
    use DatatableParameters;

    protected $baseUrl = 'category';

    public function datatableData()
    {
        $categories = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($categories))
            ->addActions($actions)
            ->generate();
    }

    public function all()
    {
        return CategoryModel::all();
    }

    public function store($postTypeId, array $inputs)
    {
//        $slug = getSlugOnModelByTitle($inputs['name'], CategoryModel::class);
        CategoryModel::create([
            'name' => $inputs['name'],
            'slug' => $inputs['slug'],
            'post_type_id' => $postTypeId
        ]);
    }

    public function getCategoryById($id)
    {
        return CategoryModel::find($id);
    }

    public function update($id, array $inputs)
    {
        $category = CategoryModel::find($id);
        $category->name = $inputs['name'];
        $category->slug = $inputs['slug'];
        $category->save();
    }

    public function destroy($id)
    {
        CategoryModel::destroy($id);
    }

}