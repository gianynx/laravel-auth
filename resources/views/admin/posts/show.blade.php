@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Show Page</h1>
        <h2>{{ $post->title }}</h2>
        <img src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>{{ $post->body }}</p>
        <div>
            <a href="{{ route('admin.posts.edit', $post->slug) }}">
                <i class="fa-solid fa-pencil"></i>
            </a>
            <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>
@endsection
