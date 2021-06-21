<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partes extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table = 'partes';
    protected $guarded = ['id'];

    static $rules = [
        'ClaveProdServ' => 'required',
        'Cantidad'      => 'required',
        'Unidad'        => 'required',
        'ValorUnitario' => 'required',
        'Descripcion'   => 'required',
    ];
}
