@extends('layouts.app')
@section('title')
    Single Post
@endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{ $post['title'] }}</h5>
            <p class="card-text">Description:{{ $post['description'] }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">

            <h5 class="card-title">Name: Jihad</h5>
            <p class="card-text">Email: jihad@gmail.com</p>
            <p class="card-text">Created At: Thursday 25-02-2002 03:15:36 PM</p>
        </div>

    </div>
@endsection
