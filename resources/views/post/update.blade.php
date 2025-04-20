<x-app-layout>
  <x-slot name="title">Edit Post</x-slot>
  <x-slot name="header">Edit Post</x-slot>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-lg">
          <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Edit Post</h4>
          </div>
          <div class="card-body">
            <form action="{{ route('post.update', $post['id']) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" class="form-control form-control-lg" value="{{ $post->title }}" id="title" name="title" placeholder="Enter post title">
              </div>
              <div class="mb-3">
                <label for="content" class="form-label fw-bold">Content</label>
                <textarea class="form-control form-control-lg" id="content" name="content" rows="5" placeholder="Write your content here">{{ $post->content }}</textarea>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label fw-bold">Image</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>
              <div class="text-end">
                <a href="{{ route('post.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <input type="submit" class="btn btn-success px-4" value="Update Post">
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
</x-app-layout>