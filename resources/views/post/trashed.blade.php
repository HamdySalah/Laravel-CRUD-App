<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Trashed Posts</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container-fluid d-flex justify-content-start align-items-center gap-4">
            <a class="navbar-brand fs-3" href="{{ route('post.index') }}">ITI Blog</a>
            <a class="nav-link text-light fs-5" href="{{ route('post.index') }}">All Posts</a>
            <a class="nav-link text-light fs-5" href="{{ route('post.trashed') }}">Trashed Posts</a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2 class="text-center mb-4">Trashed Posts</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Deleted At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->deleted_at }}</td>
                            <td>
                                <a href="{{ route('post.restore', $post->id) }}" class="btn btn-success btn-sm">Restore</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No trashed posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <footer class="text-center mt-5">
        <p>&copy; {{ date('Y') }} Laravel CRUD App. All rights reserved @ ITI.</p>
    </footer>
</body>
</html>