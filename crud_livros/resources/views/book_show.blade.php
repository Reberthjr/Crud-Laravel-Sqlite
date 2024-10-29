@extends('master')

@section('content')

<div class="container d-flex flex-column min-vh-100">
    <div class="flex-grow-1">
        <h2 class="mt-4">About</h2>
        <hr>
        <h2 class="mt-3">Book: {{ $book->bookName }}</h2>
        <h3>Author: {{ $book->bookAuthor }}</h3>
        <h4>Description:</h4>
        <p>{{ $book->bookDescription }}</p>

        <div class="mt-4">
            <form action="{{ route('books.destroy', ['book' => $book->book_id]) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?');">Delete Book</button>
            </form>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books List</a>
        </div>
    </div>

    <footer class="mt-auto">
        <div class="text-center p-3">
            © 2024 Your Footer Content
        </div>
    </footer>
</div>

@endsection
