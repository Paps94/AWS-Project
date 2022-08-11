@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit an art piece</div>
  <div class="card-body">

      <form action="{{ url('art/' .$art_piece->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$art_piece->id}}" id="id" />

        <label for="title">Title</label></br>
        <input type="text" name="title" id="title" value="{{$art_piece->title}}" class="form-control"></br>

        <label for="description">Description</label></br>
        <input type="text" name="description" id="description" value="{{$art_piece->description}}" class="form-control"></br>

        <label for="artist">Artist</label></br>
        <input type="text" name="artist" id="artist" value="{{$art_piece->artist}}" class="form-control"></br>

        <label for="no_of_past_owners">No of past owners</label></br>
        <input type="number" name="no_of_past_owners" id="no_of_past_owners" value="{{$art_piece->no_of_past_owners}}" class="form-control"></br>

        <label for="type">Type</label></br>
        <select name="type" id="type">
          <option value="digital" {{ old('type', $art_piece->type) == 'digital' ? 'selected' : '' }}>Digital</option>
          <option value="physical" {{ old('type', $art_piece->type) == 'physical' ? 'selected' : '' }}>Physical</option>
        </select>

        <label for="creation_date">Name</label></br>
        <input type="date" name="creation_date" id="creation_date" value="{{$art_piece->creation_date}}" class="form-control"></br>


        <label for="value">Value</label></br>
        <input type="number" name="value" id="value" value="{{$art_piece->value}}" class="form-control" step=".01"></br>

        <label for="user_id">Owner</label></br>
        <select name="user_id" id="user_id">
          @foreach($users as $user)
              <option value="{{$user->id}}" {{ old('user_id', $art_piece->user_id) == $user->id ? 'selected' : '' }} >{{$user->name}}</option>
          @endforeach
        </select>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
