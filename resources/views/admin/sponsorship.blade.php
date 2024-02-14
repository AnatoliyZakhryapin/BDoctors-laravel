@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="pt-4  d-flex justify-content-center align-items-center">
            <p class="sponsorship-description">Abbonati ora per ottenere visibilità immediata e primeggiare sugli altri! Con il nostro abbonamento, il tuo profilo sarà mostrato in primo piano <i class="fa-solid fa-crown"></i></p>
        </div>
        <div class=" d-block d-md-flex justify-content-between align-items-center h-100 gap-4">
            
            @for ($i = 1; $i <= 3; $i++)
                <div class="col-12 col-md-4 col-lg-4 pt-3">
                    <div class="card-cust h-100">
                        <div class="card-top h-100 fs-3 ">
                            @if ($i == 1)
                                Abbonamento 1 giorno
                            @elseif ($i == 2)
                                Abbonamento 2 giorni
                            @else 
                                Abbonamento 1 settimana
                            @endif
                        </div>
                
                        <div class="card-bottom ">
                            <div class="d-flex justify-content-center fs-5">
                                @if ($i == 1)
                                <p>Questo abbonamento dura 24h</p>
                                @elseif ($i == 2)
                                    <p>Questo abbonamento dura 72h</p>
                                @else 
                                    <p>Questo abbonamento dura 144h</p>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center fs-4">
                                @if ($i == 1)
                                <p><strong>2,99&euro;</strong></p>
                                @elseif ($i == 2)
                                <p><strong>5,99&euro;</strong></p>
                                @else 
                                <p><strong>9,99&euro;</strong></p>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center h-100 ">
                                @if ($i == 1)
                                <a class="btn btn-cust" href="#">Abbonati ora <i class="fa-solid fa-crown"></i></a>
                                @elseif ($i == 2)
                                <a class="btn btn-cust" href="#">Abbonati ora <i class="fa-solid fa-crown"></i></a>
                                @else 
                                <a class="btn btn-cust" href="#">Abbonati ora <i class="fa-solid fa-crown"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="d-flex justify-content-center pt-5">
            <p>*Ogni abbonamento scade in automatico</p>
        </div>
    </div>


@endsection