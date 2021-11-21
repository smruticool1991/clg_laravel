<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smsinfo extends Model
{
	protected $table = 'smsinfos';
    $fillable = ['student_sms_uid',	'sms_no'];
}
