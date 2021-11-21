<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Document;
use App\Adrsinfo;
use App\Hostel;
use App\Optional;
use App\Mgt;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {

        $data = DB::table('students')->select("s_name","roll_no","section")->where('mr_no','=',1)->get();
        return $data;
    }
    public function abc(Request $req){
        return $req;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = new Student();  
        $data1 = new Document();
        $data2 = new Adrsinfo(); 
        $hostel = new Hostel();
        $mgt = new Mgt();
            $data->s_name = $req->na;
            $data->admision_date = $req->dat;
            $data->mr_no = $req->mr;
            $data->roll_no = $req->roll;
            $data->barcode = $req->barcode;
            $data->section = $req->section;
            $data->gender = $req->gender;
            $data->ref_by = $req->refered;
            $data->board_name = $req->board_name;
            $data->board_roll = $req->board_roll;
            $data->board_mark = $req->board_mark;
            $data->board_percent = $req->board_percentage;
            $data->board_grade = $req->grade;
            $data->school_name = $req->s_name;
            $data->school_address = $req->s_address;
            $data->adhar_no = $req->adhar;
            $data->mig = $req->mig;
            $data->caste = $req->caste;
            $data->blood_group = $req->blood;
            $data->slc= $req->slc_no; 
            $data->slc_date= $req->slc_date; 
            $data->join_year= $req->join_year;
            $data->pass_year= $req->pass_year;
            $result = $data->save();
          $st_id = $data->id;
            $data1->student_doc_uid = $st_id;
           $valid_arr = $req->checkVal;
           $docs_check = implode(",",$valid_arr);
            $data1->document_name = $docs_check;
            $data1->save();
            // $data->hostel_status= $req->hostel_f;

            $data2->student_adrs_uid = $st_id;
            $data2->dist_name= $req->dist;
            $data2->address= $req->c_address;
            $data2->f_name= $req->f_name;
            $data2->f_occu= $req->f_occu;
            $data2->f_annual= $req->f_income;
            $data2->m_name= $req->m_name;
            $data2->m_occu= $req->m_occu;
            $data2->m_annual= $req->m_income;           
            $data2->mob_no= $req->contact;
            $data2->wh_no= $req->whatsapp;
            $data2->lg_guard= $req->lg_guard;
            $data2->lg_guard_no= $req->lg_contact;
            $data2->save();

            $hostel->student_hostel_uid = $st_id;
            $hostel->hostel_name = $req->h_name;
            $hostel->floor = $req->floor_n;
            $hostel->room = $req->room_n; 
            $hostel->res_day = $req->res_day;
            $hostel->save(); 

            $mgt->student_uid = $st_id;
            $mgt->session_uid = $req->session;
            $mgt->dept_uid = $req->stream_year;
            $mgt->optional_uid = $req->optional;
            $mgt->stream_uid = $req->streamm;
            $mgt->save();
            // $data->stream= $req->streamm;
            // $data->stream_year= $req->stream_year;
            // $result1 = $data1->save();
            // $result2 = $data2->save();
            if($result){
                return ['response' => 200,'message'=>'Data insterted success'];
            }else{
                return ['response'=>400,'message'=>'Data inserted failed'];
            }

    }


    public function store_excel(Request $req)
    {   
        $data = new Student();
        $data1 = new Document();
        $data2 = new Adrsinfo();
            $data->s_name = $req->name;
            $data->admision_date = $req->ad;
            $data->mr_no = $req->mr;
            $data->roll_no = $req->roll;
            $data->barcode = $req->Barcode;
            $data->section = $req->section;
            $data->gender = $req->gender;
            $data->ref_by = $req->refered;
            $data->board_name = $req->board;
            $data->board_roll = $req->board_roll;
            $data->board_mark = $req->hsc_mark;
            $data->board_percent = $req->hsc_per;
            $data->board_grade = $req->grade;
            $data->school_name = $req->school_name;
            $data->school_address = $req->school_address;
            $data->adhar_no = $req->adhar;
            $data->mig = $req->mig;
            $data->caste = $req->caste;
            $data->blood_group = $req->blood;
            $data1->slc = $req->document;
            $data1->inc = $req->document;
            $data1->bpb = $req->document;
            $data1->photo_sfl = $req->document;
            $data1->con = $req->document;
            $data1->res = $req->document;
            $data1->adh = $req->document;
            $data1->photo_sf = $req->document;
            $data1->m = $req->document;
            $data1->sc = $req->document;
            $data1->photo_sfm = $req->document;
            $data->hostel_status= $req->hostel;
            $data2->f_name= $req->father_name;
            $data2->f_occu= $req->father_occu;
            $data2->f_annual= $req->father_income;
            $data2->m_name= $req->mother_name;
            $data2->m_occu= $req->mother_occu;
            $data2->m_annual= $req->mother_income;
            $data2->dist_name= $req->district;
            $data2->address= $req->corres_address;
            $data2->mob_no= $req->contact_no;
            $data2->wh_no= $req->wh_no;
            $data2->lg_guard= $req->lg_guard;
            $data2->lg_guard_no= $req->lg_contact;
            $data->slc= $req->slc; 
            $data->slc_date= $req->date; 
            $data->join_year= $req->join_year;
            $data->pass_year= $req->pass_year;
            // $data->stream= $req->streamm;
            // $data->stream_year= $req->stream_year;
            $result = $data->save();
            $result1 = $data1->save();
            $result2 = $data2->save();
            if($result){
                return ['response' => 200,'message'=>'Data insterted success'];
            }else{
                return ['response'=>400,'message'=>'Data inserted failed'];
            }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
