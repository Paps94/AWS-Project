<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreArtPieceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
    * Our custom validation messages
    */
    public function messages()
    {
      return [
          'type.in' => 'Type can be \'physical\' or \'digital\' only',
      ];
    }
}
