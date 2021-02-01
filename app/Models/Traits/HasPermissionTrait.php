<?php

namespace App\Models\Traits;

use App\Models\Role;

trait HasPermissionTrait
{
    /**
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole( ... $roles ): bool
    {
        foreach ($roles as $role) {
            if (strtolower($this->role()->first()->name) == strtolower($role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
}

