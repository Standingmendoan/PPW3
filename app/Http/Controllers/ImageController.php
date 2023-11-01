<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{

    public function showUploadForm()
    {
        return view('upload'); // Ganti 'upload' dengan nama file blade Anda jika perlu
    }
    
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:2048', // max:2048 berarti maksimum ukuran file adalah 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/' . $filename);

            // Resize image to thumbnail
            $thumbnailPath = public_path('images/thumbnail/' . $filename);
            Image::make($image)->fit(100, 100)->save($thumbnailPath);

            // Resize image to square
            $squarePath = public_path('images/square/' . $filename);
            Image::make($image)->fit(200, 200)->save($squarePath);

            // Save original image
            $image->move(public_path('images'), $filename);

            return redirect()->back()->with('success', 'Image has been uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No image was uploaded.');
    }
}
