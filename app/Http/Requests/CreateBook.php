<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBook extends FormRequest
{

    private $rules
        = [
            'title'        => 'required|min:1',
            'description'  => 'required|min:10',
            'num_of_pages' => 'required|numeric',
        ];

    private $cover = ['cover' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048'];

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
        if (request()->hasFile('cover')) {
            $result = array_merge($this->rules, $this->cover);
            return $result;
        }
        return $this->rules;
    }
}
