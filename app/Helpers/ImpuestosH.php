<?php


namespace App\Helpers;


use App\Impuesto;

class ImpuestosH
{
    public function create($impuestos, $concepto)
    {

        //Itera impuestos
        foreach ($impuestos as $impuesto)
        {
            //Valida si es array
            if(!is_array($impuesto))
                $impuesto = (array)$impuesto;

            //valida Campos requeridos
            $validate = General::validateRequest($impuesto,Impuesto::$rules);

            //verifica si hay un error y si existe lo retorna
            if($validate)
                return $validate;

            //Crea el impuesto
            $impuestoCreate = Impuesto::create([
                'conceptoId' => $concepto->id,
            ]);

            $trasladosYretenidosH = new TrasladoYRetenidoH();

            //Verifica si hay traslados
            if(array_key_exists('Traslados',$impuesto))
                $trasladosYretenidosH->create($impuesto['Traslados'],$impuestoCreate,'traslado');//Crea traslados

            //Crea retenido
            if(array_key_exists('Retenidos',$impuesto))
                $trasladosYretenidosH->create($impuesto['Retenidos'],$impuestoCreate,'retenido');//Crea retenido

            //Crea locales
            $localesH = new LocalesH();
            $localesH->create($impuesto['Locales'],$impuesto);

        }

    }
}
