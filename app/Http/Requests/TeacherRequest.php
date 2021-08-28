<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
        switch ($this->getMethod()) {
            // handle creates
            case 'post':
            case 'POST':
                return $this->creationRules();

            // Handle updates
            case 'patch':
            case 'PATCH':
                return $this->updateRules();

            // handle deletions
            case 'delete':
            case 'DELETE':
                return $this->deleteRules();
        }
        // return empty array for other requests
        return [
            //
        ];
    }

    public static function creationRules($key = null)
    {

        $creation_rules = [
            'name_ar' => ['required', 'string', 'min:2'],
            'name_en' => ['required', 'string', 'min:2'],
            'address' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:teachers,email,' . request()->id],
            'password' => ['required', 'string', 'min:6'],
            'specialization_id' => ['required', 'uuid', 'exists:specializations,id'],
            'gender_id' => ['required', 'uuid', 'exists:genders,id'],
            'joining_at' => ['required', 'date', 'date_format:Y-m-d'],

        ];

        return $key ? $creation_rules[$key] : $creation_rules;

    }

    public static function updateRules($key = null)
    {
        $update_rules = [
            'name_ar' => ['string', 'min:2'],
            'name_en' => ['string', 'min:2'],
            'address' => ['string', 'min:3'],
            'email' => ['email', 'unique:teachers,email,' . request()->id],
            'password' => ['string', 'min:6'],
            'specialization_id' => ['uuid', 'exists:specializations,id'],
            'gender_id' => ['uuid', 'exists:genders,id'],
            'joining_at' => ['date', 'date_format:Y-m-d'],
        ];

        return $key ? $update_rules[$key] : $update_rules;

    }

    public static function deleteRules($key = null)
    {
        $delete_rules = [

        ];

        return $key ? $delete_rules[$key] : $delete_rules;

    }
}
