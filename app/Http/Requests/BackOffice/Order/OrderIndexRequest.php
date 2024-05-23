<?php

namespace App\Http\Requests\BackOffice\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderIndexRequest extends FormRequest
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
        return [
            'price_to'          => ['nullable', 'int'],
            'price_from'        => ['nullable', 'int'],
            'mobile'            => ['nullable', 'string'],
            'national_code'     => ['nullable', 'string'],
            'status'            => 'nullable|string|in:' . Order::IN_PROGRESS . ',' . Order::FINISHED . ',' . Order::CANCELED . ',' . Order::RETURNED ,


        ];
    }
}
