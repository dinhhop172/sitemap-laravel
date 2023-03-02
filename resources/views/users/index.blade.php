<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show all the users</title>

    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        table {
            margin: 0 auto;
        }
        .pagination {
            display: flex;
            justify-content: center;
        }
        .pagination > li{
            width: 2%;
            list-style-type: none;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <th>
                        <a href="users/{{$product->slug}}">Detail</a>
                    </th>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="">
        {{ $products->links() }}
    </div>
</body>
</html>
