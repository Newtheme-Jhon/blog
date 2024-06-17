<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    public function __construct(){

        $this->middleware('can:admin.tags.index');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $routeName = request()->route()->getName();
        return view('admin.tags.create', compact('routeName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:tags'
        ]);

        $tag = Tag::create( $request->all() );
        return redirect()
        ->route('admin.tags.edit', compact('tag'))
        ->with('info', 'La etiqueta se ha creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $routeName = request()->route()->getName();
        return view('admin.tags.edit', compact('tag', 'routeName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id"
        ]);

        $tag->update( $request->all() );
        return redirect()
        ->route('admin.tags.edit', $tag)
        ->with('info', 'El registro ha sido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()
        ->route('admin.tags.index')
        ->with('info', 'La etiqueta se elimino correctamente');
    }
}
