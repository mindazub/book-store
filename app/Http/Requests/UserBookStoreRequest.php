<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class UserBookStoreRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'title'=>'required|min:5|max:25|string|unique:companies',
            'description' => 'required|min:3|max:191|string',
            'cover' => 'nullable|image|min:1|max:2048|dimensions:min_width:100,max_width:3000',
            'price' => 'required|min:1|max:9999999|string',
            'discount' => 'integer|nullable'
        ];


    }

    /**
     * @return null|string
     */
    public function getTitle(): ? string
    {
        return $this->input('title');
    }

    /**
     * @return null|string
     */
    public function getDescription(): ? string
    {
        return $this->input('description');
    }

    /**
     * @return null|string
     */
    public function getPrice(): ? string
    {
        return $this->input('website');
    }

    /**
     * @return UploadedFile|null
     */
    public function getCover(): ? UploadedFile
    {
        return $this->file('cover');
    }
}
