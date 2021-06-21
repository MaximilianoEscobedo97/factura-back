<?php


namespace App\Helpers;


use App\CfdiRelacionado;

class CfdiRelacionadoH
{
    public function create($cfdiRelacionados,$cfdi)
    {
        if(!is_array($cfdiRelacionados))
            $$cfdiRelacionados = (array)$cfdiRelacionados;

        foreach ($cfdiRelacionados as $cfdiRelacionado)
        {
            if(!is_array($cfdiRelacionado))
                $$cfdiRelacionado = (array)$cfdiRelacionado;

            foreach ($cfdiRelacionados['UUID'] as $uuid)
            {
                CfdiRelacionado::create([
                    'TipoRelacion'  => $cfdiRelacionados['TipoRelacion'],
                    'UUID'          => $cfdiRelacionado['UUID'],
                    'cfdiId'        => $cfdi->id,
                ]);
            }
        }
    }
}
