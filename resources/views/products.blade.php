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
    <a href="{{ route('product.create') }}">Create New Product</a> <br>
    <a href="{{ route('product.trash') }}">Trash Product</a>
    <p>Product List:</p>
    <table>
        <thead>
            <tr>
                <th>Serial</th>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset('storage/images/' . $product->image) }}" alt="Product Image"></td>
                <td>{{ $product->is_active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{route('product.edit',['id'=>$product->id])}}">Update</a> <br>
                    <a href="{{route('product.show',['id'=>$product->id] )}}">Show</a> <br>
                    <form action="{{route('product.destroy',['id'=>$product->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
