@extends('layouts.master')

@section('title', 'Admin Dashboard')
@section('title-2', 'Dashboard')
@section('title-3', 'Dashboard')


@section('content')
    <div class="row mb-3">
    {{-- Earnings (Monthly) Card Example --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Plans</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $plans }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- New User Card Example --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('dist/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo/chart-area-demo.js') }}"></script>
@endpush
