<?php

namespace App\Http\Requests\News\Categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'Заголовок',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
