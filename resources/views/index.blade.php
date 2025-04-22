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
        <div class="card shadow-lg border-0 w-200 h-200" style="max-width: 400px;">   
            <div class="card-header text-center">
                <h1>TASK MANAGMENT</h1>
            </div>
            <div class="card-body text-center">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary w-100">Create new Task</a>

            <table class="table table-striped table-bordered mt-3">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>description</th>
                        <th>status</th>
                        <th> </th>
                    </tr>
                    <tr>
                        @forelse ($tasks as $task)
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                @if($task->is_completed)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-warning">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Do you want to delete this task?')" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        @else
                            <td colspan="4" class="text-center">No tasks found</td>
                        @endforelse
                    </tr>
                </thead>
            </table>

                
            </div>
        </div>
    </div>
    

    <script src="{{ asset('build/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>