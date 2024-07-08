<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor List</title>
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
    <a href="{{ route('donor.index') }}">All Donor</a>
    <p>Donor List:</p>
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
                @if($donor) <!-- Ensure donor is not null -->
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $donor->name }}</td>
                    <td>{{ $donor->dob }}</td>
                    <td>{{ $donor->email }}</td>
                    <td>{{ $donor->address }}</td>
                    <td>{{ $donor->phone }}</td>
                    <td><img src="{{ asset('storage/images/' . $donor->image) }}" alt="Donor Image"></td>
                    <td>
                        <form action="{{route('donor.restore', ['id' => $donor->id])}}" method="post">
                            @csrf
                            @method('patch')
                            <button type="submit">Restore</button>
                        </form>

                        <form action="{{route('donor.delete',['id'=>$donor->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button>Delete</button>

                        </form>
                    </td>

                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
