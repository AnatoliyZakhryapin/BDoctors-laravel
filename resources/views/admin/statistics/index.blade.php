@extends('layouts.app')

@section('content')
    <div class="container margin-top">
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
                @else
                    <p>Seleziona un anno dal menu a tendina</p>
                @endif
                <p>Media totale delle recensioni: {{ $reviews_average }}</p>
            </div>
        </div>
    </div>
@endsection
