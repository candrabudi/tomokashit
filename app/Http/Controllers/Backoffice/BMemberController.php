<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BMemberController extends Controller
{
    public function index()
    {
        return view('backoffice.member.index');
    }

    public function getAllUsers(Request $request)
    {
        $query = $request->input('query');
        $perPage = $request->input('per_page', 10);

        $users = User::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('username', 'like', '%' . $query . '%');
        })->paginate($perPage);

        return response()->json($users);
    }
}
