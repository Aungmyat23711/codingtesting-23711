<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEmployeeRequest extends FormRequest
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
            'position_id' => ['required'],
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('employees')],
            'phone' => ['required', 'string', Rule::unique('employees')],
            'address' => ['required', 'string'],
            'dob' => ['required'],
            'photo' => ['required'],
            'work_histories.*.position' => ['required', 'string'],
            'work_histories.*.company' => ['required', 'string'],
            'work_histories.*.start_date' => ['required', 'string'],
            'work_histories.*.end_date' => ['required', 'string'],
            'educations.*.degree' => ['required', 'string'],
            'educations.*.school' => ['required', 'string'],
            'educations.*.start_date' => ['required', 'string'],
            'educations.*.end_date' => ['required', 'string'],
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'Validation Error',
            'errors' => $validator->errors(),
            'status_code' => 422
        ], 422));
    }
}
