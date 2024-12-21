@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog List</h1>
    <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Blog</a>
    <ul>
        @foreach($blogs as $blog)
            <li>
                <h2><a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a></h2>
                <p>{{ Str::limit($blog->content, 100) }}</p>
                <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('blogs.destroy', $blog) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
