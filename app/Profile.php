<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Address;
use App\Company;

class Profile extends Model
{
    //
    protected $table='profiles';

    protected $fillable=['name','email','headline','profile_url','job_title','publicProfileUrl','summary','user_id'];

    protected $hidden=['remember_token'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function address()
    {
        return $this->hasMany(Address::class);
    }
    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
