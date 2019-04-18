<?php

namespace App\Http\Requests\API;

use App\Models\Iprange;
use InfyOm\Generator\Request\APIRequest;

class UpdateIprangeAPIRequest extends APIRequest
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
        return Iprange::$rules;
    }
}
