<?php

namespace App\Service;


use App\Models\PostType as PostTypeModel;
use App\Service\Traits\DatatableParameters;

class PostType
{
    use DatatableParameters;

    protected $baseUrl = 'post-type';

    public function datatableData()
    {
        $postTypes = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($postTypes))
            ->addActions($actions)
            ->generate();
    }

    public function all()
    {
        return PostTypeModel::all();
    }

    public function store(array $inputs)
    {
        PostTypeModel::create([
            'name' => $inputs['name'],
            'slug' => $inputs['slug']
        ]);
    }

    public function getPostTypeById($id)
    {
        return PostTypeModel::find($id);
    }

    public function update($id, array $inputs)
    {
        $postType = $this->getPostTypeById($id);
        $postType->name = $inputs['name'];
        $postType->slug = $inputs['slug'];
        $postType->save();
    }

    public function destroy($id)
    {
        PostTypeModel::destroy($id);
    }

    public function postTypeSelect($name, $defaultValue = null)
    {
        $form = new FormGenerator();
        $postTypes = $this->all();
        $fields = [
            'id' => 'id',
            'value' => 'name'
        ];
        if (!is_null($defaultValue)) {
            $fields['selected'] = $defaultValue;
        }
        return $form->dbSelect($postTypes, $name, $fields, ['class' => 'form-control', 'id' => 'post-type']);
    }
}