<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use Illuminate\Support\Facades\DB;
class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = DB::table('sessions')->select('id','session_year')->orderBy('session_year','DESC')->get();
        return $session;

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
    public function store(Request $request)
    {
        $session = new Session();
        $session->session_year = $request->session_year;
        $data = $session->save();
        if($data){
            return ['status'=> 200, 'message'=> "Data Inserted Success"];
        }else{
            return ['status' => 404, 'messaege'=> "Error Ocured"];
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
        $session = Session::find($id);
        return  $session;
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
        $data = DB::table('sessions')->where('id', $id)->update(['session_year'=>$request->session_year]);
        if($data){
            return ['status'=> 200, 'message'=> 'Data Updated Success'];
        }else{
            return ['status' => 404, 'message' => "Error Ocured"];
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
        $data = DB::table('sessions')->where('id', $id)->delete();
        if($data){
            return ['status'=> 200, 'message' => 'Data Deleted Success'];
        }else{
            return ['status' => 404, 'message' => 'Error Ocured'];
        }
    }
}
