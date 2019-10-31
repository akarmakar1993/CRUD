@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>Title</td>
              <td>Description</td>
              <td colspan="2">View Details</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->description}}</td>
                <td><a href="{{ url('show_ticket', $ticket->id) }}" class="btn btn-primary">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection     