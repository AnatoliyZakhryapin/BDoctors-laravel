@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Le mie recensioni</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Messaggio</th>
                            <th>Nome Dottore</th>
                            <th>Cognome Dottore</th>
                            <th>Voto Recensione</th>
                            <th colspan="3">Voto Recensione</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->message }}</td>
                                <td>{{ $review->doctor->user->name }}</td>
                                <td>{{ $review->doctor->user->surname }}</td>
                                <td>{{ $review->vote->name }}, {{ $review->vote->value }}</td>
                                <td><a class="btn btn-primary" href="{{ route('admin.reviews.show', $review) }}">Apri</a></td>
                                <td>
                                    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
