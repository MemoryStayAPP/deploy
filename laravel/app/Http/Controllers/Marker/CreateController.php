<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;
use App\Http\Requests\MarkerCreateRequest;
use Illuminate\Support\Str;

class CreateController extends Controller
{
    public function createMarker(MarkerCreateRequest $request)
    {

        $request->validated();
        
        $marker = Marker::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'description' => $request->description,
            'author' => $request->author,
            'lng' => $request->lng,
            'lat' => $request->lat

        ]);

        return response()->json([
            'status' => true,
            'message' => "Marker of UUID {$marker->uuid} created"
        ], 200);

    }

}
