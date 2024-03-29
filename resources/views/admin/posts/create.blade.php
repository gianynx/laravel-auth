@extends('layouts.admin')

@section('page_title')
    Create a new project
@endsection

@section('content')
    <section class="container pt-5 pb-5">
        <h1 class="pb-4">Create a new project</h1>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Image</label>

                {{-- @error('image') is invalid è una direttiva che verifica se ci sono errori di validazione associati al campo 'image'. Se ci sono errori, questa parte del codice viene eseguita. --}}
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image"
                    aria-describedby="imageHelp" required>
                <div id="imageHelp" class="form-text">Insert a image!</div>

                {{-- Questa direttiva verifica ancora una volta se ci sono errori di validazione associati al campo 'image'. Se ci sono, il codice all'interno verrà eseguito. In questo caso, viene visualizzato un messaggio di errore. --}}
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    id="title" aria-describedby="titleHelp" minlength="3" maxlength="255" required>
                <div id="titleHelp" class="form-text">Insert a title!</div>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label fw-bold">Body</label>
                <div>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" cols="193"
                        rows="7" minlength="3" minlength="3" maxlength="200" required>
                    </textarea>
                </div>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="pt-4">
                <button type="submit" class="btn btn-outline-dark text-uppercase">Submit</button>
                <button type="reset" class="btn btn-outline-dark text-uppercase">Reset</button>
            </div>
        </form>

        {{-- Questi due script stanno configurando NicEdit (libreria JavaScript) per sostituire i campi di testo multi-riga predefiniti con un editor di testo più avanzato e interattivo. --}}
        <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>
    </section>
@endsection
