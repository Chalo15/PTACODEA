<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('excels.user', [
            'users' => User::where('role_id','!=','4')->where('role_id','!=','7')->get()
        ]);
    }
    /*public function headings(): array
    {
        return [
            'ID',
            'Rol',
            'Identificacion',
            'Nombre',
            'Apellidos',
            'Fecha de Nacimiento',
            'Teléfono',
            'Correo',
            'Provincia',
            'Ciudad',
            'Dirección',
            'Genero',
            'Numero de Contrato',
            'Años de Contrato',
            'Experiencia',
            'Verificacion de Email',
            'Foto',
            'Fecha Creación',
            'Ultima Actualización',
        ];
    }*/
}
