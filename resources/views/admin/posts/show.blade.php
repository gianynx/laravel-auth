@extends('layouts.admin')

@section('page_title')
    Laravel Project
@endsection

@section('content')
    <div class="container text-center">
        <div class="pt-5 pb-5">
            <h1>{{ $post->title }}</h1>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="mx-auto w-50">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-100">
        </div>
        <p class="pt-4 pb-5">{{ $post->body }}</p>
        <div class="pb-5">
            <a class="btn btn-outline-dark text-uppercase" href="{{ route('admin.posts.edit', $post->slug) }}">
                edit this project
            </a>
            <form action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST" class="pt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger text-uppercase">delete this project</i></button>
            </form>
        </div>
    </div>
@endsection
