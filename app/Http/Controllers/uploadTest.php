<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class uploadTest extends Controller
{
    public function index()
    {
        return view('upload');
    }
    
    
    public function uploadFile(Request $request)
    {
        //m1 ok
        // $upload_path = public_path('upload');
        // $file_name = $request->file->getClientOriginalName();
        // $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();
        // $request->file->move($upload_path, $generated_new_name);
        // return response()->json(['success' => 'You have successfully uploaded "' . $file_name . '"']);


        //m2
        $image = $request->file('file');

        $file_name = $image->getClientOriginalName();
        $uploadPic = Storage::disk('public')->put($file_name,file_get_contents($image->getRealPath()));
        if ($uploadPic){
            return response()->json(['success' => 'You have successfully uploaded "' . $file_name . '"']);
        }
    }
}
