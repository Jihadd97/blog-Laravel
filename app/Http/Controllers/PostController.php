<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

// use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // select * from posts;
        $postsFromDB = Post::all(); //collection object

        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    {
        // $singlePostFromDB = Post::find($postId);                       // select * from posts where id = $postId limit 1
        // $singlePostFromDB = Post::findorfail($postId); 
        // if (is_null($singlePostFromDB)) {
        //     return to_route('posts.index');
        // }
        // $singlePostFromDB = Post::where('id', $postId);              // eloquent query builder object
        // $singlePostFromDB = Post::where('title', 'PHP')->first();    // select * from posts title = 'PHP' limit 1
        // $singlePostFromDB = Post::where('title', 'PHP')->get();      // select * from posts where title = 'PHP' 
        // dd($singlePostFromDB);                                       // model object

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {   //select * from users;
        $users = User::all();
        return view('posts.create', ['users' => $users]); //pass the data to posts.create view
    }

    public function store()
    {

        //1- get the user data (hold them in variables)
        $data = request()->all();
        // dd($data);

        $title = request()->title;   // get the title from the request
        $description = request()->description;
        $postCreator = request()->post_creator;

        //2- store the submitted user data in db     (1st way)
        // $post = new Post();                      // create a new instance of the Post model
        // $post->title = $title;                   // assign the title to post model
        // $post->description = $description;       // assign the description to the model

        // $post->save();                           // insert the data into the database

        Post::create([                              // 2nd way create a new instance of the Post model
            'title' => $title,
            'description' => $description,
        ]);
        //3- redirection to the index page
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        // select * from users;
        $users = User::all();
        return view('posts.edit', ['users' => $users, 'post' => $post]); //pass the data to posts.create view
    }

    public function update($postId)
    {

        //1- get the user data (hold them in variables)

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // dd($title, $description, $postCreator);

        //2- select the data
        $post = Post::findorfail($postId);

        //3- update the submitted user data in db 
        $post->update([
            'title' => $title,
            'description' => $description,
            'post_creator' => $postCreator,
        ]);

        //4- redirection to the single post page
        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {   //1- select the post 
        $post = Post::findorfail($postId);
        // dd($postId);
        //2- delete the post from the database
        $post->delete();
        //3- redirect to the index page
        return to_route('posts.index');
    }
}
