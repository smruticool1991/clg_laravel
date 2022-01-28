<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookDetail extends Model
{
    protected $table = "book_details";
    protected $fillble = ['book_no', 'stream_uid', 'dept_uid', 'isbn_no', 'book_name', 'author', 'publisher', 'edition', 'quantity'];
}
