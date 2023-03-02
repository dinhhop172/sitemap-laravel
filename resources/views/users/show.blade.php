<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail of user</title>

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
        <tbody>
            <tr>
                <td><span>Id</span></td>
                <td><span>{{ $product->id }}</span></td>
            </tr>
            <tr>
                <td><span>Name</span></td>
                <td><span>{{ $product->name }}</span></td>
            </tr>
            <tr>
                <td><span>Email</span></td>
                <td><span>{{ $product->price }}</span></td>
            </tr>
        </tbody>
    </table>
    <a class="pagination" href="{{ route('users.index') }}">Back</a>
</body>
</html>
