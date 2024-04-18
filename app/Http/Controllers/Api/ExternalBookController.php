<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ExternalBookController extends Controller
{
    public function index(Request $request)
    {
        $nameOfABook = $request->input('name');
        
        // Make a GET request to the external API
        $response = Http::get('https://www.anapioficeandfire.com/api/books', [
            'name' => $nameOfABook,
        ]);
    
        // Retrieve the JSON response body
        $books = $response->json();
    
        // Check if the response is empty
        if (empty($books)) {
            return response()->json(['message' => 'No books found for the specified query'], 404);
        }
    
        return response()->json($books);
    }
    

    // public function index(Request $request)
    // {
    //     return Http::get('https://anapioficeandfire.com/api/books');
    // }

}
