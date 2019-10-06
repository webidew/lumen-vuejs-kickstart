<?php

namespace App\Models\Guards;

use Illuminate\Database\Eloquent\Model;

use App\Models\Members\User;

class Role extends Model
{
	protected $table = 'guards_roles';

    protected $fillable=['name', 'slug', 'permissions'];

	public function users()
	{
	   return $this->belongsToMany(User::class, 'guards_role_user');
	}

	public function hasAccess (array $permissions)
	{
	    foreach($permissions as $permission) {
	        if($this->hasPermission($permission)) {
	            return true;
	        }
	    }

	    return false;
	}

	protected function hasPermission(string $permission)
	{
	    $permissions = json_decode($this->permissions, true);
	    return $permissions[$permission]?? false;  
	    		/* --> 	if exists $permissions[$permission] then return result from 
	    				$permissions[$permission] or else false  */
				/* --> $permissions[$permission]?$permissions[$permission]:false  */
	}
}
