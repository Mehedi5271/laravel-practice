<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <style>
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .checkbox-group {
            display: flex;
            align-items: center;
        }
        .checkbox-group input {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{old('title',$product->title)}}" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{old('price',$product->price)}}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description"  rows="4" required> {{old('description',$product->description)}}</textarea>
        </div>

        <div class="form-group">
            <img style="height: 100px " src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_active" name="is_active">
            <label for="is_active">Is Active</label>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

