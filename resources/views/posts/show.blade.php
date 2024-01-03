@extends('posts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <img src="{{asset('storage/posts/'.$post->image)}}">
                    <hr>
                    <h1 class="text-center">{{$post->title}}</h1>
                    <p>{{$post->content}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
