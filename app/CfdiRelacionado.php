<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CfdiRelacionado extends Model
{
    use \App\Http\Traits\UsesUuid;

    protected $table = 'cfdis_relacionados';
    protected $guarded = ['id'];

}
