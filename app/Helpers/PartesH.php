<?php


namespace App\Helpers;


use App\Partes;

class PartesH
{
    public function create($partes,$concepto)
    {
        foreach ($partes as $parte)
        {
            //Valida si es array
            if(!is_array($parte))
                $parte = (array)$parte;

            //valida Campos requeridos
            $validate = General::validateRequest($parte,Partes::$rules);

            //verifica si hay un error y si existe lo retorna
            if($validate)
                return $validate;

            Partes::create([
                'ClaveProdServ'     => $parte['ClaveProdServ'],
                'NoIdentificacion'  => $parte['NoIdentificacion'] ?? null,
                'Cantidad'          => $parte['Cantidad'],
                'Unidad'            => $parte['Unidad'],
                'ValorUnitario'     => $parte['ValorUnitario'],
                'Descripcion'       => $parte['Descripcion'],
                'conceptoId'        =>$concepto->id,
            ]);
        }
    }
}
