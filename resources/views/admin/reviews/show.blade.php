@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-4">
                <div class="green-card">
                    <div class="card-body">
                        <p><strong>Nome:</strong> {{ $review->name }}</p>
                        <p><strong>Messaggio:</strong> {{ $review->message }}</p>
                        <p><strong>Voto Recensione:</strong> {{ $review->vote->name }}, {{ $review->vote->value }}</p>
                        <div class="d-flex gap-2 justify-content-between">
                            <a href="{{ route('admin.reviews.index') }}">
                                <button type="button" class="btn-cust">Chiudi</button>
                            </a>
                            <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn-cust-red" id="myBtn">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bgForm" class="bg-form">
            <div class="d-flex align-items-center gap-3 delete-form">
                <h4 class="text-light">Vuoi davvero eliminare questa recensione?</h4>
                <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-lg">Si</button>
                </form>
                <button id="noBtn" class="btn btn-primary btn-lg">No</button>
            </div>
        </div>
    </div>
    
    <script>
        deleteDomEl = document.getElementById('myBtn');
        noDomEl = document.getElementById('noBtn');
        formDomEl = document.getElementById('bgForm');

        deleteDomEl.addEventListener('click', function() {
            formDomEl.classList.add('active')
        })

        noDomEl.addEventListener('click', function() {
            formDomEl.classList.remove('active')
        })
    </script>
@endsection
