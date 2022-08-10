@push('after-scripts')
    <script src="{{ asset('backend/js/pages/galleries.js') }}"></script>
@endpush
@extends('backend.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Introduction Information</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('backend.products.index') }}" class="btn btn-default mr-2">Back</a>
                    <a href="{{ route('backend.products.edit', $item->id) }}" class="btn btn-info">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-12">
                    @include('backend.components.alert')
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p>
                                                <strong>Category:</strong>
                                                {{ $item->category->name_english }}
                                            </p>
                                            <p>
                                                <strong>Name English:</strong>
                                                {{ $item->name_english }}
                                            </p>
                                            <p>
                                                <strong>Name Chinese:</strong>
                                                {{ $item->name_chinese }}
                                            </p>
                                            <p>
                                                <strong>Price:</strong>
                                                {{ $item->price }}
                                            </p>
                                            <p>
                                                <strong>Type:</strong>
                                                {{ $item->type_name }}
                                            </p>
                                            <p>
                                                <strong>Package:</strong>
                                                {{ $item->package }}
                                            </p>
                                            <p>
                                                <strong>Stock Status:</strong>
                                                {{ $item->stock_status_name }}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p>
                                                <strong>Content English:</strong>
                                                {!! $item->content_english !!}
                                            </p>
                                            <p>
                                                <strong>Content Chinese:</strong>
                                                {!! $item->content_chinese !!}
                                            </p>
                                            <p>
                                                <strong>Created at:</strong>
                                                {{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}
                                            </p>
                                            <p>
                                                <strong>Updated at:</strong>
                                                {{ date('d-m-Y H:i:s', strtotime($item->updated_at)) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Image</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <img src="{{ $item->image }}" class="w-100" style="max-width: 300px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Images</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <form action="{{ route('backend.products.galleries', $item->id) }}" method="POST">
                                        <div class="list-images">
                                            <?php
                                                $galleries = [''];
                                                if ($item->galleries && !empty(json_decode($item->galleries))) {
                                                    $galleries = json_decode($item->galleries);
                                                }
                                            ?>

                                            @csrf
                                            @foreach($galleries as $key => $image)
                                                <div class="input-group-image {{ $key }}">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" data-input="images-{{ $key }}" data-preview="preview-image-{{ $key }}" class="btn btn-primary image-manager">
                                                                <i class="far fa-image"></i> Choose
                                                            </button>
                                                        </div>
                                                        <input type="text" name="galleries[]" class="form-control"
                                                               id="images-{{ $key }}" placeholder="Enter image" style="border-right: 0;" value="{{ $image }}">
                                                        <button type="button" class="btn btn-danger btn-delete-image"
                                                                style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    <p id="preview-image-{{ $key }}" class="mt-2 mb-3">
                                                        @if (!empty($image))
                                                            <img src="{{ $image }}" style="height: 5rem;">
                                                        @endif
                                                    </p>
                                                </div>
                                            @endforeach

                                        </div>
                                        <button type="button" class="btn btn-success btn-add-image"><i class="fas fa-plus"></i> Add new image</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
