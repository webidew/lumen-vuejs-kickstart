<?php

namespace App\Models\Members;

use App\Models\Members\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'members_profiles';

    protected $fillable = [ 'fullname', 'icnumber', 'phone', 'schoolcode'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
