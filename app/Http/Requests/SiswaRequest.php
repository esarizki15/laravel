<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Telepon;
class SiswaRequest extends Request
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
        //Cek apakah Create atau update
        if ($this->method() == 'PATCH') {
            $nisn_rules = 'required|string|size:4|unique:siswa,nisn,' . $this->get('id');
            $telepon_rules = 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon,' . $this->get('id') . ',id_siswa';
            }
        }else{
            $nisn_rules = 'required|string|size:4|unique:siswa,nisn';
            $telepon_rules = 'sometimes|numeric|digits_between:10,15|unique:telepon,nomor_telepon';
        }

        return [
            'nisn' => $nisn_rules,
            'nama_siswa' => 'required|string|max:30',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_telepon' => $telepon_rules,
            'id_kelas' => 'required',
            'foto' => 'sometimes|image|max:2048|mimes:jpeg,jpg,bmp,png',
        ];
    }
}
