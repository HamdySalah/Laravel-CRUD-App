<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">Confirm Deletion</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Are you sure you want to delete this post? This action cannot be undone.
                    </div>
                    
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">{{ $post['title'] }}</h5>
                        </div>
                        <div class="card-body">
                            <p>{{ $post['body'] }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            Created by: {{ $post['created_by'] ?? 'Unknown' }}
                        </div>
                    </div>
                    
                    <form action="/post/{{ $post['id'] }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="d-flex justify-content-end">
                            <a href="/post" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-danger">Delete Permanently</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="text-center mt-5">
    <p>&copy; {{ date('Y') }} Laravel CRUD App. All rights reserved @ ITI.</p>
</footer>