@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategori Oluştur</div>


                    <div class="row">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="p-3 pb-0">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <form action="{{ route('admin-category-store') }}" class="p-3"
                                  method="post">
                                <div class="form-group">
                                    <label>Kategori İsmi</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>

                                <div class="form-group">
                                    <label>Üst Kategori</label>
                                    <select name="parent_id" id="" class="form-control">
                                        <option value="">Seçiniz</option>
                                        @foreach($categories as $parent_category)
                                            <option value="{{ $parent_category->id }}">{{ $parent_category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <input type="submit" class="btn btn-primary">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


