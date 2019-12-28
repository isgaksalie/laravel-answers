@extends('template')

@section('content')
<div class="container">
    <h3>Ask a question</h3>

    <form action="{{ route('questions.store') }}" method="POST">
        {{ csrf_field() }}
        <label for="title">Question: </label>
        <input type="text" name="title" id="title" class="form-control"/>

        <label for=description>More Information</label>
        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
        <br>
        <input type="submit" class="btn btn-primary" value="Submit Question">
    </form>
</div>
    @endsection