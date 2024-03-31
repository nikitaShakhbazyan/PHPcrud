<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Products</h1>
    <a href="{{route('products.create')}}">Create new product</a>
    <div>
        @if (session()->has('success'))
            <div>{{session('success')}}</div>
        @endif
    </div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>QTY</th>
                <th>Price</th>
                <th>Descriptin</th>
                <th>Delete</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <th>{{$product->id}}</th>
                    <th>{{$product->name}}</th>
                    <th>{{$product->qty}}</th>
                    <th>{{$product->price}}</th>
                    <th>{{$product->description}}</th>
                    <td>
                        <a href="{{route('products.edit', ['product' => $product])}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('products.delete',['product'=>$product])}}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>