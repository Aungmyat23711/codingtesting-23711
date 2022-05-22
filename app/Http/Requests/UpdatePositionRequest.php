<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdatePositionRequest extends FormRequest
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
        // $department_id = $this->department_id;
        return [
            // 'name' => ['required', 'string', Rule::unique('positions')->where(function ($query) use ($department_id) {
            //     return $query->where('department_id', $department_id);
            // })],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        // throw new HttpResponseException(response()->json([
        //     'status' => 'error',
        //     'message' => 'Validation Error',
        //     'errors' => $validator->errors(),
        //     'status_code' => 422
        // ], 422));
    }
}
