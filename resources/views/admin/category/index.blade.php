@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategoriler</div>

                    <div class="table-responsive">
                        <a href="{{ route('admin-category-create') }}" class="btn btn-primary m-2">Yeni Ekle</a>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Kategori İsmi</th>
                                <th>İşlemler</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('admin-category-edit', $category->id) }}">Güncelle</a>
                                        <span>|</span>
                                        <a href="{{ route('admin-category-delete', $category->id) }}">Sil</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="row m-auto">
                            <div class="col-md-12">
                                {!! $categories->links('vendor.pagination.bootstrap-4')  !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


