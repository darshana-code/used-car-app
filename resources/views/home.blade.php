@extends('layouts.app')

@section('content')
    <header class="text-center mb-4">
        <h1>Used Car Project</h1>
    </header>
    <p class="text-center">
        Looking for a particular car? Search our inventory<a href="{{ route('search') }}"> here</a>.
    </p>
    <div class="row">
        @foreach($manufacturers as $manufacturer)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $manufacturer->name }}</h5>
                        <p class="card-text">Country: {{ $manufacturer->origin_country }}</p>
                        <p class="card-text">Cars in stock: {{ $manufacturer->cars_count }}</p>
                        <a href="{{ route('manufacturer.show', $manufacturer->id) }}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
