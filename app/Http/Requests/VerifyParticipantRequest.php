<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyParticipantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'peserta' => 'required|uuid|exists:participants,id',
            'status' => 'required|in:TERIMA,TOLAK',
            'catatan' => 'nullable|string',
            'alasan' => 'nullable|string|required_if:status,TOLAK',
        ];
    }

}