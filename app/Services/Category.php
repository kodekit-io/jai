<?php

namespace App\Service;

use App\Models\Category as CategoryModel;
use App\Service\Traits\DatatableParameters;

class Category
{
    use DatatableParameters;

    protected $baseUrl = 'post-category';

    public function datatableData($postTypeId)
    {
        $categories = $this->getCategoriesByPostType($postTypeId);
        $this->baseUrl = $this->baseUrl. '/' . $postTypeId;
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

    public function store($postTypeId, array $inputs)
    {
        // $slug = $inputs['slug'] == '' ? getSlugOnModelByTitle($inputs['name'], 'category') : $inputs['slug'];
        $inputs['post_type_id'] = $postTypeId;
        CategoryModel::create($inputs);
    }

    public function getCategoryById($id)
    {
        return CategoryModel::find($id);
    }

    public function update($postTypeId, $id, array $inputs)
    {
        $category = CategoryModel::find($id);
        $category->name = $inputs['name'];
        $category->slug = $inputs['slug'];
        $category->parent_id = $inputs['parent_id'];
        $category->post_type_id = $postTypeId;
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
    public function categorySelect($name, $postTypeId, $defaultValue = null, $excludeId = [])
    {
        $form = new FormGenerator();
        $params = [
            'post_type_id' => $postTypeId,
            'exclude_id' => $excludeId,
        ];
        $categories = $this->getCategories($params);
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

    public function categoryCheckbox($name, $postTypeId, $selected)
    {
        $form = new FormGenerator();
        $categories = $this->getCategoriesByPostType($postTypeId);
        $fields = [
            'id' => 'id',
            'value' => 'name'
        ];
        return $form->nestedDbCheckbox($categories, $name, 'id', 'name', $selected);
    }

    public function findByPostTypeName($name)
    {
        $params = ['post_type' => $name];

        return $this->getCategories($params);
    }

    public function getCategoriesByPostType($postTypeId)
    {
        $params = ['post_type_id' => $postTypeId];

        return $this->getCategories($params);
    }

    public function getCategories(array $params)
    {
        $categories = CategoryModel::where('id', '>', 0);
        if ( isset($params['name']) ) {
            $categories = $categories->where('name', $params['name']);
        }

        if ( isset($params['post_type_id']) ) {
            $categories = $categories->where('post_type_id', $params['post_type_id']);
        }

        if ( isset($params['post_type']) ) {
            $name = $params['post_type'];
            $categories = $categories->whereHas('postType', function ($query) use ($name) {
                $query->where('name', $name);
            });
        }

        if ( isset($params['exclude_id']) ) {
            $ids = $params['exclude_id'];
            $ids = is_array($ids) ? $ids : [$ids];
            if (count($ids) > 0) {
                $categories = $categories->whereNotIn('id', $ids);
            }
        }

        return $categories->get();
    }

    public function hasPost($id)
    {
        if ($category = CategoryModel::find($id)) {
            return ( $category->posts()->count() > 0 );
        }
        return false;
    }

    public function transferPostsTo($id, $newCategoryId)
    {
        $posts = CategoryModel::find($id)->posts;
        foreach ($posts as $post) {
            $post->categories()->detach($id);
            $post->categories()->attach($newCategoryId);
        }
    }

}