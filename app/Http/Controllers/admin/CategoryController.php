<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Response;

class CategoryController extends Controller
{
    public function getAll()
    {
        return response([
            'categories' => Category::all()->where('active','=',true) 
        ],201);
    }

    public function createCategory(Request $request):Response
    {
        $request->validate([
            'name'=>'required'
        ]);
        
    }
}
