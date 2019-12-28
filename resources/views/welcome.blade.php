@extends('template')

@section('content')
<div class="container">
    <br>
    <div class="jumbotron">
        <p>Ask any question you want to know about Laravel and we will get the answers to you!</p>
        <p>
            <a href="/questions/create" class="btn btn-primary btn-lg" role="button">Ask Now</a>
        </p>
    </div>

    <h3>Recent Questions:</h3>
</div>
    @endsection