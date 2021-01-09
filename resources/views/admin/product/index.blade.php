@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ürünler</div>

                    <div class="table-responsive">
                        <a href="{{ route('admin-product-create') }}" class="btn btn-primary m-2">Yeni Ekle</a>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Ürün İsmi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <a href="{{ route('admin-product-edit', $product->id) }}">Güncelle</a>
                                        <span>|</span>
                                        <a href="{{ route('admin-product-delete', $product->id) }}">Sil</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="row m-auto">
                            <div class="col-md-12">
                                {!! $products->links('vendor.pagination.bootstrap-4')  !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


