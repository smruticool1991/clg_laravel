<?php

namespace App\Http\Controllers;
use App\HostelName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HostelNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = DB::table('hostelnames')->get();
       return $data;
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
        $hostelname = new HostelName();
        $hostelname->hostel_name = $req->hostel_name;
        $data = $hostelname->save();
        if($data){
            return ['status'=> 200, 'message'=> 'Data Inserted Success'];
        }else{
            return ['status'=> 404, 'message' => 'Error Ocured'];
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
       $data = DB::table('studentnames')->where('id','=',$id)->get();
       if($data){
           return $data;
       }else{
        return ['status'=> 404, 'message'=>'error ocured'];
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
        $data = DB::table('hostelnames')->where('id','=',$id)->update(['hostel_name'=> $req->hostel_name]);
        if($data){
            return ['status'=> 200, 'message'=> 'Data Updated'];
        }else{
            return ['status'=> 404, 'message' => 'Error Ocured'];
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
        $data = HostelName::find($id);
        $result = $data->delete();
        if($result){
            return ['status'=> 200, 'message'=> 'Successfully Deleted'];
        }else{
            return ['status'=> 404, 'message' => 'Error ocured'];
        }
    }
}
