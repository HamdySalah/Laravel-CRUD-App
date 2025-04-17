<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://www.flaticon.com/free-icon/website_13978129?related_id=13978129" type="image/x-icon">
    <title>{{ $title ?? 'Laravel CRUD App' }}</title>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container-fluid d-flex justify-content-start align-items-center gap-4">
        <a class="navbar-brand fs-3" href="{{ route('post.index') }}">ITI Blog</a>
        <a class="nav-link text-light fs-5" href="{{ route('post.index') }}">All Posts</a>
        <a class="nav-link text-light fs-5" href="{{ route('post.trashed') }}">Trashed Posts</a>
    </div>
</nav>
<main class="container mt-4">
    {{ $slot }}
</main>
<footer class="text-center mt-5">
    <p>&copy; {{ date('Y') }} Laravel CRUD App. All rights reserved @ ITI.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ZWJhYVnydn+NXH4AecAMhnrZk0hhG8cy3mvxq3GhvEIK3ejKZhzUdhI9AcNfV7s6" crossorigin="anonymous"></script>
</body>
</html>