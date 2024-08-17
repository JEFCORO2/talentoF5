@extends('layouts.app')

@section('contenido')
    @vite('resources/css/colores.css')
    @vite('resources/js/colores.js')
    <div id="team-members" class="colores">
        <article class="team-member color-pink"></article>
        <article class="team-member color-gray"></article>
        <article class="team-member color-red"></article>
        <article class="team-member color-brown"></article>
        <article class="team-member color-green"></article>
        <article class="team-member color-black"></article>
        <article class="team-member color-yellow"></article>
        <article class="team-member color-blue"></article>
    </div>
@endsection
