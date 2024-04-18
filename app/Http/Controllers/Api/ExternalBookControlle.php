<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ExternalBookController extends Controller
{
    public function index(Request $request)
    {
        $nameOfABook = $request->input('name');

        // Make a request to the Ice And Fire API to fetch books based on the provided name
        $response = Http::get('https://anapioficeandfire.com/api/books', [
            'name' => $nameOfABook
        ]);

        if ($response->successful()) {
            $books = $response->json();
            return response()->json($books);
        } else {
            return response()->json(['error' => 'Failed to fetch external books'], $response->status());
        }
    }
}
