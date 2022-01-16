<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mark;
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
        $data = DB::table('marks')->where('marks.mgts_uid','=', $req->id)->get();
        return $data;
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
