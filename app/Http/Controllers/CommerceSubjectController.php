<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CommerceSubjectController extends Controller
{
   public function index(){
   	  return DB::table('commerce_subjects')->get();
   }
}
