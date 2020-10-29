<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;


class PostController extends Controller
{
    //
    public function index()
    {
       return view('post');
    //    return "PostController";
    }


    public function userlist()
    {
        return response()->json(
            // ['users' => '12345678'], 
            ['users' => 
                ['email' => '12345678','phone'=> '781111']
            ],
            // Response::HTTP_OK
        );
        
    }

    public function testRequest(Request $request)
    {
        Log::notice( 'testRequest');
        Log::notice( 'testRequest', $request->all() );
    }



    public function testGrid(Request $request)
    {
        # code...
        // {"id":1,"region":1,"server_id":"qweqwe","remote_path":"\/tmp\/serverA\/log\/","last_modified_at":"2020-10-27 14:57:27","filename":"log20201027.zip","local_path":"\/tmp\/log\/serverA_log20201027.zip"},{"id":2,"region":1,"server_id":"QWEQWE2","remote_path":"\/tmp\/serverB\/log\/","last_modified_at":"2020-10-27 14:58:25","filename":"log20201027.zip","local_path":"\/tmp\/log\/serverB_log20201027.zip"},{"id":3,"region":1,"server_id":"qweqwe","remote_path":"\/tmp\/serverA\/log\/","last_modified_at":"2020-10-27 14:58:56","filename":"log20201026.zip","local_path":"\/tmp\/log\/serverA_log20201026.zip"}

        return response()->json(
            ['users' => 
                [
                    [
                        "code"=>"FI-SW-01","name"=>"Koi","unitcost"=>10.00,"status"=>"P","listprice"=>36.50,"attr"=>"Large","itemid"=>"EST-1"
                    ]
                ]
            ],
        );
    }

    // public function createPost(Request $request)
    // {
    //     $post = new Post;
    //     $post->title = $request->title;
    //     $post->save();
    //     return response()->json([
    //         'message' => 'New post created'
    //     ]);
    // }
}
