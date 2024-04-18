<?php

namespace App\Http\Controllers\Api;

use App\Models\book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class bookController extends Controller
{
    public function index()
    {

        $book = book::all();

        if($book->count() > 0){

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'data' => $book
            ], 200);
        }else{

            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'data' => $book
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'isbn' => 'required|string|max:20',
            'authors' => 'required|array',
            'authors.*' => 'string',
            'country' => 'required|string|max:255',
            'number_of_pages' => 'required|integer|min:1',
            'publisher' => 'required|string|max:255',
            'release_date' => 'required|date',
        ]);

        if($validator->fails()){
            return response()->json([
                'status_code' => 422,
                'status' => 'error',
                'message' => $validator->messages()
            ], 422);
        }else{

            // $book = book::create([
            //     'name' => $request->name,
            //     'isbn' => $request->isbn,
            //     'authors' => $request->authors,
            //     'country' => $request->country,
            //     'number_of_pages' => $request->number_of_pages,
            //     'publisher' => $request->publisher,
            //     'release_date' => $request->release_date
            // ]);

            // Serialize the authors array into a JSON string
            $authors = json_encode($request->input('authors'), JSON_UNESCAPED_SLASHES);

            // Create a new book using the validated data
            $bookData = $validator->validated();
            $bookData['authors'] = $authors;

            $book = book::create($bookData);


            return response()->json([
                'status_code' => 201,
                'status' => 'success',
                'data' => [
                    'book' => $book
                    ]
            ], 201);
        }
    }

    public function show($id)
    {
        $book = book::find($id);
        if($book){
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'data' => [
                    'book' => $book
                    ]
            ], 200);
        }else{
            return response()->json([
                'status_code' => 201,
                'status' => 'success',
                'data' => []
            ], 201);
        }
    }

    public function update(Request $request, int $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'isbn' => 'required|string|max:20',
            'authors' => 'required|array',
            'authors.*' => 'string',
            'country' => 'required|string|max:255',
            'number_of_pages' => 'required|integer|min:1',
            'publisher' => 'required|string|max:255',
            'release_date' => 'required|date',
        ]);

        if($validator->fails()){
            return response()->json([
                'status_code' => 422,
                'status' => 'error',
                'message' => $validator->messages()
            ], 422);
        }else{

            $book = book::find($id);

            // get the initial book name
            $book_name = $book->name;
            
            if($book){
                // Serialize the authors array into a JSON string
                $authors = json_encode($request->input('authors'), JSON_UNESCAPED_SLASHES);
    
                // Create a new book using the validated data
                $bookData = $validator->validated();

                $bookData['authors'] = $authors;
                $book->update($bookData);
                
                return response()->json([
                    'status_code' => 200,
                    'status' => 'success',
                    'message' => 'The book '. $book_name .' was updated successfully',
                    'data' => [
                        'book' => $book
                        ]
                ], 200);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => "No such book found!"
                ], 404);
            }
        }

    }

    public function destroy($id)
    {
        $book = book::find($id);
        if($book){
            $book->delete();
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'message' => 'The book '. $book->name .' was deleted successfully',
                'data' => [
                    'book' => $book
                    ]
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => "No Such book Found!"
            ], 404);
        }
    }
}
