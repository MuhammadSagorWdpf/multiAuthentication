<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <form action="{{route('image')}}" method="POST" enctype="multipart/form-data">
        <!-- Add CSRF token for Laravel -->
        @csrf
        <div class="form-group">
            <label for="image_name">Name</label>
            <input type="text" id="image_name" name="image_name" required>
        </div>

        <div class="form-group">
            <label for="image_url">Image</label>
            <input type="file" id="image_url" name="image" required>
        </div>

        <button type="submit">Save</button>
    </form>
</body>
</html>
