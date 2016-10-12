<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
