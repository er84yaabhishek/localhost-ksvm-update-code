<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::ordered()->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Get all banners for DataTable
     */
    public function getData()
    {
        $banners = Banner::ordered()->get();
        return response()->json(['data' => $banners]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
                'order' => 'required|integer|min:0',
                'status' => 'required|in:active,inactive'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->except('image');

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                
                // Resize image to 1920x600
                $imageName = time() . '_' . uniqid() . '.jpg';
                $destinationPath = public_path('front/img/banners/' . $imageName);
                
                // Create image from uploaded file
                $sourceImage = imagecreatefromstring(file_get_contents($image));
                
                // Create new image with target dimensions
                $resizedImage = imagecreatetruecolor(1920, 800);
                
                // Resize and copy
                imagecopyresampled(
                    $resizedImage,
                    $sourceImage,
                    0, 0, 0, 0,
                    1920, 800,
                    imagesx($sourceImage),
                    imagesy($sourceImage)
                );
                
                // Save as JPEG
                imagejpeg($resizedImage, $destinationPath, 90);
                
                // Free memory
                imagedestroy($sourceImage);
                imagedestroy($resizedImage);
                
                $data['image'] = 'front/img/banners/' . $imageName;
            }

            $banner = Banner::create($data);

            return response()->json([
                'success' => true,
                'message' => 'Banner created successfully',
                'data' => $banner
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating banner: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return response()->json([
            'success' => true,
            'data' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'subtitle' => 'nullable|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
                'order' => 'required|integer|min:0',
                'status' => 'required|in:active,inactive'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $data = $request->except('image');

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                
                // Delete old image
                if ($banner->image && file_exists(public_path($banner->image))) {
                    unlink(public_path($banner->image));
                }
                
                // Resize image to 1920x600
                $imageName = time() . '_' . uniqid() . '.jpg';
                $destinationPath = public_path('front/img/banners/' . $imageName);
                
                // Create image from uploaded file
                $sourceImage = imagecreatefromstring(file_get_contents($image));
                
                // Create new image with target dimensions
                $resizedImage = imagecreatetruecolor(1920, 800);
                
                // Resize and copy
                imagecopyresampled(
                    $resizedImage,
                    $sourceImage,
                    0, 0, 0, 0,
                    1920, 800,
                    imagesx($sourceImage),
                    imagesy($sourceImage)
                );
                
                // Save as JPEG
                imagejpeg($resizedImage, $destinationPath, 90);
                
                // Free memory
                imagedestroy($sourceImage);
                imagedestroy($resizedImage);
                
                $data['image'] = 'front/img/banners/' . $imageName;
            }

            $banner->update($data);

            return response()->json([
                'success' => true,
                'message' => 'Banner updated successfully',
                'data' => $banner
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating banner: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        try {
            // Delete image file
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }

            $banner->delete();

            return response()->json([
                'success' => true,
                'message' => 'Banner deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting banner: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update banner status
     */
    public function updateStatus(Request $request, Banner $banner)
    {
        try {
            $validator = Validator::make($request->all(), [
                'status' => 'required|in:active,inactive'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $banner->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Banner status updated successfully',
                'data' => $banner
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status: ' . $e->getMessage()
            ], 500);
        }
    }
}
