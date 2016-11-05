<?php
/**
 * Created by PhpStorm.
 * User: thor
 * Date: 10/12/2016
 * Time: 10:27 AM
 */

namespace App\Service;

use DB;
use Link;
use App\Models\Menu;

class MenuService
{

    protected $baseUrl = 'menu';

    public function getMenuById($menuId)
    {
        return Menu::find($menuId);
    }

    public function getMenuByUser($userId)
    {
        $menus = DB::table('menus')
            ->join('permissions', 'permissions.name', '=', 'menus.permission')
            ->join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->join('roles', 'roles.id', '=', 'role_has_permissions.role_id')
            ->join('user_has_roles', 'user_has_roles.role_id', '=', 'roles.id')
            ->where('menu_type', 'backend')
            ->where('user_has_roles.user_id', '=', $userId)
            ->select('menus.*')
            ->orderBy('parent_id', 'asc')
            ->orderBy('order', 'asc')
            ->distinct()
            ->get();
        return $menus;
    }

    public function getMenus($type = 'backend')
    {
        return Menu::where('menu_type', $type)->get();
    }

    public function menuSelect($data, $fields, $options = [])
    {
        $this->form->dbSelect($data, 'menu', $fields, $options);
    }

    /**
     * @param array $inputs
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function store(array $inputs)
    {
        return Menu::create($inputs);
    }

    public function update($id, $inputs)
    {
        $menu = Menu::find($id);
        $menu->name = $inputs['name'];
        $menu->display = $inputs['display'];
        $menu->link = $inputs['link'];
        $menu->parent_id = $inputs['parent_id'];
        $menu->permission = $inputs['permission'];
        $menu->icon_class = $inputs['icon_class'];
        $menu->order = $inputs['order'];
        $menu->save();
    }

    public function destroy($id)
    {
        return Menu::destroy($id);
    }

    public function datatableData()
    {
        $menus = $this->getMenus();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($menus))
            ->addActions($actions)
            ->generate();
    }

    public function getFrontEndMenus()
    {
        return $this->getMenus('frontend');
    }

}