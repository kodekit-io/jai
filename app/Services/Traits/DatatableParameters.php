<?php

namespace App\Service\Traits;


trait DatatableParameters
{
    function actionParameters(array $actions)
    {
        $params = array();
        foreach ($actions as $action) {
            $function = $action.'Parameter';
            $params[$action] = $this->$function();
        }

        return $params;
    }

    protected function editParameter()
    {
        $edit = [
            'title'     => 'Edit',
            'link'      => backendUrl($this->baseUrl . '/%s' . '/edit'),
            'class'     => 'btn btn-xs btn-default',
            'icon'      => 'fa fa-edit'
        ];
        return $edit;
    }

    protected function detailParameter()
    {
        $detail = [
            'title'     => 'Detail',
            'link'      => backendUrl($this->baseUrl . '/%s' . '/detail'),
            'class'     => 'btn btn-xs btn-default',
            'icon'      => 'fa fa-location-arrow'
        ];
        return $detail;
    }

    protected function deleteParameter()
    {
        $delete = [
            'title'     => 'Delete',
            'link'      => backendUrl($this->baseUrl . '/%s' . '/delete'),
            'class'     => 'btn btn-xs btn-default btn-delete',
            'icon'      => 'fa fa-times',
        ];
        return $delete;
    }
}