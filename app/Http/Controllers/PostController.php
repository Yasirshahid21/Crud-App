<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Http\Resources\PostResource;
use illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $post = Post::where('author_id', $userId)->with('categories')->get();
        $response = [
            'success' => true,
            'post' => PostResource::collection($post)
        ];
        return $response;
        // return response()->json($reponse);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['author_id'] = Auth::user()->id;
        $post = Post::create($data);
        $categories = $request->get('category');
        $category_id = $categories;
        $post->categories()->sync($category_id);
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $author_id = Auth::user()->id;
        if ($post->author_id == $author_id) {
            return new PostResource($post);
        } else {
            $response = [
                'Error' => true,
                'message' => "This post does not belong to this user"
            ];
            return response()->json($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {

        $data = $request->validated();
        $slug = Str::slug($request->get('title') . '-');
        $data['slug'] = $slug;
        $post->update($data);
        $category = $request->get('category');
        $category_id = $category;
        $post->categories()->sync($category_id);
        $response = [
            'success' => true,
            'message' => 'post updated',
            'post' => new PostResource($post)
        ];
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $author_id = Auth::user()->id;
        if ($post->author_id == $author_id) {
            foreach ($post->categories as $category) {
                PostCategory::where('category_id', $category->id)->where('post_id', $post->id)->delete();
            }
            $post->delete();
            return "delete successfully";
        } else {
            $response = [
                'success' => false,
                'message' => 'unathunticated'
            ];
            return response()->json($response);
        }
    }
}
