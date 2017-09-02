<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $table='profiles';

    protected $fillable=['name','email','address_name','address_code','profile_url','company_name','company_address','job_title','publicProfileUrl','summary'];

    protected $hidden=['remember_token'];
}
