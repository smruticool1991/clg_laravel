<?php

namespace App\Http\Controllers;

use App\BookDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('book_details')->get();
        if($data){
            return $data;
        }else{
            return ['status'=>404, 'message'=> 'Error Ocured'];
        }
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
       $book =  new BookDetail(); 
       $book->book_no = $req->book_no;
       $book->stream_uid = $req->stream;
       $book->dept_uid = $req->dept;
       $book->isbn_no = $req->isbn_no;
       $book->book_name = $req->book_name;
       $book->author = $req->author;
       $book->publisher = $req->publisher;
       $book->edition = $req->edition;
       $book->quantity = $req->quantity;
       $book->cost = $req->cost;
       $book->purchase_date = $req->purchase_date;
       $data = $book->save();
       if($data){
        return ['status'=>200, 'message'=>'Data Inserted Success'];
       }else{
        return ['status' =>404, 'message' => 'Error Ocured'];
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookDetail  $bookDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('book_details')->where('id',$id)->get();
        if($data){
            return $data;
        }else{
            return ['status' => 404, 'message' => 'Error Ocured'];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookDetail  $bookDetail
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
     * @param  \App\BookDetail  $bookDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = DB::table('book_details')->where('id',$id)->update(['book_no' => $req->book_no, 'stream_uid' => $req->stream, 'dept_uid' => $req->dept, 'isbn_no' => $req->isbn_no, 'book_name' => $req->book_name,'author' => $req->author, 'publisher'=> $req->publisher, 'edition' => $req->edition, 'quantity' => $req->quantity, 'cost' => $req->cost, 'purchase_date' => $req->purchase_date]);
        if($data){
            return ['status' => 200, 'message' => "Data Updated Success"];
        }else{
            return ['status' => 404, 'message' => 'Error Ocured'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookDetail  $bookDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $data = BookDetail::find($id)->delete();
       if($data){
          return ['status'=>200, 'message'=> 'Data successfully Deleted'];
       }else{
        return ['status'=> 404, 'message'=> 'Error Ocured'];
       }
    }
}
