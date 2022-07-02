@extends('frontend.layouts.app')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Invoice</h2>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('frontend.sites.index') }}">{{ __('message.home') }}</a>
                        <a href="{{ route('frontend.user.invoice') }}">{{ __('message.invoice') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content mt-4">
        <div class="container">
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hovercode" id="table-list">
                        <thead>
                        <tr>
                            <th>{{ __('message.order_no') }}</th>
                            <th>{{ __('message.order_request') }}</th>
                            <th>{{ __('message.transaction _amount') }}</th>
                            <th>{{ __('message.order_status') }}</th>
                            <th>{{ __('message.shipping_status') }}</th>
                            <th class="text-center">{{ __('message.created_at') }}</th>
                            <th class="text-center">{{ __('message.action') }}</th>
                        </tr>
                        </thead>
                        <tbody class="sortable">
                        @forelse ($list as $item)
                            <tr class="ui-state-default">
                                <td>{{ $item->order_no }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->transaction_amount_origin }} {{ \App\Models\OrderPayment::MALAYSIA_CURRENCY }}</td>
                                <td>{{ $item->status_name }}</td>
                                <td>{{ $item->shipping_status_name }}</td>
                                <td class="text-center">{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('frontend.user.invoiceDetail', $item->id) }}" class="btn btn-sm btn-info">
                                        {{ __('message.view') }}
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="ui-state-default text-center">{{ __('message.no_data_for_this_time_period') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="px-3">{{ $list->total() }} result(s)</p>
                    </div>
                    <div class="col-sm-6">
                        <div class="px-3 float-right">
                            {{ $list->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
