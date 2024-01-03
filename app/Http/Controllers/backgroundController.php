<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class backgroundController extends Controller
{

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Always use 'latest.jpg' as the image name
        $imageName = 'latest.jpg';

        // Delete the old image if it exists
        if (file_exists(public_path('assets/' . $imageName))) {
            unlink(public_path('assets/' . $imageName));
        }

        // Move the uploaded image to the public/assets directory
        $request->image->move(public_path('assets'), $imageName);

        return response()->json([
            'success' => true,
            'image' => $imageName
        ]);
    }

    public function latest()
    {
        // The name of the latest image
        $latestImage = 'latest.jpg';

        // Check if the image file exists
        if (file_exists(public_path('assets/' . $latestImage))) {
            // Generate a URL for the image file
            $imageUrl = asset('assets/' . $latestImage);
        } else {
            // If the image file does not exist, return an error message
            return response()->json([
                'error' => 'No latest image found',
            ], 404);
        }

        return response()->json([
            'image' => $imageUrl,
        ]);
    }

}
