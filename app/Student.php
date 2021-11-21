<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ['s_name','admision_date','mr_no','roll_no','barcode','section','gender','ref_by','board_name','board_roll','board_mark','board_percent','board_grade','school_name','school_address','adhar_no','mig','caste','blood_group','hostel_facility','slc','slc_date', 'join_year','pass_year'];
}
