<x-app-layout>
    <x-slot name="title">Trashed Posts</x-slot>
    <x-slot name="header">Trashed Posts</x-slot>
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
</x-app-layout>