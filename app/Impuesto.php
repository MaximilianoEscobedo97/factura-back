<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table = 'impuestos';
    protected $guarded = ['id'];

    static $rules = [
       // 'Traslados' => 'required',
        //'Retenidos' => 'required',
        //'Locales' => 'required'
    ];

}
