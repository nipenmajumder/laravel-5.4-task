<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    protected $table = 'bloods';
    protected $fillable = ['blood_group'];

}
