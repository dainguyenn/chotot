<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll()
    {
        $response = [];
        $categories = Category::where('category_id', null)->where('active', true)->get();
        foreach ($categories as $item) {
            $category = Category::where('category_id', $item->id)->get();
            $item['sub'] = $category;
            array_push($response, $item);
        }
        return response([
            'categories' => $response
        ], 201);
    }

    public function createCategory(Request $request)
    {
        $field = validator($request->all(), [
            'name' => 'required'
        ]);

        if ($field->fails()) {
            return response($field->errors(), 200);
        }

        if (Category::where('name', $request['name'])->exists()) {
            return response(['message' => 'Category ' . $request['name'] . ' early exits'], 201);
        }

        Category::create([
            'name' => $request['name'],
            'category_id' => $request['category_id']
        ]);
        return response(['message' => 'Success'], 201);
    }

    public function editCategory(Request $request)
    {
        $field = validator($request->all(), [
            'name' => 'required'
        ]);
        if ($field->fails()) {
            return response($field->errors(), 200);
        }

        if (Category::where('name', $request['name'])->exists()) {
            return response(['message' => 'Category ' . $request['name'] . ' early exits'], 201);
        }
        $category = Category::where('id', $request['id']);
        $category->update([
            'name' => $request['name'],
            'category_id' => $request['category_id']
        ]);
        return response(['message' => 'Success'], 201);
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::where('id',$id)->first();
            $category->delete();
        }finally{

            return response(['message'=>'Success'], 200);
        }
    }

    public function getSubCategory(Category $category)
    {
        
        $response = [
            'category' => $category
        ];
        $subCategory = Category::where('category_id', $category->id)->get();
        $response['subCategory'] = $subCategory;

        return response($response, 201);
    }
    public function getParentCategory()
    {
        $categories = Category::where('category_id', null)->get();
        return response(['categories' => $categories], 200);
    }
}