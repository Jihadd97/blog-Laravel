<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = [
            ['id' => 1, 'title' => 'PHP', 'posted_by' => 'Jihad', 'created_at' => '2022-10-23 06:11:00'],
            ['id' => 2, 'title' => 'Javascript', 'posted_by' => 'Mahmoud', 'created_at' => '2023-07-12 08:00:00'],
            ['id' => 3, 'title' => 'CSS', 'posted_by' => 'Mai', 'created_at' => '2024-06-10 03:00:00'],
            ['id' => 4, 'title' => 'HTML', 'posted_by' => 'Adham', 'created_at' => '2025-05-05 10:02:00'],
        ];
        return view('posts.index', ['posts' => $allPosts]);
    }

    public function show($postId)
    {
        // return 'This is post Id: '. $postId; #for later
        $singlePost = ['id' => 1, 'title' => 'PHP', 'description' => ' This is description', 'posted_by' => 'Jihad', 'created_at' => '2022-10-23 06:11:00'];

        return view('posts.show', ['post' => $singlePost]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // $request = request();
        // dd($request->title,$request->method);
        //1- get the user data (hold them in variables)
        $data = request()->all();
        // dd($data);

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        dd($data, $title, $description, $postCreator);

        //2- store the user data in db

        //3- redirection to the index page
        return to_route('posts.index');
    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function update()
    {

        //1- get the user data (hold them in variables)

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        // dd($title, $description, $postCreator);

        //2- update the user data in db

        //3- redirection to the single post page
        return to_route('posts.show',1);
    }

    public function destroy(){
        //1- Delete data from db

        //2- redirect to the index page
        return to_route('posts.index');
    }
}
