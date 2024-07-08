<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <a href="{{ route('product.index') }}">Index</a>
    <p>Individual Product :</p>
    <table>
        <thead>
            <tr>

                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Is Active</th>

            </tr>
        </thead>
        <tbody>

            <tr>

                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image"></td>
                <td>{{ $product->is_active ? 'Yes' : 'No' }}</td>

            </tr>

        </tbody>
    </table>
</body>
</html>
