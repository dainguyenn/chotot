<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller; 
use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\Request; 

class PostController extends Controller
{
    public function getAll()
    {
        return null;
    }

    public function createPost(Request $request)
    { 
        $fields = validator($request->all(),[
            'category_id' => 'required',
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required',
            'address' => 'required',
            'images' => 'required|min:1'
        ]);
        if($fields->fails()){
            return response($fields->errors(),200);
        }  
        return $request;
    }
}
