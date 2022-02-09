<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Semester;
class Mark extends Model
{
    protected $table = "marks";
    protected $fillable = ['mgts_uid','semester_uid','sub_1','sub_2','sub_3','sub_4','sub_5','sub_6','sub_7'];
}
