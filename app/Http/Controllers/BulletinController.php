<?php

namespace App\Http\Controllers;

use App\Bulletin;


use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index()
    {
        $posts = Bulletin::latest()->get();

        return response([
            'success' => true,
            'message' => 'List semua Post',
            'data'    => $posts
        ],200);
    }
    
    public function post(Request $request)
    {
        $post = new Bulletin();
        $post->title = $request['title'];
        $post->content  = $request['content'];
        $post->save();

        $message = [
            'message' => 'Sukses input data'
        ];

        return response($message,200);

    }
}
