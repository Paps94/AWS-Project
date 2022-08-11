@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header">Add new art piece</div>
  <div class="card-body">
    <a href="{{ url('/') }}" class="btn btn-primary btn-sm" title="Dashboard">Dashboard</a>

      <form action="{{ url('art') }}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" name="id" id="id" value="" id="id" />

        <label for="title">Title</label></br>
        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')<span class="text-danger">{{ $message }}</span>@endif</br>

        <label for="description">Description</label></br>
        <input type="text" name="description" id="description" value="{{ old('description') }}" class="form-control @error('description') is-invalid @enderror"></br>
        @error('description')<span class="text-danger">{{ $message }}</span>@endif</br>

        <label for="artist">Artist</label></br>
        <input type="text" name="artist" id="artist" value="{{ old('artist') }}" class="form-control @error('artist') is-invalid @enderror"></br>
        @error('artist')<span class="text-danger">{{ $message }}</span>@endif</br>

        <label for="no_of_past_owners">No of past owners</label></br>
        <input type="number" name="no_of_past_owners" id="no_of_past_owners" value="{{ old('no_of_past_owners') }}" class="form-control @error('no_of_past_owners') is-invalid @enderror"></br>
        @error('no_of_past_owners')<span class="text-danger">{{ $message }}</span>@endif</br>

        <label for="type">Type</label>
        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
          <option value="" selected>Please choose an option</option>
          <option value="digital" {{ old('type') == 'digital' ? 'selected' : '' }}>Digital</option>
          <option value="physical" {{ old('type') == 'physical' ? 'selected' : '' }}>Physical</option>
        </select></br>
        @error('type')<span class="text-danger">{{ $message }}</span>@endif</br>

        <label for="for_sale">For sale</label>  <br>
        <input type="radio" id="for_sale_yes" name="for_sale" value="1" {{ old('type') == '1' ? 'checked' : '' }}>
        <label for="for_sale_yes">Yes</label>
        <input type="radio" id="for_sale_no" name="for_sale" value="0"  {{ old('type') == '0' ? 'checked' : '' }}>
        <label for="for_sale_no">No</label><br>
        @error('for_sale')<span class="text-danger">{{ $message }}</span>@endif</br>

        <br>

        <label for="creation_date">Date art was created</label></br>
        <input type="date" name="creation_date" id="creation_date" value="{{ old('creation_date') }}" class="form-control @error('creation_date') is-invalid @enderror"></br>
        @error('creation_date')<span class="text-danger">{{ $message }}</span>@endif</br>

        <label for="value">Value</label></br>
        <input type="number" name="value" id="value" value="{{ old('value') }}" class="form-control @error('number') is-invalid @enderror" step=".01"></br>
        @error('value')<span class="text-danger">{{ $message }}</span>@endif</br>

        <label for="user_id">Owner</label></br>
        <select name="user_id" id="user_id" class="form-control @error('user_id') is-invalid @enderror">
          <option value="" selected>Please choose a user</option>
          @foreach($users as $user)
              <option value="{{$user->id}}" {{ old('user_id', $user->id) == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
          @endforeach
        </select>

        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
