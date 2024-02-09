@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>I miei messaggi</h1>
                <h5>Hai {{ count($messages) }} messaggi</h5>
                <div class="green-card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th class="d-none d-lg-block" scope="col">Indirizzo mail</th>
                                <th scope="col">Data</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $key => $message)
                                <tr>
                                    <td>{{ $message->name }} {{ $message->surname }}</td>
                                    <td class="d-none d-lg-block">{{ $message->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($message->created_at)->format('j/m/Y') }}
                                    </td>
                                    <td>
                                        <a class="btn-cust" href="{{ route('admin.messages.show', $message) }}">Apri</a>
                                        <button class="btn-cust-red myBtn btn-danger">Elimina</button>
                                    </td>
                                    <div class="bg-form bgForm">
                                        <div class="d-flex align-items-center gap-3 delete-form">
                                            <h4 class="text-light">Vuoi davvero eliminare questo messaggio?</h4>
                                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
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
                console.log('ciao')
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
