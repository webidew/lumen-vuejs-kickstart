<?php

namespace App\Models\Members;

use App\Models\Members\Profile;
use App\Models\Guards\Role;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable;

    protected $table = 'members_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

      public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'guards_role_user');
    }

    public function hasAccess (array $permissions)
    {
        foreach($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }

        return false;
    }
}
