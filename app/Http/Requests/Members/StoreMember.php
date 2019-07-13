<?php

namespace App\Http\Requests\Members;

use Illuminate\Foundation\Http\FormRequest;

class StoreMember extends FormRequest
{
    public function attributes()
    {
        return [
            'first_name' => 'Имя',
            'surname' => 'Фамилия',
            'image' => 'Изображение',
        ];
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'surname' => 'required',
            'image' => 'required',
        ];
    }
}
