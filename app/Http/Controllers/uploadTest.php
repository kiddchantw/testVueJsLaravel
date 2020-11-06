<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use phpseclib\Net\SSH2;
use phpseclib\Net\SCP;

class uploadTest extends Controller
{
    public function index()
    {
        return view('upload');
    }
    
    
    public function uploadFile(Request $request)
    {
        // m1 ok
        // $upload_path = public_path('upload');
        // $file_name = $request->file->getClientOriginalName();
        // $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();
        // $request->file->move($upload_path, $generated_new_name);
        // return response()->json(['success' => 'You have successfully uploaded "' . $file_name . '"']);


        // //m2
        $image = $request->file('file');

        // $file_name = $image->getClientOriginalName();
        $file_name = time() . '-' . $image->getClientOriginalName();
        $uploadPic = Storage::disk('public')->put($file_name,file_get_contents($image->getRealPath()));
        



        $realPath  = dirname(dirname(dirname(dirname(__FILE__)))).'/storage/app/public/'.$file_name;  
        // 實際路徑
        // /Users/kiddchan/Documents/testLaravel/laraVue/storage/app/public/1604631603-test001.txt    


        // $realPath  = dirname(__FILE__).$file_name;                  //// 回傳路徑 ：這是controller的路徑
        // /Users/kiddchan/Documents/testLaravel/laraVue/app/Http/Controllers1604631315-test001.txt
        
        // $realPath  = getcwd().'/'.$file_name;
        // 回傳路徑  : 少了 public /storage/app/
        // /Users/kiddchan/Documents/testLaravel/laraVue/public/1604631603-test001.txt
        


        // $realPath = Storage::path($file_name);
        // 回傳路徑  : 少了 public
        // /Users/kiddchan/Documents/testLaravel/laraVue/storage/app/1604632154-test001.txt



        // m2.2
        // Connect to the server
        // $ssh = new SSH2('root@git.ismplab.com', 60022,10);
        // if (!$ssh->login('root', 'ismp 13')) {
        //     throw new Exception("Unable to connect");
        // }

        // // Run a remote command
        // echo $ssh->exec('whoami');

        if ($uploadPic){
            return response()->json(['success' => 'You have successfully uploaded:' . $file_name . "....path: ".$realPath ]);
        }
    }
}
