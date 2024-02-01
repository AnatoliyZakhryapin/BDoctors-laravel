@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-auto">
            <h1>Show messages</h1>
        </div>
    </div>
    <div class="row justify-content-center ">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3" >{{ $message->name }} {{ $message->surname}}</h4>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $message->phone_number }}</h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $message->email }}</h6>
                    <p class="card-text">{{ $message->message }}</p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.messages.index')}}">
                            <button type="button" class="btn btn-success">Close</button>
                        </a>
                        <form action="{{ route('admin.messages.destroy', $message)}}" method="POST">
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
