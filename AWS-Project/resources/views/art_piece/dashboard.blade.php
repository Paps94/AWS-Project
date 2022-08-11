@extends('layouts.layout')

@section('title', 'Artscapy Test')

@section('content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12 col-md-12 -col-sm-12 mt-5">
              <div class="card">
                  <div class="card-header">
                      <h2 style="font-weight: 900">Art Pieces Table</h2>
                  </div>
                  <div class="card-body">
                      <a href="{{ url('/art/create') }}" class="btn btn-success btn-sm" title="Add New Art">
                          <i class="fa fa-plus" aria-hidden="true"></i> Add New
                      </a>
                      <br/>
                      <br/>
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>Artist</th>
                                      <th>No of Past Owners</th>
                                      <th>Type</th>
                                      <th>For Sale</th>
                                      <th>Value</th>
                                      <th>Owner</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($art_pieces as $art_piece)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{{ $art_piece->title }}</td>
                                      <td>{{ $art_piece->description }}</td>
                                      <td>{{ $art_piece->artist }}</td>
                                      <td>{{ $art_piece->no_of_past_owners }}</td>
                                      <td>{{ $art_piece->type }}</td>
                                      <td>{{ $art_piece->for_sale ? '✓' : 'X' }}</td>
                                      <td>{{ $art_piece->value }}</td>
                                      <td>{{ $art_piece->user ? $art_piece->user->name : 'No owner' }}</td>
                                      <td>
                                          <form method="post" action="{{ url('/art' . '/' . $art_piece->id) }}" accept-charset="UTF-8" style="display:inline">
                                              @csrf
                                              @method('DELETE')
                                              <input type="hidden" name="_method" value="DELETE">
                                              <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-12 col-md-12 -col-sm-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h2 style="font-weight: 900">Failed Art Piece additions</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Error Message</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $log->description }}</td>
                                    <td>{{ \Carbon\Carbon::parse($log->created_at)->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 -col-sm-12 mt-5">
            <h3>Check list</h3>
            <div id="checklist">
             <input id="01" type="checkbox" name="r" value="1" checked>
             <label for="01">Create a webform - make up your fields, have at least 5 and try and mix up types</label>
             <input id="02" type="checkbox" name="r" value="2">
             <label for="02">Create a simple AWS Lambda function to process the form data and store the output in a database</label>
             <input id="03" type="checkbox" name="r" value="3" checked>
             <label for="03">Create a web table to show all of the submitted data (seperate from web form)</label>
            </div>

          </div>
          <div class="col-lg-6 col-md-6 -col-sm-12 mt-5">
            <h3>Check list for myself</h3>
            <div class="check-card">
              <div>
                <input type="checkbox" id="check1" name="check" value="" checked/>
                <label for="check1"><span></span>Create Laravel app (CRUD, Seeders, Models, Routes)</label>
              </div>
              <div>
                <input type="checkbox" id="check2" name="check" value="" checked/>
                <label for="check2"><span></span>Create AWS RDS</label>
              </div>
              <div>
                <input type="checkbox" id="check3" name="check" value="" checked/>
                <label for="check3"><span></span>Create Elasticbean instance</label>
              </div>
              <div>
                <input type="checkbox" id="check4" name="check" value="" checked/>
                <label for="check4"><span></span>Create LAMBDA function</label>
              </div>
              <div>
                <input type="checkbox" id="check5" name="check" value="" checked/>
                <label for="check5"><span></span>Create GatewayAPI</label>
              </div>
              <div>
                <input type="checkbox" id="check6" name="check" value="" />
                <label for="check6"><span></span>Link all AWS services together</label>
              </div>
            </div>
          </div>
      </div>
  </div>
@endsection
