<?php

namespace App\Service;

use Spatie\Permission\Models\Role as RoleModel;

class Role
{

    use DatatableParameters;

    protected $baseUrl = 'role';
    private $permissionService;

    /**
     * Role constructor.
     * @param Permission $permissionService
     */
    public function __construct(Permission $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function datatableData()
    {
        $roles = $this->all();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($roles))
            ->addActions($actions)
            ->addColumn('permissions', function($role) {
                return $this->getPermissions($role);
            })
            ->generate();
    }

    public function all()
    {
        return RoleModel::all(['id', 'name']);
    }

    public function permission()
    {
        return $this->permissionService;
    }

    private function getPermissions($role)
    {
        $permissions = $role->permissions;
        $plucked = array_pluck($permissions, 'name');
        return implode(", ", $plucked);
    }

    public function store(array $inputs)
    {
        $role = RoleModel::create([
            'name' => $inputs['name']
        ]);

        $role->givePermissionTo($inputs['permissions']);
    }

    public function getRoleById($id)
    {
        return RoleModel::find($id);
    }

    public function selectedPermissions($roleId)
    {
        $role = RoleModel::find($roleId);
        return $role->permissions->pluck('id');
    }

    public function update($id, array $inputs)
    {
        $role = RoleModel::find($id);
        $role->name = $inputs['name'];
        $role->save();

        $role->syncPermissions($inputs['permissions']);
    }

    public function destroy($id)
    {
        $role = RoleModel::find($id);
        $role->syncPermissions([]);
        $role->delete();
    }

}