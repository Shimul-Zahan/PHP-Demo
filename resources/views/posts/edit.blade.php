@extends('layout')

@section('content')
<h1>Edit Post</h1>
<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div>
        <label>Content</label>
        <textarea name="content">{{ $post->content }}</textarea>
    </div>
    <button type="submit">Update</button>
</form>
@endsection