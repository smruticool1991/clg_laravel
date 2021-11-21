<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adrsinfo extends Model
{
    protected $table = "adrsinfos";
    protected $fillable = ['f_name','f_occu','f_annual','m_name','m_occu','m_annual','dist','corress_add','contact_no','whats_no','lg_guard','lg_guard_no'];
}
