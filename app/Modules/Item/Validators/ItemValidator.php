<?php
namespace App\Modules\Item\Validators;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ItemValidator
 * @package App\Modules\Item\Validators
 */
class ItemValidator extends FormRequest
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
            'category_id' => 'required|numeric|exists:categories,id'
        ];
    }
}
