<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $table='addresses';

    protected $fillable=['qualification','yearOfPassing','percentage','address_name','user_id'];

}
