<?php


namespace App\Helpers;


use App\Cfdi;

class CfdiH
{
    //Metodo para Crear el registro de Cfdi
    public function create($data)
    {
        //Crea el registro de Cfdi
        $cfdi = Cfdi::create([
            'TipoDocumento'         => $data['TipoDocumento'],
            'UsoCFDI'               => $data['UsoCFDI'],
            'Serie'                 => $data['Serie'],
            'FormaPago'             => $data['FormaPago'],
            'MetodoPago'            => $data['MetodoPago'],
            'CondicionesDePago'     => $data['CondicionesDePago'] ?? null,
            'Moneda'                => $data['Moneda'] ?? null,
            'TipoCambio'            => $data['TipoCambio'] ?? null,
            'NumOrder'              => $data['NumOrder'] ?? null,
            'Fecha'                 => $data['Fecha'] ?? null,
            'Comentarios'           => $data['Comentarios'] ?? null,
            'Cuenta'                => $data['Cuenta'] ?? null,
            'EnviarCorreo'          => $data['EnviarCorreo'] ?? true,
            'LugarExpedicion'       => $data['LugarExpedicion'] ?? null,
        ]);

        //verifica si se creo exitosamente el registro
        if(!$cfdi)
            return General::responseRegisterError();

        //crea registros de receptor
        $receptorH = new ReceptorH();
        $validateReceptor = $receptorH->create($data,$cfdi);

        //valida que salio bien el registro
        if($validateReceptor)
            return $validateReceptor;

        //Se crean conceptos
        $conceptoH =new ConceptosH();
        $validateConcepto = $conceptoH->create($data,$cfdi);

        if($validateReceptor)
            return $validateReceptor;

        if(array_key_exists('CfdiRelacionados',$data))
        {
            $cfdiRelacionadoH = new CfdiRelacionadoH();
            $cfdiRelacionadoH->create($data['CfdiRelacionados'],$cfdi);
        }


    }

}
