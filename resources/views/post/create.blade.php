<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Add Post</title>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container-fluid d-flex justify-content-start align-items-center gap-4">
        <a class="navbar-brand fs-3" href="{{ route('post.index') }}">ITI Blog</a>
        <a class="nav-link text-light fs-5" href="{{ route('post.index') }}">All Posts</a>
        <a class="nav-link text-light fs-5" href="{{ route('post.trashed') }}">Trashed Posts</a>
    </div>
</nav>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Create Post</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control form-control-lg" id="title" name="title" placeholder="Enter post title">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label fw-bold">Content</label>
                <textarea class="form-control form-control-lg" id="content" name="content" rows="5" placeholder="Write your content here"></textarea>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label fw-bold">Image</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>
              <div class="mb-3">
                <label for="user_id" class="form-label fw-bold">User ID</label>
                <input type="number" class="form-control form-control-lg" id="user_id" name="user_id" placeholder="Enter user ID">
              </div>
              <div class="text-end">
                <a href="{{route('post.index')}}" class="btn btn-secondary me-2">Cancel</a>
                <input type="submit" class="btn btn-success px-4" value="Create Post">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
</body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<footer class="text-center mt-5">
  <p>&copy; {{ date('Y') }} Laravel CRUD App. All rights reserved @ ITI.</p>
</footer>