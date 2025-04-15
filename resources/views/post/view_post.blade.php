<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>View Post</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Post Details</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Title:</strong> {{ $post['title'] }}
                            </li>
                        </ul>
                        <div class="mb-3">
                            <strong>Content:</strong>
                            <p>{{ $post['content'] }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Image:</strong>
                            @if($post['image'])
                                <img src="{{ asset('storage/' . $post['image']) }}" alt="{{ $post['title'] }}" style="max-width: 100px;">
                            @else
                                No Image
                            @endif
                        </div>
                        <div class="mb-3">
                            <strong>Created At:</strong> {{ $post['created_at'] }}
                        </div>
                        <div class="text-end">
                            <a href="{{ route('post.index') }}" class="btn btn-outline-secondary">Back to Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center mt-5">
        <p>&copy; {{ date('Y') }} Laravel CRUD App. All rights reserved.</p>
    </footer>
</body>
</html>

