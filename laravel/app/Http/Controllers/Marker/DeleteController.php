<?php

namespace App\Http\Controllers\Marker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marker;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MarkerDeleteRequest;

class DeleteController extends Controller
{
    public function deleteMarker(MarkerDeleteRequest $request){

        $request->validated();

        $marker = Marker::findorfail($request->uuid);
        $marker->delete();

        return response()->json([
            'status' => true,
            "message' => 'Marker of UUID {$request->uuid} deleted successfully",
        ], 200);

    }

}
