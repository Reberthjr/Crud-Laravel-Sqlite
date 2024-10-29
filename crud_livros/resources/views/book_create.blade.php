@extends('master')

@section('content')

<div class="container d-flex flex-column min-vh-100">
    <div class="flex-grow-1">
        <h2 class="mt-4">Edit Book</h2>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="bookName" class="form-label">Book Name</label>
                <input type="text" name="bookName" class="form-control" placeholder="Enter book name" required>
            </div>
            <div class="mb-3">
                <label for="bookAuthor" class="form-label">Book Author</label>
                <input type="text" name="bookAuthor" class="form-control" placeholder="Enter book author" required>
            </div>
            <div class="mb-3">
                <label for="bookDescripition" class="form-label">Book Descripition</label>
                <input type="text" name="bookAuthor" class="form-control" placeholder="Enter book Descripition" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books List</a>
        </form>
    </div>

    <footer class="mt-auto">
        <div class="text-center p-3">
            © 2024 Your Footer Content
        </div>
    </footer>
</div>

@endsection
