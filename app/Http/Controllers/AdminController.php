<?php

namespace App\Http\Controllers;

use App\Models\user_Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

    class AdminController extends Controller
    {


    // Get a list of admin credentials
    public function index()
    {
        $admins = user_Admin::all();

        if($admins->count() > 0){
            return response()->json([
                'status' => 200,
                'Admin' =>  $admins
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'Admin' =>  'No Record Found'
            ], 404);
        }

    }

     // Get details of a specific admin
     public function show($id)
        {
            $admins = user_Admin::find($id);

            if($admins){
                return response()->json([
                    'status' => 200,
                    'message' => 'Admin credential is available',
                    'Admin' => $admins
                ], 200);
            }
            else {
                return response()->json([
                    'status' => 404,
                    'Error' => "Admin not Found"
                ], 404);
            }
        }




        // Store a newly created user in the database
        public function store(Request $request){
            $validator = Validator::make($request->all(),
        [
            'name' => 'required|string',
            'email' => 'required|email|unique:admins',
            'role' => 'required|string|in:admin,user',
            'password' => 'required|min:4',

        ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            $hashedPassword = bcrypt($request->input('password'));

            $admin = user_Admin::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'password' => $hashedPassword,
            ]);

            return response()->json(['admin' => $admin, 'message' => 'Admin created successfully'], 201);
        }



    // Update the specified admin in the database
    public function update(Request $request, $id)
    {
        $admin = user_Admin::find($id);

        if (!$admin) {
            return response()->json(['error' => 'Admin not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email,' . $id,
            'role' => 'required|string|in:admin,user',
            'password' => 'sometimes|min:4', // Password is only required on update if provided
            // Add any additional validation rules as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Hash the password if it's present in the request
        if ($request->has('password')) {
            $request['password'] = bcrypt($request['password']);
        }

        $admin->update($request->all());

        return response()->json(['user' => $admin, 'message' => 'Admin updated successfully'], 200);
    }

        //! Remove the specified admin from the database NOT YET FIXED
    public function destroy($id)
    {
        $admin = user_Admin::find($id);

        if (!$admin) {
            return response()->json(['error' => 'Admin not found'], 404);
        }

        try {
            $admin->delete();
        } catch (\Exception $e) {
            // Handle any potential exception, e.g., database errors
            return response()->json(['error' => 'Failed to delete admin'], 500);
        }

        return response()->json(['message' => 'Admin deleted successfully'], 200);
    }




    public function login(Request $request){
        $validator = Validator::make($request->all(),
        [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $admin = user_Admin::where('email', $request->input('email'))->first();

        if (!$admin) {
            return response()->json(['error' => 'Admin not found'], 404);
        }

        if (Hash::check($request->input('password'), $admin->password)) {
            return response()->json(['Response' => "Accepted", 'Name' => $admin->name, 'Role' => $admin->role], 200);
        } else {
            return response()->json(['error' => 'Password mismatch'], 400);
        }
    }


    //     public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:4',
    //     ]);

    //     if (!Auth::attempt($credentials)) {
    //         return response()->json(['error' => 'Invalid credentials'], 401);
    //     }

    //     $admin = Auth::user();
    //     $token = $admin->createToken('AdminToken')->accessToken;

    //     return response()->json(['token' => $token, 'role' => $admin->role], 200);
    // }
}
