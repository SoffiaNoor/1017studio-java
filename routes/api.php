<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/upload-image-360', function (Request $request) {
    try {
        $request->validate([
            'image_360' => 'required|image|mimes:jpg',
            'timestamp' => 'required', // Add timestamp validation
        ]);

        $timestamp = $request->input('timestamp');

        if ($image = $request->file('image_360')) {
            $destinationPath = 'images/projectTypeImage360/image_360/';
            $profileImage = "image_360" . "-" . $timestamp . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);

            // Formulate full URL or domain along with the path
            $fullImagePath = url('/') . '/' . $destinationPath . $profileImage;

            return response()->json(['path' => $fullImagePath], 200);
        }

        return response()->json(['error' => 'Image upload failed!'], 400);
    } catch (\Exception $e) {
        Log::error('Upload Image 360 Error: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
});

Route::delete('/delete-image-360', function (Request $request) {
    try {
        $request->validate([
            'image_path' => 'required',
        ]);

        $imagePath = public_path($request->input('image_path'));

        if (file_exists($imagePath)) {
            unlink($imagePath);
            return response()->json(['success' => true, 'message' => 'Image deleted successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Image not found'], 404);
        }
    } catch (\Exception $e) {
        Log::error('Delete Image Error: ' . $e->getMessage());
        return response()->json(['success' => false, 'message' => 'Internal Server Error'], 500);
    }
});
