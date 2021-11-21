<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mgt extends Model
{
    protected $table = "mgts";
    protected $fillable = ['student_uid', 'session_uid', 'dept_uid', 'optional_uid','stream_uid'];
}
