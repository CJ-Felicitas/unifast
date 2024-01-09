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
        // Retrieve all admins
        $admins = user_Admin::all();

        // Check if the retrieved collection is not empty
        if(!$admins->isEmpty()){
            // If there are admins, return them along with a success status
            return response()->json([
                'status' => 200,
                'Admin' =>  $admins
            ], 200);
        }
        else{
            // If there are no admins, return a 404 status and a message indicating no records were found
            return response()->json([
                'status' => 404,
                'Admin' =>  'No Record Found'
            ], 404);
        }
    }

     // Get details of a specific admin
    public function show($id)
    {
        try {
            // Attempt to find the admin with the given ID
            $admin = user_Admin::findOrFail($id);

            // If the admin is found, return its details along with a success message
            return response()->json([
                'status' => 200,
                'message' => 'Admin credential is available',
                'Admin' => $admin
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If the admin is not found, return a 404 error
            return response()->json([
                'status' => 404,
                'Error' => "Admin not Found"
            ], 404);
        }
    }



        // Store a newly created user in the database
        public function store(Request $request)
        {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email|unique:admins',
                'role' => 'required|string|in:admin,user,swdaAdmin,cbssAdmin,hrAdmin,osdAdmin',
                'password' => 'required|min:4',
            ]);

            // If validation fails, return the errors
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            // Hash the password before storing
            $hashedPassword = bcrypt($request->input('password'));

            // Create a new admin with the validated data
            $admin = user_Admin::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
                'password' => $hashedPassword,
            ]);

            // Return a success message along with the created admin data
            return response()->json(['admin' => $admin, 'message' => 'Admin created successfully'], 201);
        }



    // Update the specified admin in the database
    public function update(Request $request, $id)
    {
        try {
            // Attempt to find the admin with the given ID
            $admin = user_Admin::findOrFail($id);

            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email|unique:admins,email,' . $id,
                'role' => 'required|string|in:admin,user,swdaAdmin,cbssAdmin,hrAdmin,osdAdmin',
                'password' => 'sometimes|min:4', // Password is only required on update if provided
                // Add any additional validation rules as needed
            ]);

            // If validation fails, return the errors
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            // If a password is provided in the request, hash it before storing
            if ($request->has('password')) {
                $request['password'] = bcrypt($request['password']);
            }

            // Update the admin with the validated data
            $admin->update($request->all());

            // Return a success message along with the updated admin data
            return response()->json(['user' => $admin, 'message' => 'Admin updated successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If the admin is not found, return a 404 error
            return response()->json(['error' => 'Admin not found'], 404);
        }
    }


    // Delete the specified admin from the database
    public function destroy($id)
    {
        try {
            // Attempt to find the admin with the given ID
            $admin = user_Admin::findOrFail($id);

            // If the admin is found, delete it
            $admin->delete();

            // Return a success message
            return response()->json(['message' => 'Admin deleted successfully'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If the admin is not found, return a 404 error
            return response()->json(['error' => 'Admin not found'], 404);
        } catch (\Exception $e) {
            // If any other error occurs (e.g., a database error), return a 500 error
            // The actual error message is not returned for security reasons
            return response()->json(['error' => 'Failed to delete admin'], 500);
        }
    }



    public function login(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        // If validation fails, return the errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Try to find the admin with the provided email
        $admin = user_Admin::firstWhere('email', $request->input('email'));

        // If no admin was found, return an error
        if (!$admin) {
            return response()->json(['error' => 'Admin not found'], 404);
        }

        // Check if the provided password matches the admin's password
        if (Hash::check($request->input('password'), $admin->password)) {
            // If the password matches, return the admin's details
            return response()->json(['Response' => "Accepted", 'Name' => $admin->name, 'Role' => $admin->role], 200);
        } else {
            // If the password doesn't match, return an error
            return response()->json(['error' => 'Password mismatch'], 400);
        }
    }


}
