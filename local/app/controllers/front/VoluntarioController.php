<?php

class VoluntarioController extends \BaseController {

    public function index()
    {

        return View::make('front.voluntario');
    }

    public function registrar()
    {
        $input = Input::all();
        $tipo = 'Voluntario';
        Personal::create([
            'nombres'    => $input['nombres'],
            'apellidos'  => $input['apellidos'],
            'personalID' => $input['ci'],
            'telefono'   => $input['telefono'],
            'email'	     =>	$input['email'],
            'tipoPersonal' => $tipo
        ]);
//        return View::make('front.login',$this->data);
        return Redirect::route('front.login')->with('success',"<strong>{$nombres}</strong> Voluntario adicionado");
    }
    public  function ajaxRegister()
    {

        if (Request::ajax())
        {
            $output =   [];
            $input  = Input::all();
            $data	=	[
                'nombres'    => $input['nombres'],
                'apellidos'  => $input['apellidos'],
                'ci'         => $input['ci'],
                'telefono'   => $input['telefono'],
                'email'	     =>	$input['email']
            ];
            //Reglas de los Campos de Email y Password
            $rules  =[
                'nombres'     => 'required',
                'apellidos'   => 'required',
                'ci'          => 'required|ci|unique:personal',
                'telefono'    => 'required',
                'email'	      => 'required|email'
            ];
            $validator	= Validator::make($input,$rules);
            //Verificacion previa de los campos, antes de la Autenticacion
            if($validator->fails())
            {
                $output['status'] = 'error';
                $output['msg']    =  $validator->getMessageBag()->toArray();
            }
            $data	=	[
                'nombres'   => $input['nombres'],
                'apellidos'   => $input['apellidos'],
                'ci'         => $input['ci'],
                'telefono'   => $input['telefono'],
                'email'	    =>	$input['email']
            ];

            Voluntario::create([
                'nombres'   => $input['nombres'],
                'apellidos'   => $input['apellidos'],
                'ci'   => $input['ci'],
                'telefono'   => $input['telefono'],
                'email'	    =>	$input['email']
            ]);
            $output = "Registrado exitosamente";
            return Response::json($output, 200);
        }
    }


}