@extends('layouts.app')

@section('content')
    <header class="text-center mb-4">
        <h1>Car Manufacturer Details</h1>
    </header>
    <div class="container">
        <h1>{{ $manufacturer->name }}</h1>
        <p><strong>Country:</strong> {{ $manufacturer->origin_country }}</p>
        <p><strong>Description:</strong> {{ $manufacturer->description }}</p>
        <p><strong>Cars in Stock:</strong> {{ $manufacturer->cars->count() }}</p>
        <h2>Available Cars</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Model</th>
                <th>Year</th>
                <th>Colour</th>
            </tr>
            </thead>
            <tbody>
                @foreach($manufacturer->cars as $car)
                    <tr>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->color }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
    </div>
@endsection
