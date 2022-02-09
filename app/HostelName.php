<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostelName extends Model
{
   protected $table = "hostelnames";
   protected $fillable = ['hostel_name'];
}
