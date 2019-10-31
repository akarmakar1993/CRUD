@extends('layouts.app')

@section('content')
<div class="container">
<h1>Update Ticket  </h1>

<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <div class="container">
    <form method="post" action="{{url('update_ticket', $data->id)}}">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="title">Ticket Title:</label>
            <input type="text" class="form-control" name="title" value="{{ $data->title }}"/>
        </div>
        <div class="form-group">
            <label for="description">Ticket Description:</label>
            <input type="text" cols="5" rows="5" class="form-control" name="description" value="{{ $data->description }}"/>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        
        </form>
    </div>
</div>
@endsection