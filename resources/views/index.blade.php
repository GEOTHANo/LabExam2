<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg border-0 w-100" style="max-width: 600px;"> <!-- Increased max-width -->
            <div class="card-header text-center">
                <h1>TASK MANAGEMENT</h1>
            </div>
            <div class="card-body text-center">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary w-100">Create new Task</a>

                <table class="table table-striped table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                @if ($task->is_completed == true)
                                    <span class="badge bg-success">Done</span> <!-- Green for completed -->
                                @else
                                    <span class="badge bg-danger">Not Completed</span> <!-- Red for not completed -->
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm" title="Edit">
                                    Edit
                                </a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('build/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script> <!-- Added Bootstrap Icons -->
</body>
</html>