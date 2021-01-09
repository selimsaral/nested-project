<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <div class="row">

        <h3>Ürünler ( Toplam Ürün Sayısı: {{ $products->total() }})</h3>

        <div class="col-md-12">
            <ul>
                @foreach($products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 m-auto">
                    {!! $products->links('vendor.pagination.bootstrap-4')  !!}
                </div>
            </div>
        </div>

    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
