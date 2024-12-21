@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $blog->title }}</h1>
    @if($blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="max-width: 100%;">
    @endif
    <p>{{ $blog->content }}</p>

    <hr>
    <h3>Comments</h3>
    <ul>
        @foreach($blog->comments as $comment)
            <li>
                <strong>{{ $comment->author_name }}</strong>: {{ $comment->comment }}
            </li>
        @endforeach
    </ul>

    <hr>
    <h3>Leave a Comment</h3>
    <form action="{{ route('comments.store', $blog) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="author_name">Your Name:</label>
            <input type="text" name="author_name" id="author_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="comment">Your Comment:</label>
            <textarea name="comment" id="comment" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Post Comment</button>
    </form>
    <h3>Comments</h3>
    @foreach($blog->comments as $comment)
    <div class="mb-2">
        <strong>{{ $comment->author_name }}</strong>
        <p>{{ $comment->comment }}</p>
        <small>{{ $comment->created_at->diffForHumans() }}</small>
    </div>
    @endforeach
</div>
@endsection
