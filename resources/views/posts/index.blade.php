<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Posts ===== posting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>
</html>
