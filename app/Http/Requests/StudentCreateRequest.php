<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            //
            'nis' => 'unique:students|max:8',//validasi jika ada nis yg sama dan yg melebihi 8 karakter
            'name' => 'max:50'
        ];
    }

    public function attributes()
    {
        return [
            'nis' => 'NIS'//mengubah kata dari notif default
        ];
    }
    public function messages()
    {
        return [
            'nis.unique' => 'NIS yang anda masukan sudah ada!',
            'nis.max' => 'Maksimal karakter untuk NIS adalah :max'
        ];
    }
}
