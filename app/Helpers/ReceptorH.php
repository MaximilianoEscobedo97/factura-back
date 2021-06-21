<?php


namespace App\Helpers;


use App\Receptor;

class ReceptorH
{
    //Crea el registro de Receptor
    public function create($data,$cfdi)
    {


        // Itera el array de receptor
        foreach ($data['Receptor'] as $receptor)
        {
            //Valida si es array
            if(!is_array($receptor))
                $receptor = (array)$receptor;

            //valida Campos requeridos
            $validate = General::validateRequest($receptor,Receptor::$rules);

            //verifica si hay un error y si existe lo retorna
            if($validate)
                return $validate;

            //Crea registro
            Receptor::create([
                'UID'               => $receptor['UID'],
                'ResidenciaFiscal'  => $receptor['ResidenciaFiscal'],
                'cfdiId'            => $cfdi->id,
            ]);
        }
    }
}
