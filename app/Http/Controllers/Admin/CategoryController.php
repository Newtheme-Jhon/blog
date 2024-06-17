<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{

    public function __construct(){

        $this->middleware('can:admin.categories.index');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $category = Category::create( $request->all() );
        return redirect()
        ->route('admin.categories.edit', $category)
        ->with('info', 'La categoría se creo correctamente');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //validate form
        $request->validate([
            'nombre' => 'required',
            'slug' => "required|unique:categories,slug,$category->id"
        ]);
        
        $category->update($request->all());
        return redirect()
        ->route('admin.categories.edit', $category)
        ->with('info', 'La categoría se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //Eliminar categoría
        $category->delete();
        return redirect()
        ->route('admin.categories.index')
        ->with('info', 'La categoría: '.$category->nombre.' ha sido eliminada');
    }
}
