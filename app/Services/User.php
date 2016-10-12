<?php

namespace App\Service;

use App\Models\User as UserModel;

class User
{
    use DatatableParameters;

    protected $baseUrl = 'user';
    private $role;

    /**
     * User constructor.
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }


    public function datatableData()
    {
        $users = $this->getList();
        $actions = $this->actionParameters(['edit','delete']);

        return (new DatatableGenerator($users))
            ->addActions($actions)
            ->addColumn('role', function($user) {
                return $this->getRoles($user);
            })
            ->generate();
    }

    public function getList()
    {
        return UserModel::all(['id', 'name', 'email']);
    }

    public function getUserById($userId)
    {
        return UserModel::find($userId);
    }

    public function store(array $inputs)
    {
        $user = UserModel::create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password'])
        ]);

        $user->assignRoleById($inputs['roles']);
    }

    public function update($id, array $inputs)
    {
        $user = UserModel::find($id);
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->save();

        $user->syncRolesById($inputs['roles']);
    }

    public function selectedRoles($userId)
    {
        $user = UserModel::find($userId);
        return $user->roles->pluck('id');
    }

    private function getRoles($user)
    {
        $roles = $user->roles;
        $plucked = array_pluck($roles, 'name');
        return implode(", ", $plucked);
    }

    public function role()
    {
        return $this->role;
    }

    public function destroy($id)
    {
        $user = UserModel::find($id);
        $user->removeRoles();
        $user->delete();
    }

}