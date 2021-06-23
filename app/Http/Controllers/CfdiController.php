<?php

namespace App\Http\Controllers;

use App\Cfdi;
use App\Cliente;
use App\Helpers\CfdiH;
use App\Helpers\General;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CfdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cfdis = Cfdi::all();// Recupera todos los registros

        return General::responseSuccessWithParams(['cfdis' => $cfdis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valida si los campos requeridos estan
        $validate = General::validateRequest($request->all(),Cfdi::$rules);

        if($validate)
            return $validate;

        $data = $request->all();
        $cfdiH = new CfdiH();

        //Se manda al helper el registro
        $cfdi = $cfdiH->create($data);
        if($cfdi)
            return $cfdi;


        return  General::responseSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    //Cancela un registro
    public function cancel($id)
    {
        $cfdi = Cfdi::find($id);
        if(!$cfdi)
            return General::responseRegisterError();
        $cfdi->status = 'Cancelada';
        $cfdi->save();

        return General::responseSuccess();
    }

    //Todo quedo este metodo por hacer requiero un poco mas de contexto.
    public function sendCfdi($id)
    {

        $cfdi = Cfdi::find($id);
        if(!$cfdi)
            return General::responseRegisterError();

        $subject = "CFDI email";
        $email ='test@test.com';

        Mail::send('emails.generic', ['description' => $cfdi], function($message) use ($email , $subject){
            $message->to($email, 'GPM')->subject($subject);
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
