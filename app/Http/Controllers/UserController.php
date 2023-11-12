<?php

namespace App\Http\Controllers;

use App\Models\user_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

   // Get a list of user credentials
   public function index()
   {
       $users = user_User::all();

       if($users->count() > 0){
           return response()->json([
               'status' => 200,
               'User' =>  $users
           ], 200);
       }
       else{
           return response()->json([
               'status' => 404,
               'User' =>  'No Record Found'
           ], 404);
       }

   }

    // Get details of a specific user
    public function show($id)
       {
           $users = user_User::find($id);

           if($users){
               return response()->json([
                   'status' => 200,
                   'message' => 'User credential is available',
                   'User' => $users
               ], 200);
           }
           else {
               return response()->json([
                   'status' => 404,
                   'Error' => "User not Found"
               ], 404);
           }
       }




       // Store a newly created user in the database
       public function store(Request $request){
           $validator = Validator::make($request->all(),
       [
           'name' => 'required|string',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6',
       ]);

           if ($validator->fails()) {
               return response()->json(['errors' => $validator->errors()], 400);
           }

           $hashedPassword = bcrypt($request->input('password'));

           $users = user_User::create([
               'name' => $request->input('name'),
               'email' => $request->input('email'),
               'password' => $hashedPassword,
           ]);

           return response()->json(['user' => $users, 'message' => 'User created successfully'], 201);
       }



   // Update the specified user in the database
   public function update(Request $request, $id)
   {
       $users = user_User::find($id);

       if (!$users) {
           return response()->json(['error' => 'User not found'], 404);
       }

       $validator = Validator::make($request->all(), [
           'name' => 'required|string',
           'email' => 'required|email|unique:users,email,' . $id,
           'password' => 'sometimes|min:6', // Password is only required on update if provided
           // Add any additional validation rules as needed
       ]);

       if ($validator->fails()) {
           return response()->json(['errors' => $validator->errors()], 400);
       }

       // Hash the password if it's present in the request
       if ($request->has('password')) {
           $request['password'] = bcrypt($request['password']);
       }

       $users->update($request->all());

       return response()->json(['user' => $users, 'message' => 'User updated successfully'], 200);
   }

       //! Remove the specified user from the database NOT YET FIXED
   public function destroy($id)
   {
       $users = user_User::find($id);

       if (!$users) {
           return response()->json(['error' => 'User not found'], 404);
       }

       try {
           $users->delete();
       } catch (\Exception $e) {
           // Handle any potential exception, e.g., database errors
           return response()->json(['error' => 'Failed to delete user'], 500);
       }

       return response()->json(['message' => 'User deleted successfully'], 200);
   }




   public function login(Request $request){
       $validator = Validator::make($request->all(),
       [
           'email' => 'required|email',
           'password' => 'required|min:6',
       ]);

       if ($validator->fails()) {
           return response()->json(['errors' => $validator->errors()], 400);
       }

       $users = user_User::where('email', $request->input('email'))->first();

       if (!$users) {
           return response()->json(['error' => 'User not found'], 404);
       }

       if (Hash::check($request->input('password'), $users->password)) {
           return response()->json(['Response' => "User Accepted"], 200);
       } else {
           return response()->json(['error' => 'Password mismatch'], 400);
       }
   }


}
