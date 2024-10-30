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
    //Aqui redirecionamos para rota de criação
    public function create()
    {
        return view('book_create');
    }

    //Aqui realizamos as validações e criação de um novo livro
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
    //Aqui redirecionamos para rota show, ondee é exibida a pagina "about"
    public function show(Book $book)
    {
        return view('book_show', ['book' => $book]);

    }
    //Aqui oredirecionamos para a pagina de edit
    public function edit(Book $book)
    {
        return view('book_edit',['book' =>$book ]);
    }
    //Aqui tratamos a edição do livro e realizamos o update no banco
    public function update(Request $request, string $id)
    {
       $updated = $this->book->where('book_id', $id)-> update($request->except(['_token','_method',]));
       if($updated){
        return redirect()->back()->with('message','Successfully updated');
       }
        return redirect()->back()->with('message', 'Error update');
    }
    // Aqui é onde realizamos o Delete  no banco de dados do livro pelo sei ID
    public function destroy(string $id)
    {
        $this->book->where('book_id', $id,)->delete();
        return redirect()->route('books.index');
    }
    //Função criada para retornar todos os livros em json para uma tratativa em alguma ferramenta de frontend como o react.
    public function getAll(){
        $Teste = $this->book->all();

        return response()->json($Teste, 200);
    }

}
