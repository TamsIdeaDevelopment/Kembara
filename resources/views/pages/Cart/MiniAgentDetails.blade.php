@extends('layouts.dashboard.layout')

@section('content')
    @include('layouts.others.mobile')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">
        @if($agent->agent_levels_id == 5 && $agent->paid == 0)
            @include('menus.minimenu')
        @elseif($agent->agent_levels_id <= 5)
            @include('menus.menu')
        @endif
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            @if($agent->agent_levels_id == 5 && $agent->paid == 0)
                @include('menus.minitop-bar')
            @elseif($agent->agent_levels_id <= 5)
                @include('menus.top-bar')
            @endif
            <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Shopping Cart</h5>
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                            </div>
                        </div>
                    </div>
                    <mini-agent-first-purchase-details-dashboard data="{{Auth::user()->id}}"></mini-agent-first-purchase-details-dashboard>
                </div>
            </div>
        </div>
    </div>
@endsection
