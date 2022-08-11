<?php

namespace App\Http\Controllers;

use App\Models\ArtPiece;
use App\Models\User;
use App\Models\Log;
use App\Http\Requests\StoreArtPieceRequest;
use App\Http\Requests\UpdateArtPieceRequest;

class ArtPieceController extends Controller
{
    //This is what a typical Laravel Controller would look like with the whole CRUD functionality.
    //We won'y make use of all of them but we could if we wanted to.
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all art pieces and pass them in the blade view file
        $artPieces = ArtPiece::with('user')->get();
        return view ('art_piece.index')->with('art_pieces', $artPieces);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('art_piece.create')->with(['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtPieceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtPieceRequest $request)
    {
      try {
        ArtPiece::create($request->all());
        return redirect('art')->with('flash_message', 'Art Piece Addedd!');
      } catch (\Exception $e) {
        //Store the failed attempts when adding art pieces
        Log::create(["description" => $e->getMessage()]);
        return back()->withInput();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArtPiece  $artPiece
     * @return \Illuminate\Http\Response
     */
    public function show(ArtPiece $artPiece)
    {
      //Get the specific art pieces and pass it in the blade view file
      $art = ArtPiece::find($artPiece);
      return view('art_piece.show')->with('art_piece', $art);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArtPiece  $artPiece
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Get all art piece details and users then pass them in the blade view file
        $art_piece = ArtPiece::find($id);
        $users = User::all();
        return view('art_piece.edit')->with(['art_piece' => $art_piece, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtPieceRequest  $request
     * @param  \App\Models\ArtPiece  $artPiece
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtPieceRequest $request, $id)
    {
      $art_piece = ArtPiece::find($id);
      $input = $request->all();
      $art_piece->update($input);
      return redirect('art')->with('flash_message', 'Art Piece Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArtPiece  $artPiece
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $art_piece = ArtPiece::find($id);
        $art_piece->delete();
        return redirect('art')->with('flash_message', 'Art Piece deleted!');
    }

    public function dashboard()
    {
        //Get all art pieces and pass them in the blade view file
        $artPieces = ArtPiece::with('user')->get();
        $logs = Log::get();
        return view ('art_piece.dashboard')->with(['art_pieces' => $artPieces, 'logs' => $logs]);
    }
}
