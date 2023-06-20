<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DocumentStore extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string',Rule::unique('documents')->where(function ($query) {
                $query->whereNull('deleted_at');
            })],
            'file' => 'required|mimes:docx,pdf,pptx,csv,txt,xlsx',
            'category_id' => 'required',
            'visibility' => 'required',
        ];
    }
}
