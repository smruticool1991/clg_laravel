<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    protected $table = "hostels";
    protected $fillable = ['student_hostel_uid','hostel_name','floor', 'room','res_day'];
}
