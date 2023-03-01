<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

use Illuminate\Validation\Rule;



class MarkerCreateRequest extends FormRequest

{

    public function rules()

    {

        return [

            'name' => 'required|unique:markers',
            'description' => 'required',
            'lng'   =>    'required',
            'lat'   =>  'required',
            'author' => 'required'

        ];

    }



    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ], 401));

    }




}