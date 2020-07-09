<?php

namespace App\Http\Requests;

use App\Models\Redirect;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RedirectRequest extends FormRequest
{
    public function rules()
    {
        return [
            'url' => ['required', 'url'],
            'redirect' => ['required', Rule::unique(Redirect::class, 'code')],
            'is_active' => ['boolean'],
        ];
    }
}
