@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail of Your {{ $ticket->title }} Ticket</h3>
    <hr>

    <div class="card-body">
        <h4>Title of Ticket</h4>
        <p>{{ $ticket->title }}</P>
        <h4>Description of Ticket</h4>
        <p>{{ $ticket->description }}</P>
        <h4>Booking Date</h4>
        <p>{{ $ticket->created_at }}</P>
        <a href="{{ url('create_ticket', $ticket->id) }}" class="btn btn-primary">Edit</a> <br>
            <br>
        <a href="{{url('delete_ticket', $ticket->id)}}" class="btn btn-primary">Delete</a> <br>
    </div>

</div>
@endsection
