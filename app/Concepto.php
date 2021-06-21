<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table = 'conceptos';
    protected $guarded = ['id'];

    static $rules = [
        'ClaveProdServ' => 'required',
        'Cantidad'      => 'required',
        'ClaveUnidad'   => 'required',
        'Unidad'        => 'required',
        'ValorUnitario' => 'required',
        'Descripcion'   => 'required',
    ];
}
