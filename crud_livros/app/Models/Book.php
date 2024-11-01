<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'book_id';
    public $timestamps = false;
    protected $fillable = [
        'bookname',
        'bookauthor',
        'bookdescripition',
    ];
}
