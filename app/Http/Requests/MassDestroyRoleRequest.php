<?php

namespace App\Http\Requests;

use App\Models\Role;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:roles,id',
        ];

    }
}
