<?php
namespace App\Services;
use App\Models\Post;

class postService {
    //
    public function getAllPosts(){
        //
        $post = Post::all();
        return $post;
    }

    public function store($request){
        //
        $post = Post::create($request->all());
        return $post;
    }
    public function show($id){
        //
        $post = Post::find($id);
        return $post;
    }
    public function update($request, $id){
        //
        $post = Post::find($id);
        $update = $post->update($request->all());
        return $post;
    }
    public function destroy($id){
        //
        $post = Post::find($id)->delete();
        return $post;
    }
}














?>
