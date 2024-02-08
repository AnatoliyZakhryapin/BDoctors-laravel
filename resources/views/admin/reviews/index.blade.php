@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Le mie recensioni</h1>
                <h5>Hai {{ count($reviews) }} recensioni</h4>
                    <div class="green-card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col" class="d-none d-lg-block">Messaggio</th>
                                    <th scope="col">Voto</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td scope="row">{{ $review->name }}</td>
                                        <td class="d-none d-lg-block">{{ $review->message }}</td>
                                        <td>{{ $review->vote->name }}, {{ $review->vote->value }}</td>
                                        <td><a class="btn-cust" href="{{ route('admin.reviews.show', $review) }}">Apri</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@endsection
