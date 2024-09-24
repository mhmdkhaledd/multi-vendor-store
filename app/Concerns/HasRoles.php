<?php
namespace App\Concerns;

use App\Models\Role;

trait HasRoles
  {
    public function roles()
    {
        return $this->morphToMany(Role::class,'authorizable','role_user');
    }

    public function hasAbility($ability)
    {
        foreach ($this->roles as $role) {
            if ($role->has($ability)) {
                return true;
            }
        }
        return true;
    }

}
