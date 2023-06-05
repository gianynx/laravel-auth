@extends('layouts.admin')

@section('content')
    <section class="container pt-5 pb-5">
        <h1 class="pb-4">Edit this post: {{ $post['title'] }}</h1>
        <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="image" class="form-label">Image URL</label>
                <input type="url" class="form-control" name="image" id="image" aria-describedby="imageHelp"
                    value="{{ $post['image'] }}" minlength="3" maxlength="200" required>
                <div id="imageHelp" class="form-text">Insert a image URL!</div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp"
                    value="{{ $post['title'] }}" minlength="3" maxlength="200" required>
                <div id="titleHelp" class="form-text">Insert a title!</div>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <div>
                    <textarea name="body" id="body" cols="170" rows="7" minlength="3" required></textarea>
                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </form>
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
    </section>
@endsection
