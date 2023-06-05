@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Index Page</h1>
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
                        <td><img class="img-fluid w-50" src="{{ $post->image }}" alt="{{ $post->title }}"></td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <div>
                                <a href="{{ route('admin.posts.show', $post->slug) }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Crea un nuovo post!</a>
    </div>
@endsection
