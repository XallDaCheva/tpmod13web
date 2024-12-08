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
        <h1 class="mb-4">Edit Task</h1>

        <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Task Name</label>
                <input type="text" class="form-control" name="name" value="{{ $task->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" required>{{ $task->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="pending" {{ $task->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $task->status === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
            <a href="/" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>