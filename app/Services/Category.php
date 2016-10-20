<?php

namespace App\Service;

use App\Models\Category as CategoryModel;
use App\Service\Traits\DatatableParameters;

class Category
{
    use DatatableParameters;

    protected $baseUrl = 'post-category';

    public function datatableData()
    {
        $categories = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($categories))
            ->addActions($actions)
            ->addColumn('parent', function($category) {
                if ($category->parent) {
                    return $category->parent->name;
                }
                return '';
            })
            ->generate();
    }

    public function all()
    {
        return CategoryModel::all();
    }

    public function store(array $inputs)
    {
        // var_dump($inputs); exit;
        // $slug = $inputs['slug'] == '' ? getSlugOnModelByTitle($inputs['name'], 'category') : $inputs['slug'];
        CategoryModel::create($inputs);
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
        $category->parent_id = $inputs['parent_id'];
        $category->post_type_id = $inputs['post_type_id'];
        $category->save();
    }

    public function destroy($id)
    {
        CategoryModel::destroy($id);
    }

    /**
     * @param $name
     * @param null $defaultValue
     * @return mixed
     */
    public function categorySelect($name, $defaultValue = null)
    {
        $form = new FormGenerator();
        $categories = $this->all();
        $fields = [
            'id' => 'id',
            'value' => 'name',
            'withBlank' => true
        ];
        if (!is_null($defaultValue)) {
            $fields['selected'] = $defaultValue;
        }
        return $form->dbSelect($categories, $name, $fields, ['class' => 'form-control', 'id' => 'post-type']);
    }

    public function categoryCheckbox()
    {
        $form = new FormGenerator();
        $categories = $this->all();
        $fields = [
            'id' => 'id',
            'value' => 'name'
        ];
        return $form->nestedDbCheckbox($categories, 'categories[]', 'id', 'name');
    }

    public function findByPostTypeName($name)
    {
        return CategoryModel::whereHas('postType', function ($query) use ($name) {
            $query->where('name', $name);
        })->get();
    }

}