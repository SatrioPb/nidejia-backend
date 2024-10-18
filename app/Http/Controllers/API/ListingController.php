<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(): JsonResponse
    {
        $listings = Listing::withCount('transaction')->orderBy("id", "desc")->paginate();

        return response()->json([
            'success' => true,
            'message' => 'get all listing',
            'data' => $listings
        ]);
    }

    public function show (Listing $listing): JsonResponse{

    return response()->json([
        'success'=> true,
        'message'=> 'Get detail listing',
        'data'=> $listing
    ]);

    }
}