<?php

namespace App\Http\Controllers;
use App\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = DB::table('hostels')->select('hostels.id as id','s_name','roll_no','gender','stream_name','name','hostel_name','room','floor','res_day','sessions.id as session_id')->join('mgts','mgts.id','=','hostels.mgts_uid')->join('hostelnames','hostelnames.id','=','hostels.hostel_name_uid')->join('students','students.id', '=', 'mgts.student_uid')->join('sessions','sessions.id','=','mgts.session_uid')->join('streams','streams.id','=','mgts.stream_uid')->join('departments','departments.id','=','mgts.dept_uid')->get();
        if($data){
            return ['status'=> 200, 'data'=> $data];
        }elseif($data == null){
            return ['status'=> 400, 'data'=>'Data Not found'];
        }else{
           return ['status'=> 404, 'data'=>'Error Ocured']; 
        }
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $req)
    {
        $data = DB::table('hostels')->select('hostels.id as id','s_name','roll_no','gender','stream_name','name','hostel_name','room','floor','res_day','sessions.id as session_id')->join('mgts','mgts.id','=','hostels.mgts_uid')->join('hostelnames','hostelnames.id','=','hostels.hostel_name_uid')->join('students','students.id', '=', 'mgts.student_uid')->join('sessions','sessions.id','=','mgts.session_uid')->join('streams','streams.id','=','mgts.stream_uid')->join('departments','departments.id','=','mgts.dept_uid')->where('sessions.id',$id)->get()->all();
        if($data){
            return ['status'=> 200, 'data'=> $data];
        }elseif($data == null){
            return ['status'=> 400, 'data'=>'Data Not Found'];
        }else{
            return ['status'=> 404, 'data'=>'Error Ocured'];
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
        $hostel = Hostel::find($id);
        return $hostel;
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
       $data = DB::table('hostels')->where('id','=',$id)->update(['hostel_name_uid' => $req->hostel_name_uid, 'floor'=>$req->floor, 'room' => $req->room, 'res_day' => $req->res_day]);
       if($data){
          return ['status' => 200, 'message' => 'Data Updated'];
       }else{
          return ['status' => 404, 'message' => 'Error Ocured'];
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hostel = Hostel::find($id);
        $data = $hostel->delete();
        if($data){
            return ['status' => 200, 'message'=>'Data Deleted'];
        }else{
            return ['status'=>404, 'message' => 'Error Ocured'];
        }
    }
}
