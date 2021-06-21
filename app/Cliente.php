<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table ='clientes';
    protected $guarded = ['id'];

    static $rules = [
        'email' => 'required',
        'rfc' => 'required',
        'codpos' => 'required'
    ];
}
