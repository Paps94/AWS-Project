@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2 style="font-weight: 900">Art Pieces Table</h2>
                        <a href="{{ url('/') }}" class="btn btn-primary btn-sm" title="Dashboard">Dashboard</a>
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
        </div>
    </div>
@endsection
