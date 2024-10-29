<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Define a tabela que o modelo deve usar (opcional se seguir a convenção de nomenclatura)
    protected $table = 'books';

    // Defina a chave primária, já que você está usando um nome diferente da convenção
    protected $primaryKey = 'book_id';

    // Se a sua tabela não tiver timestamps, defina:
    public $timestamps = false; // Isso é importante, pois a tabela não possui as colunas created_at e updated_at

    // Defina os atributos que podem ser atribuídos em massa
    protected $fillable = [
        'bookname',
        'bookauthor',
    ];
}
