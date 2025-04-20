<x-app-layout>
  <br>
    <x-slot name="title">Post Details</x-slot>
    <x-slot name="header">Post Details</x-slot>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <!-- Post Details -->
        <div class="card shadow mb-4">
          <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📌 Post Details</h4>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush mb-3">
              <li class="list-group-item"><strong>Title:</strong> {{ $post['title'] }}</li>
              <li class="list-group-item"><strong>Created At:</strong> {{ $post['created_at'] }}</li>
            </ul>
            <div class="mb-3">
              <strong>Content:</strong>
              <p class="mt-1">{{ $post['content'] }}</p>
            </div>
            <div class="mb-3">
              <strong>Image:</strong><br>
              @if($post['image'])
                <img src="{{ asset('storage/' . $post['image']) }}" alt="{{ $post['title'] }}" class="img-fluid rounded shadow-sm mt-2" style="max-width: 300px;">
              @else
                <span class="text-muted">No Image</span>
              @endif
            </div>
            <div class="text-end">
              <a href="{{ route('post.index') }}" class="btn btn-outline-secondary">← Back to Posts</a>
            </div>
          </div>
        </div>
  
        <!-- User Details -->
        <div class="card shadow">
          <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">👤 User Info</h4>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><strong>Name:</strong> {{ $post->user->name }}</li>
              <li class="list-group-item"><strong>Email:</strong> {{ $post->user->email }}</li>
              <li class="list-group-item"><strong>Created At:</strong> {{ $post->user->created_at }}</li>
              <li class="list-group-item"><strong>Updated At:</strong> {{ $post->user->updated_at }}</li>
            </ul>
            <div class="text-end mt-3">
              <a href="{{ route('post.index') }}" class="btn btn-outline-secondary">← Back to Posts</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>
  