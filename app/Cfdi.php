<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cfdi extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table = 'cfdis';
    protected $guarded = ['id'];

    static $rules = [
        'Receptor' => 'required',
        'TipoDocumento' => 'required',
        'Conceptos' => 'required',
        'UsoCFDI' => 'required',
        'Serie' => 'required',
        'FormaPago' => 'required',
        'MetodoPago' => 'required',
        'Moneda' => 'required',
    ];


}
