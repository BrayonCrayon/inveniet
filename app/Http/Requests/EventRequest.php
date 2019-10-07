<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'rsvp_by' => 'required',
            'starts_at' => 'required',
            'ends_at' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is Required',
            'address.required' => 'Address is Required',
            'description.required' => 'Description is Required',
            'rsvp_by.required' => 'RSVP is Required',
            'starts_at.required' => 'Start Date Time required',
            'ends_at.required' => 'End Date Time required'
        ];
    }

    protected function prepareForValidation()
    {
        $input = array_map('trim', $this->all());

        if (isset($input['starts_at']) && $input['starts_at'] !== '') {
            $input['starts_at'] = Carbon::parse($input['starts_at']);
        }

        if (isset($input['rsvp_by']) && $input['rsvp_by'] !== '') {
            $input['rsvp_by'] = Carbon::parse($input['rsvp_by']);
        }

        if (isset($input['ends_at']) && $input['ends_at'] !== '') {
            $input['ends_at'] = Carbon::parse($input['ends_at']);
        }

        // Upon request 'repeated' will be either; null="Not Checked", on="Checked"
        $input['repeated_type_id'] = $this->get('repeated') === null ? null : $input['repeated_type_id'];
        $input['repeated'] = $this->get('repeated') === null ? false : true;

        $this->replace($input);
    }
}
