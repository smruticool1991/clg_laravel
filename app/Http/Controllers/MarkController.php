<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
use App\Semester;
use Illuminate\Support\Facades\DB;
class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    { 
        //$review = DB::table('marks')->select('semester_uid')->get()->all();
        if(isset($req->name)){
           $data = DB::table('semesters')->whereNotIn('id',38);
           return $data;
        }else{
           $data = DB::table('marks')->select('marks.id as mark_id', 'marks.mgts_uid','marks.sub_1','marks.sub_2','marks.sub_3','marks.sub_4','marks.sub_5','marks.sub_6','marks.sub_7','semesters.*')->where('marks.mgts_uid','=', $req->id)->join('semesters','semesters.id','=','marks.semester_uid')->get();
           return $data; 
        }
        
    }
    /**
     Display semester not in mark table

    */
    public function manual(Request $req){
        
    }
    public function existSemester($id){
      return $id;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mark = new Mark();
        $mark->mgts_uid = $request->mgts;
        $mark->semester_uid = $request->semester;
        $mark->sub_1 = $request->paper1;
        $mark->sub_2 = $request->paper2;
        $mark->sub_3 = $request->paper3;
        $mark->sub_4 = $request->paper4;
        $mark->sub_5 = $request->paper5;
        $mark->sub_6 = $request->paper6;
        $mark->sub_7 = $request->paper7;
        $data = $mark->save();
        if($data){
            return ['status'=>200, 'message'=>'Mark submited Success'];
        }else{
            return ['status'=>404,'message'=> 'Error Ocured'];
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
        $data = DB::table('marks')->where('id', '=', $id)->get();
       if($data){
         return $data;
       }else{
        return ['status'=>400, 'message'=>'error ocured'];
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
       
    }


    public function some(Request $req){
        $data = DB::table('marks')->select('s_name','roll_no','sub_1','sub_2','sub_3','sub_4','sub_5','sub_6','sub_7')->join('mgts','mgts.id','=','marks.mgts_uid')->join('students','students.id','mgts.student_uid')->where('mgts.session_uid', $req->stream_session)->where('mgts.stream_uid',$req->stream)->where('mgts.dept_uid',$req->dept_uid)->where('marks.semester_uid',$req->semester)->get();
        if($data){
            //$data->total = $data->sub_1 + $data->sub_2 + $data->sub_3 + $data->sub_4 + $data->sub_5 + $data->sub_6 + $data->sub_7;
            return $data;
        }else if($data == null){
            return ['status'=> 400, 'message'=> 'Data Not Found'];
        }else{
            return ['status'=> 404, 'message' => 'Error Ocured'];
        }
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
        $data = DB::table('marks')->where('id',$id)->update([
            'sub_1' => $req->paper1,
            'sub_2' => $req->paper2,
            'sub_3' => $req->paper3,
            'sub_4' => $req->paper4,
            'sub_5' => $req->paper5,
            'sub_6' => $req->paper6,
            'sub_7' => $req->paper7,
        ]);
        // $mark = new Mark();
        // $mark->sub_1 = $req->sub_1;
        // $mark->sub_2 = $req->sub_2;
        // $mark->sub_3 = $req->sub_3;
        // $mark->sub_4 = $req->sub_4;
        // $mark->sub_5 = $req->sub_5;
        // $mark->sub_6 = $req->sub_6;
        // $mark->sub_7 = $req->sub_7;
        // $data = $mark->save();
        if($data){
            return ['status'=>200, 'message'=> 'Data Updated success'];
        }else{
            return ['status'=> 404, 'message'=> 'Error ocured'];
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
        $data = DB::table('marks')->where('id','=',$id)->delete();
        if($data){
            return ['status'=> 200, 'message'=> 'Deleted Seccess'];
        }else{
           return ['status' => 404, 'message' => 'Error Ocured'];
        }
    }
}
