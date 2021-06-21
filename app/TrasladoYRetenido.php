<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrasladoYRetenido extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table='traslados_y_retenidos';
    protected $guarded = ['id'];

    static $rules = [
        'Base' => 'required',
        'Impuesto'      => 'required',
        'TipoFactor'   => 'required',
        'TasaOCuota'        => 'required',
        'Importe' => 'required',
    ];

}
