@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row m-auto">
                            <div class="col-md-6">
                                <div class="card bg-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header">
                                        <a href="{{ route('admin-category-list') }}">Kategoriler</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light mb-3" style="max-width: 18rem;">
                                    <div class="card-header">
                                        <a href="{{ route('admin-product-list') }}">Ürünler</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
