<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    protected $table = "book_issues";
    protected $fillable = ['books_uid',	'library_card_no', 'issue_quantity', 'date_taken', 'submission_date'];
}
