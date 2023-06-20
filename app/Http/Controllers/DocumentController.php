<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentStore;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DocumentUpdate;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::All();
        $documents = Document::All();
        $search = '';
        return view('documents.index', compact('categories', 'documents', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('documents.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentStore $request)
    {
        $validatedData = $request->validated();
        $slug = Str::slug($validatedData['name'], '-') . '.' . $validatedData['file']->extension();
        $validatedData['file']->move(public_path('files'), $slug);
        $validatedData['file'] = $slug;
        Document::create($validatedData);
        return redirect()->route('documents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $categories = Category::All();
        return view('documents.edit', compact('categories', 'document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentUpdate $request, Document $document)
    {

        $validatedData = $request->validated();

        if ($request->hasFile('file')) {
            $slug = Str::slug($validatedData['name'], '-') . '.' . $validatedData['file']->extension();
        
            // Delete the old file if it exists
            if ($document->file) {
                $filePath = public_path('files/' . $document->file);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }
        
            // Store the new file
            $validatedData['file']->move(public_path('files'), $slug);
            $validatedData['file'] = $slug;
        }
        

        $document->update($validatedData);

        return redirect()->route('documents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        $document->delete();
        $filePath = public_path('files/' . $document->file);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        return redirect()->route('documents.index');
    }    


    public function search(Request $request)
    {
        $search = $request->input('search');
        $documents = Document::where('name', 'like', '%' . $search . '%')->get();
        $categories = Category::all();
        return view('documents.index', compact('documents', 'categories', 'search'));
    }

}
