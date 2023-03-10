@extends('backend.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Page Information</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('backend.pages.index') }}" class="btn btn-default mr-2">Back</a>
                    <a href="{{ route('backend.pages.edit', $item->id) }}" class="btn btn-info">
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Page</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p>
                                                <strong>Slug:</strong>
                                                {{ $item->slug }}
                                            </p>
                                            <p>
                                                <strong>Title English:</strong>
                                                {{ $item->title_english }}
                                            </p>
                                            <p>
                                                <strong>Title Chinese:</strong>
                                                {{ $item->title_chinese }}
                                            </p>
                                            <p>
                                                <strong>Body English:</strong>
                                                {!! $item->body_english !!}
                                            </p>
                                            <p>
                                                <strong>Body Chinese:</strong>
                                            </p>
                                            {!! $item->body_chinese !!}

                                        </div>
                                        <div class="col-md-4">
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
            </div>
        </div>
    </section>
@endsection
