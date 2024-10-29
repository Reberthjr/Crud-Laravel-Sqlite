@extends('master')

@section('content')

<div class="container d-flex flex-column min-vh-100">
    <div class="flex-grow-1">
        <h2>Edit Book</h2>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('books.update', ['book' => $book->book_id]) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="bookName" class="form-label">Book Name</label>
                <input type="text" name="BookName" id="bookName" class="form-control" value="{{ $book->bookName }}" required>
            </div>

            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Author</label>
                <input type="text" name="BookAuthor" id="bookAuthor" class="form-control" value="{{ $book->bookAuthor }}" required>
            </div>

            <div class="mb-3">
                <label for="bookDescription" class="form-label">Description</label>
                <textarea name="BookDescription" id="bookDescription" class="form-control" rows="3" required>{{ $book->bookDescription }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('books.index') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>

    <footer class="mt-auto">
        <div class="text-center p-3">
            © 2024 Your Footer Content
        </div>
    </footer>
</div>

@endsection
