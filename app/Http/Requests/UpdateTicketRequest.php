<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes','required','string','max:255'],
            'description' => ['sometimes','nullable','string'],
            'status' => ['sometimes','in:open,in_progress,closed'],
            'priority' => ['sometimes','in:low,medium,high'],
        ];
    }
}
