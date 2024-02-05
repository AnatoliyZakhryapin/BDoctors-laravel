@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.doctors.update', $doctor) }}" method="POST">
            @csrf
            @METHOD('PUT')
            <div class="mb-3">
                <label for="curriculum" class="form-label">Curriculum</label>
                <input type="file" class="form-control" id="curriculum" name="curriculum" accept=".pdf" value="{{ old('curriculum', $doctor->curriculum) }}">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="photo" name="photo" accept=".jpeg,.png" value="{{ old('photo', $doctor->photo) }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $doctor->address) }}">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $doctor->phone_number) }}">
            </div>
            <div class="mb-3">
                <label for="medical_services" class="form-label">Prestazioni</label>
                <input type="text" class="form-control" id="medical_services" name="medical_services" value="{{ old('medical_services', $doctor->medical_services) }}">
            </div>
            <div class="mb-3">
                <p>Seleziona le tue specializzazioni</p>
                @foreach($specializations as $specialization)
                    <input 
                        type="checkbox" 
                        @checked(in_array($specialization->id, old('specializations', $doctor->specializations->pluck('id')->all()))) 
                        id="{{ $specialization->name }}" 
                        name="specializations[]" 
                        value="{{ $specialization->id }}">
                    <label for="{{ $specialization->name }}">{{ $specialization->name }}</label>
                @endforeach
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.dashboard.index')}}">
                    <button type="button" class="btn btn-secondary">Close</button>
                </a>
              <input type="submit" class="btn btn-primary" value="Edit">
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
    </div>
@endsection