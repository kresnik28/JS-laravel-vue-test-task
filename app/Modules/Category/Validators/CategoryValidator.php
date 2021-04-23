<?php

namespace App\Modules\Category\Validators;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CategoryValidator
 * @package App\Modules\Category\Validators
 */
class CategoryValidator extends FormRequest
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
            'name' => 'required|min:3|max:40',
            'description' => 'required|min:3"max:500',
            'items' => 'array'
        ];
    }
}
