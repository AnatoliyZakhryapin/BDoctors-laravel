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
                                        <td><button class="btn-cust-red myBtn btn-danger">Elimina</button></td>
                                    </tr>
                                    <div class="bg-form bgForm">
                                        <div class="d-flex align-items-center gap-3 delete-form">
                                            <h4 class="text-light">Vuoi davvero eliminare questa recensione?</h4>
                                            <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-lg">Si</button>
                                            </form>
                                            <button class="btn btn-primary btn-lg noBtn">No</button>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
    <script>
        deleteDomEl = document.querySelectorAll('.myBtn');
        noDomEl = document.querySelectorAll('.noBtn');
        formDomEl = document.querySelectorAll('.bgForm');

        for (let i = 0; i < deleteDomEl.length; i++) {
            deleteDomEl[i].addEventListener('click', function() {
                formDomEl[i].classList.add('active')
            })
        }

        for (let i = 0; i < deleteDomEl.length; i++) {
            noDomEl[i].addEventListener('click', function() {
                formDomEl[i].classList.remove('active')
            })
        }
    </script>
@endsection
