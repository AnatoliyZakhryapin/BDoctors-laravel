@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Index messages</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id messagio</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Indirizzo mail</th>
                        <th scope="col">Doctor id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($messages as $key => $message)
                    <tr>
                        <th scope="row">{{ $key + 1 }} </th>
                        <th scope="col">{{ $message->id}}</th>
                        <th scope="col">{{ $message->name}}</th>
                        <th scope="col">{{ $message->surname}}</th>
                        <th scope="col">{{ $message->email}}</th>
                        <th scope="col">{{ $message->doctor_id}}</th>
                        <th scope="col">{{ $message->doctor->user->name}}</th>
                        <th scope="col">{{ $message->doctor->user->surname}}</th>
                        <th scope="col"></th>
                        <td><a class="btn btn-primary" href="{{ route('admin.messages.show', $message)}}">Apri</a></td>
                        <td>
                            <form action="{{ route('admin.messages.destroy', $message)}}" method="POST">
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
