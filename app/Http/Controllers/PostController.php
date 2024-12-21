<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index(Request $request) {
        $title = "JVLcode";
        // $posts =  $this->getPosts();
        // $posts = Post::all();
        // $posts = Post::paginate(5);
        $query = Post::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%'.$request->search.'%')
            ->orWhere('content', 'like', '%'.$request->search.'%');
        }

        $posts = $query->paginate(5);

    
        return view('posts.index', compact('title', 'posts'));
    }

    // private function getPosts() {
    //     return json_decode(json_encode([
    //         ['id' => 1, 'title' => 'Post 1', 'content'=> 'Content of Post 1'],
    //         ['id' => 2, 'title' => 'Post 2', 'content'=> 'Content of Post 2'],
    //     ]));
    // }

    public function detail($slug) {
        // $posts =  $this->getPosts();
        // $post = collect($posts)->firstWhere('id', $id);
        try {
            //code...
            $post = Post::where('slug', $slug)->first();
            if(!$post) {
                throw new \Illuminate\Database\Eloquent\ModelNotFoundException;
            }
            $category = $post->category;
            $related_posts = Post::where('category_id', $category->id)
                            ->where('id', '!=', $post->id)
                            ->take(5)
                            ->get();

            return view('posts.detail', compact('post', 'related_posts'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return response()->view('errors.404',[], 404);
        }

    }

    public function oldUrl() {
        return redirect()->route('new_url');
    }

    public function newUrl() {
        return '<h1>New URL Page</h1>';
    }
}
