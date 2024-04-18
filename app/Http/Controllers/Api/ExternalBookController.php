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

        $nameOfABook = $request->query('name');
        // Get the URL of the books endpoint from the API response
        $booksEndpoint = "https://www.anapioficeandfire.com/api/books";

        // Make a GET request to the books endpoint
        $response = Http::get($booksEndpoint, [
            'name' => $nameOfABook,
        ]);

        // Retrieve the JSON response body
        $books = $response->json();

        // Suppress the characters, mediaType and povCharacters fields from each book in the response
        $books = collect($books)->map(function ($book) {
            return collect($book)->except(['characters', 'povCharacters', 'mediaType'])->all();
        });

        // Check if the response is empty
        if ($books) {
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'data' => [
                    $books
                    ]
            ], 200);
        }else{
            return response()->json([
                'status_code' => 200,
                'status' => 'success',
                'data' => []
            ], 200);
        }
    }

}
