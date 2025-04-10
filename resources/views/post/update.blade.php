<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Update Page</title>
</head>
<body>
  <div class="container mt-4">
    <div class="row ju stify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Post</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('post.update',$post['id']) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control form-control-lg" value="{{ $post['title'] }}" id="title" name="title">
              </div>
              <div class="mb-3">
                <label for="body" class="form-label fw-bold">Body</label>
               <input type="text" class="form-control form-control-lg" value="{{ $post['body'] }}" id="body" name="body">
              </div>
              <div class="text-end">
                <a href="{{ route('post.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
                <input type="submit" class="btn btn-primary px-4" value="Update Post">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
