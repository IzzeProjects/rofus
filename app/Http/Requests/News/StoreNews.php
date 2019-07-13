<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class StoreNews extends FormRequest
{
    public function attributes()
    {
        return [
            'title' => 'Заголовок',
            'text' => 'Текст',
            'category_id' => 'Категория'
        ];
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'text' => 'required',
            'category_id' => 'required',
        ];
    }
}
