<?php


namespace App\Helpers;


use App\Locales;
use League\Flysystem\Adapter\Local;

class LocalesH
{
    public function create($locales,$impuesto)
    {

        foreach ($locales as $local)
        {
            //Valida si es array
            if(!is_array($local))
                $local = (array)$local;

            //valida Campos requeridos
            $validate = General::validateRequest($local,Locales::$rules);

            //verifica si hay un error y si existe lo retorna
            if($validate)
                return $validate;

            Local::create([
                'Impuesto'      => $local['Impuesto'],
                'TasaOCuota'    => $local['TasaOCuota'],
                'ImpuestoId'    => $impuesto->id
            ]);
        }
    }
}
