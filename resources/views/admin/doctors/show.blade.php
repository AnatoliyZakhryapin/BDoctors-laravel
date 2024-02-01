@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Dott. {{ $doctor->user->name }} {{ $doctor->user->surname }}</h1>
                <img src="{{ $doctor->photo }}" alt="">
                <p>{{ $doctor->address }}</p>
                <p>{{ $doctor->phone_number }}</p>
                <ul>
                    @foreach ($doctor->specializations as $specialization)
                        <li>{{ $specialization->name }}</li>
                    @endforeach
                </ul>
                <p>{{ $doctor->medical_services }}</p>
            </div>
        </div>
    </div>
@endsection