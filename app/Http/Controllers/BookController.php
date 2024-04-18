<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = book::get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string',
            'isbn' => 'required|string',
            'authors' => 'required|string',
            'country' => 'required|string',
            'number_of_pages' => 'required|integer|min:1',
            'publisher' => 'required|string',
            'release_date' => 'required|date',
        ];
    
        // Validate the request
        $validatedData = $request->validate($rules);
    
        // Create a new book record
        book::create($validatedData);
    
        // Redirect back with success message
        return redirect()->back()->with('status', 'Book created successfully.');
    }

    public function edit(int $id)
    {
        $books = book::findOrFail($id);
        return view('books.edit', compact('books'));
    }

    public function update(Request $request, int $id)
    {

        // $id = (int)$id;
        $bookId = $request->input('book_id');

        $rules = [
            'name' => 'required|string',
            'isbn' => 'required|string',
            'authors' => 'required|string',
            'country' => 'required|string',
            'number_of_pages' => 'required|integer|min:1',
            'publisher' => 'required|string',
            'release_date' => 'required|date',
        ];
    
        // Validate the request
        $validatedData = $request->validate($rules);
    
        // Create a new book record
        book::findOrFail($bookId)->update($validatedData);
    
        // Redirect back with success message
        return redirect()->back()->with('status', 'Book Updated successfully.');
    }

    public function destroy(int $id)
    {

        $books = book::findOrFail($id);
        $books->delete();

        return redirect()->back()->with('status', 'Book Deleted successfully.');

    }
}
