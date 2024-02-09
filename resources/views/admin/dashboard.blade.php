@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- evita messaggio errore in caso $doctor non sia definito --}}
        @if (isset($doctor))
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
                    <div class="green-card my-5 my-lg-2">
                        <h3>Messaggi</h3>
                        <a class="btn-cust dashboard-link" href="{{ route('admin.messages.index') }}">Visualizza tutti i
                            messaggi</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Indirizzo email</th>
                                    <th scope="col">Apri</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $key => $message)
                                    <tr>
                                        <td scope="row">{{ $message->name }} {{ $message->surname }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td><a href="{{ route('admin.messages.show', $message) }}"> <i
                                                    class="fa-solid fa-envelope"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="green-card my-5 my-lg-2">
                        <h3>Recensioni</h3>
                        <a class="btn-cust dashboard-link" href="{{ route('admin.reviews.index') }}">Visualizza tutte le
                            recensioni</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Messaggio</th>
                                    <th scope="col">Voto</th>
                                    <th scope="col">Apri</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $key => $review)
                                    <tr>
                                        <td scope="row">{{ $review->name }}</td>
                                        <td>{{ $review->message }}</td>
                                        <td>{{ $review->vote->value }}/5</td>
                                        <td><a href="{{ route('admin.reviews.show', $review) }}"> <i
                                                    class="fa-solid fa-star"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
