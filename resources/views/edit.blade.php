<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit task</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg border-0 w-200 h-200" style="max-width: 800px;">   
            <div class="card-header text-center">
                <h1>EDIT TASK MANAGMENT</h1>
            </div>
            <div class="card-body text-center">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('tasks.update', $task) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $task->description) }}</textarea>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_completed" class="form-check-input" value="1" {{ $task->is_completed ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_completed">Completed</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Task</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
                
            </div>
        </div>
    </div>
    

    <script src="{{ asset('build/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>