<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
</head>
<body>
    <h1>Add New Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name_sp">Product Name:</label>
        <input type="text" id="name_sp" name="name_sp" required>
        <br>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" required>
        <br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>
        <br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" required>
        <br>

        <button type="submit">Add Product</button>
    </form>
    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
