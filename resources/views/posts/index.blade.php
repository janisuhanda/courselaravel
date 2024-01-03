@extends('posts.layout')

@section('content')
<div class="container">
    <h1 class="text-center">CRUD POST LARAVEL</h1>
    <div class="card">
        <div class="card-body">
        <a href="{{route('posts.create')}}" class="btn btn-primary mb-3">Tambah Post</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                  <th >IMAGE</th>
                  <th >TITLE</th>
                  <th >KONTEN</th>
                  <th >ACTION</th>
                </tr>
              </thead>
              <tbody>

                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                    <tr>
                        <td><img src="{{asset('storage/posts/'.$post->image)}}"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>
                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-dark">Show</a>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                            {{-- <a href="" class="btn btn-primary">delete</a> --}}
                            <form action="{{route('posts.destroy',$post->id)}}" method="post" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td>BELUM ADA DATA</td>
                    </tr>
                @endif


                {{-- @forelse ( $posts as $post )
                <tr>
                    <td><img src=""></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>
                        <a href="" class="btn btn-primary">Show</a>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-primary">delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>BELUM ADA DATA</td>
                </tr>
                @endforelse --}}
              </tbody>
        </table>

        </div>
    </div>
</div>
@endsection


