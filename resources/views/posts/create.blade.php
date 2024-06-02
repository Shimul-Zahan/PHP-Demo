@extends('layout')

@section('content')
<h1>Create Post</h1>
<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title') }}">
    </div>
    <div>
        <label>Content</label>
        <textarea name="content">{{ old('content') }}</textarea>
    </div>
    <button type="submit">Create</button>
</form>
@endsection