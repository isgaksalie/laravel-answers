@extends('template')

@section('content')
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>{{ $question->title }}</h1>
                <hr>
                <p class="lead">
                    {{ $question->description }}
                </p>
            </div>
        </div>
    </div>
    <br>
    <br>

    <hr>
    @if($question->answers->count() > 0)
        <h3 class="container">Answers</h3>
        @foreach( $question->answers as $answer)
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <p>
                            {{ $answer->content }}
                        </p>
                    </div>
                </div>
            </div>
            <br>
        @endforeach

    @else
        <div class="container">
            <p class="lead">No Answers to show</p>
        </div>
    @endif

    <hr>
    <form action="{{ route( 'answers.store' ) }}" method="POST">
        {{ csrf_field() }}
        <div class="container">
            <label for="answer">Would you like to Answer?</label>
            <textarea type="text" name="answer" id="answer" class="form-control"></textarea>
            <input type="hidden" value="{{ $question->id }}" name="question_id" id="question_id" class="form-control"/>
            <br>
            <input type="submit" class="btn btn-primary" value="Submit Answer">
        </div>

    </form>
@endsection