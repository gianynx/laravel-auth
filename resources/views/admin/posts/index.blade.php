@extends('layouts.admin')

@section('page_title')
    Laravel Projects
@endsection

@section('content')
    <div class="container">
        <div class="text-center pt-5 pb-5">
            <h1>Laravel Projects</h1>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $post->id }}</td>
                        <td><img class="img-fluid w-25" src="{{ $post->image }}" alt="{{ $post->title }}"></td>
                        <td class="fs-4">{{ $post->title }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.posts.show', $post->slug) }}">
                                    <i class="fa-solid fa-eye fs-2"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-outline-dark text-uppercase" href="{{ route('admin.posts.create') }}">create a new project</a>
        {{ $posts->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
