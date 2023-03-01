<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserDeleteRequest;

class DeleteUserController extends Controller
{
    public function deleteUser(UserDeleteRequest $request)
    {
        $request->validated();

            $user = User::where('uuid', $request->uuid);

            $user->delete();

            return response()->json([
                'status' => true,
                "message' => 'User of UUID {$request->query('uuid')} deleted successfully"
            ], 200);
        }

    
}

