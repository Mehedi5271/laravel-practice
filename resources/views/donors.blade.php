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
    <a href="{{ route('donor.create') }}">Create New Donor</a> <br>
    <a href="{{ route('donor.trash') }}">Trash Donor</a>
    <p>Product List:</p>
    <table>
        <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Date Of Birth</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donors as $donor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $donor->name }}</td>
                <td>{{ $donor->dob }}</td>
                <td>{{ $donor->email }}</td>
                <td>{{ $donor->address }}</td>
                <td>{{ $donor->phone }}</td>
                <td><img src="{{ asset('storage/images/' . $donor->image) }}" alt="donor Image"></td>
                <td>
                    <a href="{{route('donor.edit',['id'=>$donor->id])}}">Update</a> <br>
                    <form action="{{route('donor.destroy',['id'=>$donor->id])}})}}" method="post">
                        @csrf
                        @method('delete')
                        <button >Delete</button> <br>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
