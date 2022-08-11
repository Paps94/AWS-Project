<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreArtPieceRequest;
use App\Models\ArtPiece;
use App\Models\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApiController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreArtPieceRequest  $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function awsCall(StoreArtPieceRequest $request)
  {
    $validator = Validator::make($request->all(), [
      'title' => 'required',
      'description' => 'required',
      'artist' => 'required',
      'no_of_past_owners' => 'required|integer|numeric',
      'type' => [
          'required',
          Rule::in(['physical', 'digital'])
      ],
      'for_sale' => 'required|integer|numeric',
      'creation_date' => 'required|date',
      'value' => 'required',
      'user_id' => 'required|integer|numeric',
    ]);

    if ($validator->fails()) {
      Log::create(["description" => $validator->errors()->toJson()]);
      return response()->json($request->validated());
    } else {
      ArtPiece::create($request->validated());
      return response()->json($artPiece, 201);
    }
  }
}
