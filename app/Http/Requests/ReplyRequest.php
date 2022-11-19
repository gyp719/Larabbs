<?php

namespace App\Http\Requests;

use JetBrains\PhpStorm\ArrayShape;

class ReplyRequest extends Request
{
    #[ArrayShape(['content' => "string"])]
    public function rules(): array
    {
        return [
            'content' => 'required|min:2',
        ];
    }

    #[ArrayShape(['content.required' => "string", 'content.min' => "string"])]
    public function messages(): array
    {
        return [
            'content.required' => '内容不能为空',
            'content.min'      => '内容必须至少两个字符',
        ];
    }
}
