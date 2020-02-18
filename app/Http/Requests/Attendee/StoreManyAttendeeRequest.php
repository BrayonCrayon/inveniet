<?php

namespace App\Http\Requests\Attendee;

use Illuminate\Foundation\Http\FormRequest;

class StoreManyAttendeeRequest extends FormRequest
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
            'userInvites' => 'required|array',
            'eventId' => 'required|exists:events,id'
        ];
    }
}
