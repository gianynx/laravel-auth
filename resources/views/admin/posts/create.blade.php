@extends('layouts.admin')

@section('page_title')
    Create a new project
@endsection

@section('content')
    <section class="container pt-5 pb-5">
        <h1 class="pb-4">Create a new project</h1>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Image URL</label>
                <input type="url" class="form-control" name="image" id="image" aria-describedby="imageHelp"
                    minlength="3" maxlength="200" required>
                <div id="imageHelp" class="form-text">Insert a image URL!</div>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp"
                    minlength="3" maxlength="200" required>
                <div id="titleHelp" class="form-text">Insert a title!</div>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label fw-bold">Body</label>
                <div>
                    <textarea name="body" id="body" cols="193" rows="7" minlength="3" required></textarea>
                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="btn btn-outline-dark text-uppercase">Submit</button>
                <button type="reset" class="btn btn-outline-dark text-uppercase">Reset</button>
            </div>
        </form>
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
    </section>
@endsection
