<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class workCenterCreateRequest extends Request
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
            'nameWorkCenter'    => 'required|between:2,200|regex:/^[A-Za-z0-9 ]+$/|unique:workCenters,name',
            'emailContact'      => 'required|between:2,75|email',
            'phone1'            => 'required|digits_between:9,13',
            'phone2'            => 'digits_between:9,13',
            'road'              => 'required|in:'.$roads,
            'address'           => 'required|between:6,225',
            'state'             => 'required|exists:states,id',
            'citie'             => 'required|exists:cities,id',
        ];
    }
}
