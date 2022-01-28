<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Semester;
class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = DB::table('semesters')->get()->all();
         return $data;
    }
    
    /** Display a new resource of semester data
    */
   
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

        $semester = new Semester();
        $semester->semester_name = $request->name;
        $data = $semester->save();
        if($data){
            return ['status'=> 200, 'message'=> 'Data Inserted Success'];
        }else{
            return ['status'=> 400, 'message'=> 'Error! Data Not Inserted'];
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
        $id = $id;
        $data = DB::table('semesters')->where('id', '=', $id)->get();
        if($data){
             return ['status'=> 200, 'message'=> $data];
        }else{
            return ['status' => 400, 'message' => 'Failure'];
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
        $id = $id;
        $data = DB::table('semesters')->where('id', '=', $id)->get();
        if($data){
             return ['status'=> 200, 'message'=> $data];
        }else{
            return ['status' => 400, 'message' => 'Failure'];
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
        $semester = Semester::find($id);
        $semester->semester_name = $req->name;
        $data = $semester->save();

        if($data){
            return ['status'=>200, 'message'=>'update success'];
        }else{
            return ['status'=>404, 'message'=>'failed'];
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
        $id = $id;
        $data = Semester::find($id);
        if($data !== null){
          $mess = $data->delete();
          if($mess){
            return ['status' => 200, 'message' => 'Deleted Data'];
            }else{
             return ['status' => 404, 'message' => 'Error Ocured'];
           }
        }else{
          return ['status' => 600, 'message' => 'Data not found in this id'];
        }
           
    }
}
