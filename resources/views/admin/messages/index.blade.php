@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>I miei messaggi</h1>
                <div class="green-card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th class="d-none d-lg-block" scope="col">Indirizzo mail</th>
                                <th scope="col">Data</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $key => $message)
                                <tr>
                                    <th scope="row">{{ $key + 1 }} </th>
                                    <td scope="col">{{ $message->name }} {{ $message->surname }}</td>
                                    <td class="d-none d-lg-block" scope="col">{{ $message->email }}</td>
                                    <td scope="col">{{ \Carbon\Carbon::parse($message->created_at)->format('j/m/Y') }}
                                    </td>
                                    <td scope="col"></td>
                                    <td>
                                        <a class="btn-cust" href="{{ route('admin.messages.show', $message) }}">Apri</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
