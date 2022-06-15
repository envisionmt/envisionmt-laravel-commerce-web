@push('after-scripts')
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/js/pages/product.js') }}"></script>
@endpush

@extends('backend.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Product</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('backend.components.alert')
                </div>
                <div class="col-md-12">
                    <form action="{{ route('backend.products.update', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Brand</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.category')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.name-english')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.name-chinese')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.content-english')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.content-chinese')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.price')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.type')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.package')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.stock-status')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Action</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('backend.fields.common.action', ['url' => route('backend.products.index')])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('backend.fields.edit.image')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
