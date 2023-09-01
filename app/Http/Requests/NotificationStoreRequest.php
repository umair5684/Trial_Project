<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotificationStoreRequest extends FormRequest
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
            'user_id'=>['required','string'],
            'subject'=>['required','string','max:20'],
            'body'=>['required','string','max:265'],
            'notification_type' => 'required|in:email,dashboard',
            
        ];
    }
}
