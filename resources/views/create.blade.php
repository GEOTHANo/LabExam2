<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create new Task</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg border-0 w-200 h-200" style="max-width: 400px;">   
            <div class="card-header text-center">
                <h1>       CREATE NEW TASK        </h1>
            </div>
            <div class="card-body text-center">

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="is_completed" class="form-label">Status</label>
                        <select name="is_completed" id="is_completed" class="form-select">
                            <option value="0">Not Completed</option>
                            <option value="1">Completed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Create Task</button>
                </form>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary w-100 mt-3">Back to Task List</a>
                
            </div>
        </div>
    </div>
    

    <script src="{{ asset('build/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>