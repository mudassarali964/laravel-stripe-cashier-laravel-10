@extends('layouts.master')

@section('title', 'Create New Plan')
@section('title-2', 'Create New Plan')
@section('title-3', 'Create New Plan')

@section('content')
    <div class="row mb-3 justify-content-center">
        <div class="col-lg-12">
            {{-- Form Basic --}}
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Create New Plan</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('plans.store') }}">
                        @csrf
                        @include('layouts.partial.messages')
                        <div class="form-group float-left width-49">
                            <label for="emailHelp">Name</label>
                            <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" id="planName" aria-describedby="emailHelp"
                                   placeholder="Plan" value="{{ old('name') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group float-right width-49">
                            <label for="selectInterval">Select Interval</label>
                            <select class="form-control" name="interval" id="selectInterval">
                                <option value="week" @if(old('interval') === 'week') selected @endif>Weekly</option>
                                <option value="month" selected>Monthly</option>
                                <option value="year" @if(old('interval') === 'year') selected @endif>Yearly</option>
                            </select>
                            @if($errors->has('interval'))
                                <div class="is-invalid">{{ $errors->first('interval') }}</div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input type="text" name="price" class="form-control @if($errors->has('price')) is-invalid @endif" aria-label="Amount (to the nearest dollar)"
                                   placeholder="Price" value="{{ old('price') }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                            @if($errors->has('price'))
                                <div class="invalid-feedback" >{{ $errors->first('price') }}</div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Description</span>
                            </div>
                            <textarea class="form-control" name="description" aria-label="Description" id="planDescription" required></textarea>
                        </div>
                        <a href="{{ route('plans.index') }}" class="btn btn-light float-right">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

