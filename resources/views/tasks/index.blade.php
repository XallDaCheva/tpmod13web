<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Task Management</title>
</head>

<body>
    <div class="container py-5">
        <h1 class="mb-4">Task Management</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Add New Task</h5>
                <form action="/tasks" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Task Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
        </div>

        <h5>Task List</h5>
        @if($tasks->isEmpty())
        <p class="text-muted">No tasks available</p>
        @else
        @foreach($tasks as $task)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $task->name }}</h5>
                <p class="card-text">{{ $task->description }}</p>
                <span class="badge bg-{{ $task->status === 'pending' ? 'warning' : 'success' }}">{{ ucfirst($task->status) }}</span>
                <a href="/tasks/{{ $task->id }}/edit" class="btn btn-sm btn-secondary">Edit</a>
                <form action="/tasks/{{ $task->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</body>

</html>