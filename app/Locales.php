<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locales extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table = 'locales';
    protected $guarded= ['id'];

    static $rules = [
        'Impuesto' => 'required',
        'TasaOCuota' => 'required',
    ];
}
