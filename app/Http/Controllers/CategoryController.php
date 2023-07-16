<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\CategoryUpdate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('before');
        $search = '';
        $categories = Category::paginate(10);
        return view('categories.index', compact("categories","search"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStore $request)
    {
        Gate::authorize('before');
        $request->validated();
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        Gate::authorize('view', $category);
        Auth::user()->role === 0 ? $categories = Category::All() : $categories = Auth::user()->categories;
        $search = '';
        $name = $category->name;
        $documents = $category->documents()->paginate(10);
        return view('documents.index', compact("documents","search","name","categories"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdate $request, Category $category)
    {
        Gate::authorize('before');
        $request->validated();
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Gate::authorize('before');
        $category->delete();
        return redirect()->route('categories.index');
    }
        /**
     * Search the specified resource from storage.
     */
    public function search(Request $request)
    {
        Gate::authorize('before');
        $search = $request->input('search');
        $categories = Category::where('name','like', '%'.$search.'%')->get();
        return view('categories.index', compact("categories","search") );
    }

}
