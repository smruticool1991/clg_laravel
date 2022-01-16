<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Document;
use App\Adrsinfo;
use App\Hostel;
use App\Optional;
use App\Mgt;
use App\Smsinfo;
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
        $stream_id = $req->stream;
        $year_id = $req->year;
        $session_id = $req->session;

        $data = DB::table('students')->select('mgts.id as mgts_id','mgts.student_uid','mgts.session_uid','mgts.dept_uid','mgts.optional_uid','mgts.stream_uid','students.*','hostels.*','documents.*','adrsinfos.*', 'smsinfos.sms_no')->where('session_uid','=',$session_id)->where('dept_uid','=',$year_id)->where('stream_uid','=',$stream_id)->join('mgts','students.id','=','mgts.student_uid')->join('adrsinfos','adrsinfos.student_adrs_uid','=','students.id')->join('hostels','hostels.student_hostel_uid','=','students.id')->join('documents','documents.student_doc_uid','=','students.id')->join('optionls','optionls.id','=','mgts.optional_uid')->join('smsinfos','smsinfos.student_sms_uid', 'students.id')->get();
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
        $sms = new Smsinfo();
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
            $data->hostel_status = $req->hostel_f;
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

            $sms->student_sms_uid = $st_id;
            $sms->sms_no = $req->sms_no;
            $sms->save();
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
        $hostel = new Hostel();
        $sms = new Smsinfo();
        $mgt = new Mgt();
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
            $data->slc= $req->slc; 
            $data->slc_date= $req->slc_date; 
            $data->join_year= $req->join_year;
            $data->pass_year= $req->pass_year;
            $data->hostel_status = $req->hostel_f;
            $result = $data->save();
            $st_id = $data->id;
            $data1->student_doc_uid = $st_id;
            $data1->document_name = $req->document;
            $data1->save();
            // $data->hostel_status= $req->hostel_f;

            $data2->student_adrs_uid = $st_id;
            $data2->dist_name= $req->district;
            $data2->address= $req->corres_address;
            $data2->f_name= $req->father_name;
            $data2->f_occu= $req->father_occu;
            $data2->f_annual= $req->father_income;
            $data2->m_name= $req->mother_name;
            $data2->m_occu= $req->mother_occu;
            $data2->m_annual= $req->mother_income;           
            $data2->mob_no= $req->contact_no;
            $data2->wh_no= $req->wh_no;
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
            $mgt->session_uid = $req->stream_session;
            $mgt->dept_uid = $req->stream_year;
            $mgt->optional_uid = 2;
            $mgt->stream_uid = $req->stream;
            $mgt->save();

            $sms->student_sms_uid = $st_id;
            $sms->sms_no = $req->sms_no;
            $sms->save();
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $data = DB::table('mgts')->select('mgts.id as mgts_id','mgts.student_uid','mgts.session_uid','mgts.dept_uid','mgts.optional_uid','mgts.stream_uid','students.*','hostels.*','documents.*','adrsinfos.*', 'smsinfos.sms_no')->join('students','mgts.student_uid','students.id')->join('hostels','hostels.student_hostel_uid','students.id')->join('documents','documents.student_doc_uid','students.id')->join('adrsinfos','adrsinfos.student_adrs_uid','students.id')->join('smsinfos', 'smsinfos.student_sms_uid', 'students.id' )->where('mgts.id','=',$id)->get();
        if($data){
            return $data;
        }else{
            return ['response'=> 400 ,'data'=> 'Problem in data fetching']; 
        }
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
    public function update(Request $req, $id)
    {
       
         $data = Mgt::find($id);
         $data->session_uid = $req->session;
         $data->dept_uid = $req->stream_year;
         $data->optional_uid = $req->optional;
         $data->stream_uid = $req->streamm;
         $data->save();
          $student_id = $data->student_uid;
          $session_id = $data->session_uid;
          $stream_id = $data->stream_uid;
          $optional_id = $data->optional_uid;
          $dept_id = $data->dept_uid; 
          $student = Student::find($student_id);
          $student->s_name = $req->na;
          $student->admision_date = $req->dat;
          $student->mr_no = $req->mr;
          $student->roll_no = $req->roll;
          $student->barcode = $req->barcode;
          $student->section = $req->section;
          $student->gender = $req->gender;
          $student->ref_by = $req->refered;
          $student->board_name = $req->board_name;
          $student->board_roll = $req->board_roll;
          $student->board_mark = $req->board_mark;
          $student->board_percent = $req->board_percentage;
          $student->board_grade = $req->grade;
          $student->school_name = $req->s_name;
          $student->school_address = $req->s_address;
          $student->adhar_no = $req->adhar;
          $student->mig = $req->mig;
          $student->caste = $req->caste;
          $student->blood_group = $req->blood;
          $student->slc= $req->slc_no;
          $student->slc_date= $req->slc_date;
          $student->join_year= $req->join_year;
          $student->pass_year = $req->pass_year;
          $student->hostel_status = $req->hostel_f;
          $student_result = $student->save();
          
          $hostel = Hostel::find($student_id);
          $hostel->hostel_name = $req->h_name;
          $hostel->floor = $req->floor_n;
          $hostel->room = $req->room_n;
          $hostel->res_day = $req->res_day;
          $hostel->save();

          $document = Document::find($student_id);
           $valid_arr = $req->checkVal;
           $docs_check = implode(",",$valid_arr);   
           $document->document_name = $docs_check;
           $document->save();

           $adrs = Adrsinfo::find($student_id);
            $adrs->dist_name= $req->dist;
            $adrs->address = $req->c_address;
            $adrs->f_name = $req->f_name;
            $adrs->f_occu = $req->f_occu;
            $adrs->f_annual = $req->f_income;
            $adrs->m_name = $req->m_name;
            $adrs->m_occu = $req->m_occu;
            $adrs->m_annual = $req->m_income;           
            $adrs->mob_no = $req->contact;
            $adrs->wh_no = $req->whatsapp;
            $adrs->lg_guard = $req->lg_guard;
            $adrs->lg_guard_no = $req->lg_contact;
            $adrs->save();
            
            $sms = Smsinfo::find($student_id);
            if($sms){
                $sms->sms_no = $req->sms_no;
                $sms->save(); 
            }
           

        if($student_result){
                return ['response' => 200,'message'=>'Data insterted success'];
            }else{
                return ['response'=>400,'message'=>'Data inserted failed'];
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
     $data = Mgt::find($req->id)->delete();
     if($data){
       return ['response'=> 200, 'message'=> 'Success Fully Deleted'];
     }else{
       return ['response'=> 400, 'message'=> 'Error Ocured'];
     }
    }
}
