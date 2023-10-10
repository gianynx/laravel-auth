<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     *
     */
    public function store(StorePostRequest $request)
    {
        // Ottiene i dati validati dal $request. Questo suggerisce che il $request è stato convalidato utilizzando delle regole definite precedentemente (nella classe di richiesta StorePostRequest).
        $formData = $request->validated();

        // Crea uno "slug" dal titolo del post.
        $slug = Str::slug($request->title, '-');

        // Aggiunge lo "slug" al array $formData, che conterrà i dati validati insieme all'aggiunta dello "slug".
        $formData['slug'] = $slug;

        // Carica l'immagine nel sistema di archiviazione.
        $imgPath = Storage::put('uploads', $request->image);

        // asset() è un helper di Laravel che genera un URL completo a partire dal percorso relativo. In questo caso, sta creando un URL completo per l'immagine appena caricata.
        $formData['image'] = asset('storage/' . $imgPath);

        // Crea un nuovo post nel database utilizzando i dati forniti.
        $post = Post::create($formData);

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     *
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     *
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     *
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $formData = $request->validated();
        $slug = Str::slug($request->title, '-');
        $formData['slug'] = $slug;

        // Aggiorna il post nel database utilizzando i dati forniti.
        $post->update($formData);

        // Il metodo with() viene utilizzato per flashare un messaggio di sessione alla richiesta di reindirizzamento. Questo significa che il messaggio sarà disponibile nella sessione per una sola richiesta successiva e verrà visualizzato nella vista a cui si viene reindirizzati.
        return redirect()->route('admin.posts.show', $post->slug)->with('message', 'The post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     *
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'The post was deleted successfully!');
    }
}
