<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderCreateRequest extends Request
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
            'userId' => 'required|exists:users,id',
            'retailerId' => 'required|exists:retailers,id',
            'status' => 'required|in:accepted,rejected,cancelled,pending,shipped',
            'total' => 'required|integer'
        ];
    }
}
