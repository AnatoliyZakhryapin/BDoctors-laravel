@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            <div class="col-auto">
                @if($logged_user)
                    <h1>Benvenuto {{ $logged_user->name}}  {{ $logged_user->surname}} </h1>
                @else
                    <h1>Benvenuto a BDoctors</h1>
                    <h3>Registra il tuo nuovo account o fai Login</h3>
                @endif
            </div>
        </div>
    </div>
@endsection