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

//        dd('Start Request');
        return [
            'title'=>'required',
            'description' => 'required',
            'cover' => 'required',
            'price' => 'required',
            'discount' => 'required',
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
        return $this->input('price');
    }

    /**
     * @return null|string
     */
    public function getDiscount(): ? string
    {
        return $this->input('discount');
    }

    /**
     * @return UploadedFile|null
     */
    public function getCover(): ? UploadedFile
    {
        return $this->file('cover');
    }
}
