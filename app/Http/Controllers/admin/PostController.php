<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;  
use App\Http\Response\Response;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImgStore;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request; 

class PostController extends Controller
{
    public function getAll(Request $request)
    {
        $limit = $request['limit'] ? $request['limit'] : 10;
        $page = $request['page'] ? $request['page'] : 1;
        $posts = Post::with('postImgStore')->simplePaginate($limit,['*'],'page',$page);
        
        return response($posts);
    }

    public function getPost($id)
    {
        $post = Post::where('id',$id)->with('postImgStore')->get();
        if($post->count() <= 0){
            return response(['message' => 'Post not exits'],200);
        }
        return response($post,200);
    }

    public function createPost(Request $request)
    { 
        $fields = validator($request->all(),[
            'category_id' => 'required', 
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
        if(!Category::where('id',$request['category_id'])->exists()){
            return response(['message' => 'Category not exits']);
        }
        $post = Post::create([
            'category_id' => $request['category_id'],
            'user_id' => auth('sanctum')->user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
            'price' => $request['price'],
            'address' => $request['address'],
        ]);
        $images = $request->file('images'); 
        foreach ($images as $item) {
            $imgUrl = Cloudinary::upload($item->getRealPath())->getSecurePath();
            $imgStore = PostImgStore::create([
                'image' => $imgUrl
            ]);
            $post->postImgStore()->attach($imgStore);
        }
         
        return response(['message'=>'Success'],201);
    }

    public function editPost(Request $request)
    {  

        $fields = validator($request->all(),[
            'id' => 'required',
            'category_id' => 'required', 
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required',
            'address' => 'required', 
        ]);
        if($fields->fails()){
            return response($fields->errors(),200);
        }  
        if(!Category::where('id',$request['category_id'])->exists()){
            return response(['message' => 'Category is not exits']);
        }

        $deleteImages = $request['deleteImages'] ? $request['deleteImages'] : []; 
        $post = Post::where('id',$request['id'])->with('postImgStore')->first();  
        $imagesDel = PostImgStore::whereIn('id',$deleteImages)->get(); 

        PostImgStore::destroy($imagesDel); 
        $post->postImgStore()->detach($deleteImages);   

        foreach ($imagesDel as $item) {
            Cloudinary::admin()->deleteAssets($this->getPublicId($item['image']),["invalidate" => true]);
        }

        $images = $request->file('images'); 
        if($images){
            foreach ($images as $item) {
                $imgUrl = Cloudinary::upload($item->getRealPath())->getSecurePath();
                $imgStore = PostImgStore::create([
                    'image' => $imgUrl
                ]);
                $post->postImgStore()->attach($imgStore);
            }
        }
        $post->update([
            'category_id' => $request['category_id'],
            'user_id' => auth('sanctum')->user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
            'status' => $request['status'],
            'price' => $request['price'],
            'address' => $request['address'],
        ]);
        return response(['message' => 'Success'],200);
    }

    public function changeActive($id)
    {
        $post = Post::where('id',$id); 

        if($post->exists()){
            $post->update([
                'active' => !$post->first()->active
            ]);
            return response(['message' => 'Success'],200);
        }else{
            return response(['message' => 'Post not found'],200);
        } 
    }

    public function deletePost($id)
    {
        try{
            Post::destroy($id);
        }finally{
            return response(['message'=>'Success'],200);
        }
    }

    private function getPublicId($image){
        $arr = explode('/',$image);
        return substr($arr[7],0,-5);
    }
}
