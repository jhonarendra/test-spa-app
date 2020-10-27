<?php

namespace App\Http\Controllers;
use App\Bulletin;
use Illuminate\Http\Request;

class BulletinController extends Controller
{
    public function index()
    {
        $bulletin = Bulletin::latest()->get();

        return response([
            'success' => true,
            'message' => 'List semua bulletin',
            'data'    => $bulletin
        ],200);
    }
    
    public function post(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|unique:bulletins|max:255',
            'content' => 'required',
        ]);

        $bulletin = new Bulletin();
        $bulletin->title = $request['title'];
        $bulletin->content  = $request['content'];
        $bulletin->save();

        return response()->json([
            'status' => true,
            'msg' => 'Sukses input data'
        ]);

    }
}
