<?php

namespace App\Http\Requests\Feedbacks;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
    public function rules():array
    {
        return [
            "email" => "required|string|email",
            "phone" => "required|string|phone_number",
            "text"  => "required|string|max:65000",
        ];
    }


    /**
     * @return array
     */
    public function attributes():array
    {
        return [
            "email" => __('feedback.email'),
            "phone" => __('feedback.phone'),
            "text"  => __('feedback.text'),
        ];
    }
}
