<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email', Rule::unique('users')->ignore(auth()->id()),
            'password' => ['sometimes|required', Password::min(12)->mixedCase()->numbers()->symbols()],
            'role' => 'sometimes|required',
            'address' => 'sometimes|required',
            'postal_code' => 'sometimes|required',
        ];
    }
}
