<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = "marks";
    protected $fillable = ['student_mark_uid', 'sub_1', 'sub_2', 'sub-3', 'sub-4', 'sub-5', 'sub-6', 'sub-7'];
}
