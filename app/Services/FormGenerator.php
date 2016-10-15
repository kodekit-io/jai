<?php

namespace App\Service;


use Form;

class FormGenerator
{
    /**
     * @param $datas
     * @param $name
     * @param array $fields (id, value, selected, withBlank)
     * @param array $options
     * @return mixed
     */
    public function dbSelect($datas, $name, array $fields, $options = array())
    {
        extract($fields);

        if (isset($withBlank) && $withBlank) {
            $items[0] = '----';
        }

        $selectedValue = ( isset($selected) ? $selected : '' );

        if ( isset($id) ) {
            if (! $datas->isEmpty()) {
                foreach ($datas as $data) {
                    $items[$data->$id] = $data->$value;
                }
            } else {
                $items = ['0' => '----'];
            }
        } else {
            $items = $datas;
        }

        return Form::select($name, $items, $selectedValue, $options);
    }

    /**
     * @param $datas
     * @param $name
     * @param array $fields (id, value, selected, withBlank)
     * @param array $options
     * @return mixed
     */
    public function nestedDbSelect($datas, $name, array $fields, $options = array())
    {
        extract($fields);

        if (isset($withBlank) && $withBlank) {
            $items[0] = '----';
        }

        $selectedValue = ( isset($selected) ? $selected : '' );

        if ( isset($id) ) {
            if (! $datas->isEmpty()) {
                $datas->sortBy('parent_id');
                $nestedItems = $this->generateNestedItems($datas, $id, $value)->toArray();
                foreach ($nestedItems as $key => $item) {
                    foreach ($item as $key => $it) {
                        $items[$key] = $it;
                    }
                }

            } else {
                $items = ['0' => '----'];
            }
        } else {
            $items = $datas;
        }

//        var_dump($items); exit;

        return Form::select($name, $items, $selectedValue, $options);
    }

    private function generateNestedItems($datas, $id, $value)
    {
        $selects = collect([]);

        foreach ($datas as $data) {
            if ($data->parent_id == 0) {
                $selects->push([$data->$id => $data->$value]);
                $this->generateChildrenItems($selects, $data, $id, $value);
            }
        }

        return $selects;
    }

    private function generateChildrenItems($selects, $data, $id, $value, $space = '')
    {
        $children = $data->children()->get();
        foreach ($children as $child) {
            $space = $space . '--';
            if ($child->children) {
                $selects->push([$child->$id => $space . '&nbsp;' . $child->$value]);
                $this->generateChildrenItems($selects, $child, $id, $value, $space);
            } else {
                $selects->push([$child->$id => $space . '&nbsp;' . $child->$value]);
            }
        }
    }
}