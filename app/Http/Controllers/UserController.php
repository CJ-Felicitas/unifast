<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Get a list of users
    public function index()
    {
        $users = user_User::all();
        return response()->json($users);
    }

    // Get details of a specific user
    public function show($id)
    {
        $user = user_User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            // Add any additional validation rules as needed
        ]);

        // Hash the password before saving
        $request['password'] = Hash::make($request['password']);

        $user = user_User::create($request->all());

        return response()->json($user, 201);
    }

    // Update the specified user in the database
    public function update(Request $request, $id)
    {
        $user = user_User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|min:6', // Password is only required on update if provided
            // Add any additional validation rules as needed
        ]);

        // Hash the password if it's present in the request
        if ($request->has('password')) {
            $request['password'] = Hash::make($request['password']);
        }

        $user->update($request->all());

        return response()->json($user, 200);
    }

    // Remove the specified user from the database
    public function destroy($id)
    {
        $user = user_User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
