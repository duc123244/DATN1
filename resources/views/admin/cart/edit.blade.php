<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name_sp">Product Name:</label>
        <input type="text" id="name_sp" name="name_sp" value="{{ $product->name_sp }}" required>
        <br>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image">
        <br>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100px">
        @endif
        <br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $product->description }}</textarea>
        <br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
        <br>

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
        <br>

        <button type="submit">Update Product</button>
    </form>
    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
