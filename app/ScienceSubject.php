<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScienceSubject extends Model
{
    protected $table = "_science_subjects";
    protected $fillable = ['subject_name', 'sub_year', 'sub_position'];
}
