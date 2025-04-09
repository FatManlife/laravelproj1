<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("images")->get();
        return view('posts.index', compact("posts"));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $req)
    {
        //Validatoin
        $validate = $req->validate([
            'title' => "required|string|min:2|max:200",
            'description' => "required|string|min:2",
            'price' => "required|min:1",
            "images.*" => "image|min:1|max:4096|mimes:jpg,jpeg,png,svg"
        ]);

        $post = Post::create([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'price' => $validate['price']
        ]);

        if ($req->hasFile("images")) {
            foreach ($req->file("images") as $image) {
                $path = $image->store("posts/images", 'public');
                $post->images()->create([
                    "path" => $path,
                    "original_name" => $image->getClientOriginalName(),
                    "mime_type" => $image->getClientMimeType(),
                    "size" => $image->getSize()
                ]);
            }
        }

        return redirect()->route("posts.index.view");
    }

    public function show(int $id)
    {
        $post = Post::find($id);
        if ($post == null) return redirect()->route("posts.index.view");
        $post->update(["views" => $post->views + 1]);
        return view("posts.show", compact("post"));
    }

    public function edit(int $id)
    {
        $post = Post::find($id);
        if ($post == null) return redirect()->route("posts.index.view");
        return view("posts.edit", compact("post"));
    }

    public function update(Request $req,)
    {
        $validate = $req->validate([
            'title' => "required|string|min:2|max:200",
            'description' => "required|string|min:2",
            'price' => "required|min:1",
        ]);

        Post::find($req->id)->update([
            'title' => $validate['title'],
            'description' => $validate['description'],
            'price' => $validate['price']
        ]);

        return redirect()->route("posts.show.view", $req->id);
    }

    public function destroy(int $id)
    {
        Post::destroy($id);
        return redirect()->route("posts.index.view");
    }
}
