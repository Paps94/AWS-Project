@extends('layouts.layout')

@section('title', 'Artscapy Test')

@section('content')
<?php
echo phpinfo();
?>
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-6 col-md-12 -col-sm-12 mt-5" style="background: blue">
            <h3>Art Pieces Table</h3>
          </div>l
          <div class="col-lg-6 col-md-12 -col-sm-12 mt-5" style="background: aliceblue">
            <h3>Logs Table (Hopefully there is a way to retrieve them from AWS)</h3>

          </div>
          <div class="col-lg-4 col-md-4 -col-sm-12 mt-5" style="background: pink">
            <h3>Check list</h3>
          </div>
          <div class="col-lg-4 col-md-4 -col-sm-12 mt-5" style="background: green">
            <h3>Stack use</h3>

          </div>
          <div class="col-lg-4 col-md-4 -col-sm-12 mt-5" style="background: yellow">
            <h3>Something else idk</h3>

          </div>
      </div>
  </div>
@endsection
