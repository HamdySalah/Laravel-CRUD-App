<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand, .nav-link {
            font-weight: 600;
        }
        .card {
            border-radius: 1rem;
        }
        .card-header {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        footer {
            padding: 2rem 0;
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container-fluid d-flex justify-content-start align-items-center gap-4">
            <a class="navbar-brand fs-3" href="{{ route('post.index') }}">ITI Blog</a>
            <a class="nav-link text-light fs-5" href="{{ route('post.index') }}">All Posts</a>
            <a class="nav-link text-light fs-5" href="{{ route('post.trashed') }}">Trashed Posts</a>
        </div>
    </nav>

    <div class="container py-5">
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
    </div>

    <footer class="text-center">
        <p class="mb-0">&copy; {{ date('Y') }} Laravel CRUD App. All rights reserved @ ITI.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
