@php
    $page->title = 'Contenuto non trovato'
@endphp

@extends('_layouts.main')

@section('body')

    <h1>{{ $page->title }}</h1>
    <h2>Hey, questo è un 404. 💀</h2>
    <p>Cosa stavi cercando? 😖</p>
    <p>Sembra proprio che il contenuto non ci sia o che sia cambiato... Se ti serve qualcosa in particolare, non esitare: contattami!</p>

@endsection
