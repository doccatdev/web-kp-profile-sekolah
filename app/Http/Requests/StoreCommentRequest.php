<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'news_id'    => ['required', 'exists:news,id'],
        'parent_id'  => ['nullable', 'exists:comments,id'],
        'body'       => ['required', 'string', 'max:500'],
        // Buat selalu tervalidasi agar data tidak dibuang oleh Laravel
        //'guest_name' => ['required', 'string', 'max:50'],
        //'guest_mail' => ['required', 'email', 'max:75'],
    ];
    if (!auth()->check())
    {
        $rules['guest_name'] = ['required','string','max:50'];
        $rules['guest_mail'] = ['required','mail','max:75'];

    }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'guest_name.required' => "Masukkan nama Anda",
            'guest_mail.required' => "Masukkan email Anda",
        ];
    }
}
