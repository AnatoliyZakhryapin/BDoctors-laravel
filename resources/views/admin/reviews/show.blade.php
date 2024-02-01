@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Show reviews</h1>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-4">
                <h1>Dettagli recensione</h1>
                <div class="card">
                    <div class="card-body">
                        <p><strong>Nome:</strong> {{ $review->name }}</p>
                        <p><strong>Messaggio:</strong> {{ $review->message }}</p>
                        <p><strong>Nome Dottore:</strong> {{ $review->doctor->user->name }}</p>
                        <p><strong>Cognome Dottore:</strong> {{ $review->doctor->user->surname }}</p>
                        <p><strong>Voto Recensione:</strong> {{ $review->vote->name }}, {{ $review->vote->value }}</p>
                        <div class="d-flex gap-2 justify-content-between">
                            <a href="{{ route('admin.reviews.index') }}">
                                <button type="button" class="btn btn-success">Torna alla lista</button>
                            </a>
                            <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
