<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // Authorisation details.
    $username = "smruticool1991@gmail.com";
    $hash = "88361f9e5dab6b9a556c25b56e1d0d33562233ddd5c8d4b569eb4a8345243ad4";

    // Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";
    $name = "smruti";
    $code = "85696";
    // Data for text message. This is the text message data.
    $sender = "SIIMS"; // This is who the message appears to be from.
    $numbers = $request->phone; // A single number or a comma-seperated list of numbers
    //$message = $request->message; 
    $message = 'Dear '.$name.' Get 30% off on all our N&K clothing itmes with code '.$code.'. Hurry - offer valid only till the end of this months - N&K clothing';

    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    $message = urlencode($message);
    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    $ch = curl_init('http://api.textlocal.in/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    return $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);

       // $message = $request->message;
       // $phone = $request->phone; 
       // $apiKey = "NmMzNjc1MzY0ODRjNTQ3NjUwNmM0ZjQxNGQ1MjY5NjE=";
       // $numbers = array(918123456789, 918987654321);
       // $sender = "SIIMS";
       // //$message = rawurlencode(‘This is your message’);
       // $numbers = implode(',', $numbers);
       // $data = array('apikey' => $apiKey, 'numbers' => $phone, "sender" => $sender, "message" => $message);
       // $ch = curl_init('https://api.textlocal.in/send/');
       // curl_setopt($ch, CURLOPT_POST, true);
       // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       // $response = curl_exec($ch);
       // curl_close($ch);
       // return $response;
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
