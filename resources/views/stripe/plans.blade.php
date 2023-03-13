@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Select Plan: <a href="{{ route('home') }}" style="float: right;">Back</a></div>

                    <div class="card-body">

                        <div class="row">
                            @if($plans->count())
                                @foreach($plans as $plan)
                                    <div class="col-md-6">
                                        <div class="card mb-3">
                                            <div class="card-header">
                                                ${{ $plan->price }}/Mo
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $plan->name }}</h5>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                                <a href="{{ route('stripe_plans.show', $plan->slug) }}" class="btn btn-primary pull-right">Choose</a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>No plans found! Go to admin dashboard and create a new plan.</div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
