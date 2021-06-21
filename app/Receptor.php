<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptor extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table ='receptor';
    protected $guarded = ['id'];

    static $rules = [
        'UID' => 'required',
    ];

}
