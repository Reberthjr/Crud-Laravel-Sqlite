@extends('master')

@section('content')

<div class="container d-flex flex-column min-vh-100">
    <div class="flex-grow-1">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Books</h2>
            <a href="{{ route('books.create') }}" class="btn btn-success">Add a Book</a>
        </div>

        <form action="{{ route('books.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search books" value="{{ request()->input('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <hr>

        <ul class="list-group">
            @foreach ($books as $book)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $book->bookName }}
                    <div>
                        <a href="{{ route('books.show', ['book' => $book->book_id]) }}" class="btn btn-info btn-sm">About</a>
                        <a href="{{ route('books.edit', ['book' => $book->book_id]) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', ['book' => $book->book_id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?');">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @if ($currentPage > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ route('books.index', ['page' => $currentPage - 1, 'search' => request()->input('search')]) }}">Previous</a>
                        </li>
                    @endif

                    @for ($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ route('books.index', ['page' => $i, 'search' => request()->input('search')]) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($currentPage < $totalPages)
                        <li class="page-item">
                            <a class="page-link" href="{{ route('books.index', ['page' => $currentPage + 1, 'search' => request()->input('search')]) }}">Next</a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    <footer class="mt-auto">
        <div class="text-center p-3">
            © 2024 Your Footer Content
        </div>
    </footer>
</div>

@endsection
