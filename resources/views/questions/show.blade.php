@extends('template')

@section('content')
    <br>
        <div class="container">
            <h1>{{ $question->title }}</h1>
            <p class="lead">
                {{ $question->description }}
            </p>
        </div>
    @endsection