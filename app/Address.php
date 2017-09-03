<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;

class Address extends Model
{
    //
    protected $table='addresses';

    protected $fillable=['address_name','address_code','user_id'];

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
