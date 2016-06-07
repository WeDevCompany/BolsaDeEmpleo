<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OfferEditRequest extends Request
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
            'title'         => 'required|regex:/^[a-zA-ZñÑÁÉÍÓÚáéíóú ]+$/|between:1,45',
            'duration'      => 'required|in:' . implode(config('select.duration'), ','),
            'level'         => 'required|in:' . implode(config('select.level'), ','),
            'experience'    => 'required|in:' . implode(config('select.experience'), ','),
            'kind'          => 'required|in:' . implode(config('select.kind'), ','),
            'name'          => 'required|exists:profFamilies,name',
            'wanted'        => 'required|integer',
            'description'   => 'required',
            'tagCount'      => 'required|exists:tags,tag',
        ];
    }
}
