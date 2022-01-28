<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HostelName extends Model
{
   protected $table = "hostelNames";
   protected $fillable = ['hostel_name'];
}
