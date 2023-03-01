<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;
use App\Http\Requests\MarkerSelectRequest;

class SelectController extends Controller
{
    public function selectMarker(MarkerSelectRequest $request){

        $request->validated();

        $marker = Marker::findorfail($request->uuid);

        return response()->json([
            'status' => true,
            'UUID' => $marker->uuid,
            'name'  => $marker->name,
            'description'   =>  $marker->description,
            'author'    =>  $marker->author,
            'created_at'    =>  $marker->created_at,
            'lng' => $marker->lng,
            'lat' => $marker->lat,

        ]);



    }

    public function getMarkers(){
        return Marker::all();
    }
}
