<?php


namespace App\Helpers;


use App\Concepto;

class ConceptosH
{
    public function create($data,$cfdi)
    {
        //Itera los conceptos
        foreach ($data['Conceptos'] as $concepto)
        {
            //Valida si es array
            if(!is_array($concepto))
                $concepto = (array)$concepto;

            //valida Campos requeridos
            $validate = General::validateRequest($concepto,Concepto::$rules);

            //verifica si hay un error y si existe lo retorna
            if($validate)
                return $validate;

            //Crea el registro
           $conceptoCreado = Concepto::create([
                'ClaveProdServ'      => $concepto['ClaveProdServ'],
                'NoIdentificacion'   => $concepto['NoIdentificacion'] ?? null,
                'Cantidad'           => $concepto['Cantidad'],
                'ClaveUnidad'        => $concepto['ClaveUnidad'],
                'Unidad'             => $concepto['Unidad'],
                'ValorUnitario'      => $concepto['ValorUnitario'],
                'Descripcion'        => $concepto['Descripcion'],
                'Descuento'          => $concepto['Descuento'] ?? null,
                'NumeroPedimento'    => $concepto['NumeroPedimento'] ?? null,
                'Predial'            => $concepto['Predial'] ?? null,
                'cfdiId'             => $cfdi->id,
            ]);

            //verifica si hay registros de impuestos
            if(array_key_exists('Impuestos',$concepto))
            {
                $impuestosH = new ImpuestosH();
                $impuestosH->create($concepto['Impuestos'],$concepto);
            }

            //Verifica si hay registros de partes
            if(array_key_exists('Partes',$concepto))
            {
                $partesH = new PartesH();
                $partesH->create($concepto['Partes'],$concepto);
            }


        }
    }

}
