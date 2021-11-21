<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Optional extends Model
{
    protected $table = "optionls";
    protected $fillable = ['optional_subject'];
}
