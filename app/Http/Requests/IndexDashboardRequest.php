<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexDashboardRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => ['numeric','exists:vender_types,id'],
            'category' => ['numeric','exists:categories,id'],
            'subCategory' => ['numeric','exists:categories,id'],
            'search' => ['string','max:100']
        ];
    }
}
