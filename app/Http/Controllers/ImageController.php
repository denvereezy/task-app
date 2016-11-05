<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ImageController extends Controller
{
    public function getImage()
    {
      return view('upload-image');
    }

    public function postImage(Request $request)
    {
      $this->validate($request, [
        'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
      ]);

      $imageName = time().'.'.$request->image_file;
      $request->image_file->move(public_path('images'), $imageName);

      return back()
          ->with('success', 'Image succesfully uploaded.')
          ->with('image', $imageName);
    }
}
