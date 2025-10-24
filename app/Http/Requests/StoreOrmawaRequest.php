<?php

namespace App\Http\Requests;
use App\Models\ormawa;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrmawaRequest extends FormRequest
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
            'name' => ['required','string', 'max:255','unique:'.ormawa::class],
            'logo'  => ['required', 'image', 'mimes:png,jpg,jpeg','max:2048'],
            'about' => ['required', 'string', 'max:65535'],
            'batas_pendaftaran' => 'nullable|date|after_or_equal:today',
        ];
    }
}
