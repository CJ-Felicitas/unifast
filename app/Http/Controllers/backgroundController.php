<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\backgroundModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class backgroundController extends Controller
{
    // public function upload(Request $request, backgroundModel $background)
    //     {
    //         $request->validate([
    //             'image' => 'required|string',
    //         ]);

    //         $imageName = $request->image;

    //         $background->image_path = Storage::url('backgrounds/'.$imageName);
    //         $background->save();

    //         return response()->json([
    //             'success' => true,
    //             'image' => $imageName
    //         ]);
    //     }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|string',
    //     ]);

    //     $imageName = $request->image;

    //     $background = backgroundModel::find(2);
    //     if (!$background) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'No background found with ID 1'
    //         ], 404);
    //     }

    //     $background->image_path = Storage::url('backgrounds/'.$imageName);
    //     $background->save();

    //     return response()->json([
    //         'success' => true,
    //         'image' => $imageName
    //     ]);
    // }

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

    // function getImagePath(){
    //     $backgrounds = backgroundModel::select('image_path')->get();

    //     if ($backgrounds->isEmpty()) {
    //         return response()->json(['error' => 'No backgrounds found'], 404);
    //     }

    //     return $backgrounds;
    // }
}
