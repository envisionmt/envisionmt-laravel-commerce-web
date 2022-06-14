@extends('backend.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Product</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('backend.products.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Fields</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('backend.fields.create.category')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.create.name-english')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.create.name-chinese')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.create.description-english')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.create.description-chinese')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.create.price')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.create.type')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.create.package')
                                            </div>
                                            <div class="col-md-12">
                                                @include('backend.fields.create.stock-status')
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
                                        <h3 class="card-title">Media</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('backend.fields.create.image')
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
