<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $posts = Article::latest()->get();

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

    public function edit(Request $request,$id)
    {
        $edit = Article::find($id);
        $edit->title = $request['title'];
        $edit->content = $request['content'];
        $edit->save();

        $message = [
            'message' => 'update sukses',
            'data'    => $edit
        ];

        return response($message);
    }

    public function showDetail($id)
    {
        $detail = Article::find($id);


        return response([
            'success' => true,
            'data'    => $detail
        ]);
    }

}
