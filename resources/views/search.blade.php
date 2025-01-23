@extends('layouts.app')

@section('content')

    <header class="text-center mb-4">
        <h1>Search Cars</h1>
    </header>
    <div class="container">
        <form action="{{ route('search') }}" method="GET">
            <label for="query">Search:</label>
            <input type="text" id="query" name="query" placeholder="Enter manufacturer, model, colour, or year" value="{{ old('query', $query ?? '') }}" class="col-md-6">
            <button type="submit">Go</button>
        </form>

        @if(isset($cars))

            @if($cars->isEmpty())
                <p>No cars found matching your query.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Manufacturer Name</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Colour</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                            <tr>
                                <td>{{ $car->manufacturer->name }}</td>
                                <td>{{ $car->model }}</td>
                                <td>{{ $car->year }}</td>
                                <td>{{ $car->color }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           @endif
       @endif
            <a href="{{ route('home') }}" >Back to Home</a>
    </div>
@endsection
