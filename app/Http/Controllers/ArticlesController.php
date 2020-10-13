<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $posts = Article::get();

        return response([
            'success' => true,
            'message' => 'List semua Post',
            'data'    => $posts
        ],200);
    }

    public function post(Request $request)
    {
        $post = new Article();
        $post->title = $request['title'];
        $post->content  = $request['content'];
        $post->save();

        $message = [
            'message' => 'Sukses input data'
        ];

        return response($message,200);

    }

    public function delete($id)
    {
        $delete = Article::find($id);
        $delete->delete();
        
        $message = [
            'message' => 'Field sudah terhapus'
        ];

        return response($message);
    }

}
