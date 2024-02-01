@extends('layouts.app')

@section('content')
    <div class="container">
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
        <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Elimina profilo">
        </form>
    </div>
@endsection