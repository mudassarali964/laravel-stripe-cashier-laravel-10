@extends('layouts.master')

@section('title', 'Plans')
@section('title-2', 'Plans')
@section('title-3', 'Plans')

@push('css')
    <link href="{{ asset('dist/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="row mb-3">
        {{-- DataTable with Hover --}}
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All plans list</h6>
                    <a href="{{ route('plans.create') }}" class="btn btn-primary"> Add Plan</a>
                </div>
                @include('layouts.partial.messages')
                <div class="table-responsive p-3">
                    @if ($plans->count())
                        <table class="table align-items-center table-flush table-hover" id="planDataTable">
                            <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Created date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                                <tr>
                                    <td>{{ $plan->name }}</td>
                                    <td>${{ $plan->price }}</td>
                                    <td>{{ $plan->description }}</td>
                                    <td>{{ $plan->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No plans created!
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{-- Page level plugins --}}
    <script src="{{ asset('dist/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    {{-- Page level custom scripts --}}
    <script>
        $(document).ready(function () {
            $('#planDataTable').DataTable(); // ID From dataTable with Hover
        });
    </script>
@endpush
