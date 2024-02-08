@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="my-2">
                Dott. {{ $doctor->user->name }} {{ $doctor->user->surname }}
            </h1>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-md-6 col-lg-12">
                        <figure>
                            <img src="{{ asset($doctor->photo) }}" alt="" class="h-100 rounded img-thumbnails">
                        </figure>
                        <p>{{ $doctor->address }}</p>
                        <p>{{ $doctor->phone_number }}</p>
                    </div>
                    <div class="col-md-6 col-lg-12 align-self-md-end">
                        <ul>
                            @foreach ($doctor->specializations as $specialization)
                                <li>{{ $specialization->name }}</li>
                            @endforeach
                        </ul>
                        <p>{{ $doctor->medical_services }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-cust">Modifica</a>
                            {{-- <form action="{{ route('admin.doctors.destroy', $doctor) }}" method="POST"
                                onsubmit="return confirm('Sei sicuro di voler eliminare il profilo?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" value="Elimina profilo">Elimina</button>
                            </form> --}}
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-8">
                <div class="dashboard-card my-5 my-lg-2">
                    <h3 class="dashboard-link">
                        <a href="{{ route('admin.messages.index') }}">Messaggi</a>
                    </h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Indirizzo email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $key => $message)
                                <tr>
                                    <th scope="row">{{ $key + 1 }} </th>
                                    <td scope="col">{{ $message->name }} {{ $message->surname }}</td>
                                    <td scope="col">{{ $message->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="dashboard-card my-5 my-lg-2">
                    <h3 class="dashboard-link">
                        <a href="{{ route('admin.reviews.index') }}">Recensioni</a>
                    </h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Voto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $key => $review)
                                <tr>
                                    <th scope="row">{{ $key + 1 }} </th>
                                    <td scope="col">{{ $review->name }}</td>
                                    <td scope="col">{{ $review->vote->value }}/5</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
