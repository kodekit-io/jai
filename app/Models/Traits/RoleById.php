<?php

namespace App\Models;

use Spatie\Permission\Contracts\Role;

trait RoleById
{
    public function assignRoleById(...$ids)
    {
        $roles = collect($ids)
            ->flatten()
            ->map(function ($role) {
                return $this->getStoredRoleById($role);
            })
            ->all();


        $this->roles()->saveMany($roles);

        $this->forgetCachedPermissions();

        return $this;
    }

    public function syncRolesById(...$ids)
    {
        $this->roles()->detach();

        return $this->assignRoleById($ids);
    }

    /**
     * Revoke all roles from the user.
     *
     */
    public function removeRoles()
    {
        $this->roles()->detach();
    }

    /**
     * @param $role
     *
     * @return Role
     */
    protected function getStoredRoleById($role)
    {
        return app(Role::class)->find($role);
    }
}