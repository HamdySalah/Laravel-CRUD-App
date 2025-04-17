<x-layout>
    <x-slot name="title">Posts</x-slot>
    <x-slot name="header">Posts</x-slot>
    <div class="container mt-4">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <h1>Posts</h1>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{route('post.create')}}" class="btn btn-primary">Create Post</a>
            </div>
        </div>
        <hr>
    <table class="table">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
        <th scope="col">Image</th>
        <th scope="col">Created At</th>
        <th scope="col">View</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    @foreach ($post as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->content }}</td>
            <td>
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="max-width: 100px;">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $post->created_at }}</td>
            <td><a href="{{ route('post.show', $post['id']) }}" class="btn btn-primary">View</a></td>
            <td><a href="{{route('post.edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
                <form action="{{ route('post.destroy', $post['id']) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
</x-layout>