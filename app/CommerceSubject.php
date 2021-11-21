<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommerceSubject extends Model
{
	protected $table = "commerce_subjects";
    protected $fillable = ['subject_name', 'sub_year', 'sub_position'];
}
