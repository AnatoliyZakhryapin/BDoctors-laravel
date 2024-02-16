@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Index statistics</h1>
                <form method="get" action="{{ route('admin.statistics.index') }}">
                    @csrf
                    <select name="year">
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                    <button type="submit">Seleziona</button>
                </form>
                @if (isset($selected_year))
                    <p>Nel {{ $selected_year }} hai ricevuto {{ $selected_year_messages_n }} messaggi e
                        {{ $selected_year_reviews_n }} recensioni</p>
                    <h4>Messaggi ricevute per mese nel {{ $selected_year }}</h4>
                    @foreach ($messages_per_month as $key => $messages_n)
                        <p><strong>{{ $key }}</strong>: {{ $messages_n }}</p>
                    @endforeach
                    <h4>Recensioni ricevute per mese nel {{ $selected_year }}</h4>
                    @foreach ($reviews_per_month as $key => $reviews_n)
                        <p><strong>{{ $key }}</strong>: {{ $reviews_n }}</p>
                    @endforeach
                @else
                    <p>Seleziona un anno dal menu a tendina</p>
                @endif
                <p>Media totale delle recensioni: {{ $reviews_average }}</p>
            </div>
        </div>
    </div>
@endsection
