<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create POSTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <img src="{{asset('storage/posts/'.$post->image)}}">
                    <div class="from-group">
                        <label>IMAGE</label>
                        <input name="image" type="file" class="form-control" >
                    </div>

                    <div class="from-group">
                        <label>TITLE</label>
                        <input name="title" type="text" class="form-control" value="{{old('title', $post->title)}}">
                    </div>
                    <div class="from-group">
                        <label>CONTENT</label>
                        <textarea name="content" class="form-control">{{$post->content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
