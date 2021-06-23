<?php


namespace App\Helpers;


use App\Impuesto;

class ImpuestosH
{
    public function create($impuestos, $concepto)
    {


            //Valida si es array
            if(!is_array($impuestos))
                $impuestos = (array)$impuestos;


            //valida Campos requeridos
            $validate = General::validateRequest($impuestos,Impuesto::$rules);

            //verifica si hay un error y si existe lo retorna
            if($validate)
                return $validate;

            //Crea el impuesto
            $impuestoCreate = Impuesto::create([
                'conceptoId' => $concepto->id,
            ]);



            $trasladosYretenidosH = new TrasladoYRetenidoH();

            //Verifica si hay traslados
            if(array_key_exists('Traslados',$impuestos))
                $trasladosYretenidosH->create($impuestos['Traslados'],$impuestoCreate,'traslado');//Crea traslados

            //Crea retenido
            if(array_key_exists('Retenidos',$impuestos))
                $trasladosYretenidosH->create($impuestos['Retenidos'],$impuestoCreate,'retenido');//Crea retenido

            //Crea locales
            $localesH = new LocalesH();
            if(array_key_exists('Locales',$impuestos))
            $localesH->create($impuestos['Locales'],$impuestos);



    }
}
