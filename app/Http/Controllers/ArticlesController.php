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

}
