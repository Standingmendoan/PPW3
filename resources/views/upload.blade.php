<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload and Resize Image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Upload and Resize Image</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data" id="imageForm">
            @csrf
            <div class="form-group">
                <label for="image">Select Image</label>
                <input type="file" class="form-control-file" name="image" id="image" onchange="previewImage(event)">
            </div>
            <div class="form-group">
                <label for="preview">Preview:</label><br>
                <img src="" id="preview" style="max-width: 200px; max-height: 200px;" class="img-thumbnail" alt="Preview Image">
            </div>
            <div class="form-group">
                <label for="width">Width (in pixels):</label>
                <input type="number" class="form-control" name="width" id="width" value="100">
            </div>
            <div class="form-group">
                <label for="height">Height (in pixels):</label>
                <input type="number" class="form-control" name="height" id="height" value="100">
            </div>
            <button type="submit" class="btn btn-primary">Upload and Resize</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
