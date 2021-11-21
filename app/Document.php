<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = "documents";
    protected $fillable = ['student_doc_uid', 'document_name'];
}
