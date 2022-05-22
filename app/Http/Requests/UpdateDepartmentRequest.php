<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateDepartmentRequest extends FormRequest
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
            // 'name' => [Rule::unique('departments'), 'required', 'string']
        ];
    }
    public function failedValidation(Validator $validator)
    {
        // throw new HttpResponseException(response()->json([
        //     'status' => 'error',
        //     'message' => 'validation error',
        //     'error' => $validator->errors(),
        //     'status_code' => 422
        // ], 422));
    }
}
