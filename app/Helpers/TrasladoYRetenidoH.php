<?php


namespace App\Helpers;


use App\TrasladoYRetenido;

class TrasladoYRetenidoH
{
    public function create($trasladosYretenidos,$impuesto,$tipo)
    {
        foreach ($trasladosYretenidos as $tyr)
        {
            //Valida si es array
            if(!is_array($tyr))
                $tyr = (array)$tyr;

            //valida Campos requeridos
            $validate = General::validateRequest($tyr,TrasladoYRetenido::$rules);

            //verifica si hay un error y si existe lo retorna
            if($validate)
                return $validate;
            //se crea el traslado
            TrasladoYRetenido::create([
                'Base'      => $tyr['Base'],
                'Impuesto'  => $tyr['Impuesto'],
                'TipoFactor'=> $tyr['TipoFactor'],
                'TasaOCuota'=> $tyr['TasaOCuota'],
                'Importe'   => $tyr['Importe'],
                'Tipo'      => $tipo,
                'ImpuestoId'=> $impuesto->id,
            ]);
        }
    }
}
