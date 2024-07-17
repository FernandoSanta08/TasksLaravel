<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'color' => 'required|max:7'
        ]);

        $category = new Category;
        $category -> name = $request -> name;
        $category -> color = $request -> color;

        $category -> save();

        return redirect()->route('categories.index')->with('success', 'Categoria creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show', ['category' => $category]);       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category -> name = $request -> name;
        $category -> color = $request -> color;
        $category -> save();

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category -> tasks()->each(function($task){
            $task -> delete();
        });
        $category -> delete();

        return redirect()->route('categories.index')->with('success', 'Categoria eliminada correctamente');
    }
}
