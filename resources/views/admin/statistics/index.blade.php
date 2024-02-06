@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Index statistics</h1>
                <p>Media totale delle recensioni: {{ $reviews_average }}</p>
            </div>
        </div>
    </div>
@endsection
