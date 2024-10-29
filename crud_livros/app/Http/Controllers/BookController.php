<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public readonly Book $Book;
    public function __construct(){
        $this ->book = new Book();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $booksPerPage = 10; // Aqui defino o número de livros por página como solicitado
    $currentPage = $request->input('page', 1);
    $offset = ($currentPage - 1) * $booksPerPage;

    $totalBooks = $this->book->count(); // aqui conto o total de livros
    $totalPages = ceil($totalBooks / $booksPerPage);// aqui conto o total de páginas

    $books = $this->book->skip($offset)->take($booksPerPage)->get();

    return view('books', [
        'books' => $books,
        'currentPage' => $currentPage,
        'totalPages' => $totalPages,
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $data = $request->validate([
            'bookName' => 'required|string|max:255',
            'bookAuthor' => 'required|string|max:255',
        ]);

        // Criar um novo livro
        $book = new Book();
        $book->bookName = $data['bookName'];
        $book->bookAuthor = $data['bookAuthor'];
        $book->save();

        // Redirecionar com uma mensagem
        return redirect()->back()->with('message', 'Book created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book_show', ['book' => $book]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book_edit',['book' =>$book ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $updated = $this->book->where('book_id', $id)-> update($request->except(['_token','_method',]));
       if($updated){
        return redirect()->back()->with('message','Successfully updated');
       }
        return redirect()->back()->with('message', 'Error update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->book->where('book_id', $id,)->delete();
        return redirect()->route('books.index');
    }
}
