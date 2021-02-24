<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
    public function rules()
    {
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'name' => 'required|unique:articles',
                    'body' => 'required|min:100'
                ];
            }
            case 'PATCH':
            {
                return [
                    'name' => 'required|unique:articles,name,' . $this->route('id'),
                    'body' => 'required|min:100'
                ];
            }
            default: 
            {
                break;
            }
        }
    
    }
}
