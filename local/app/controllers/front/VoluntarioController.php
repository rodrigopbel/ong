<?php

class VoluntarioController extends \BaseController {

    public function index()
    {

        return View::make('front.voluntario');
    }

    public function store()
    {
        return "guardado exitoso";
    }
    public function registrar()
    {
//        dd("guardado  aaaa  exitoso");

        $input = Input::all();
//        dd($input);
        $tipo = 'voluntario';
        Personal::create([
            'nombres'    => $input['nombres'],
            'apellidos'  => $input['apellidos'],
            'personalID' => $input['ci'],
            'telefono'   => $input['telefono'],
            'email'	     =>	$input['email']
        ]);
        return Redirect::route('/');

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
                'ci'          => 'required',
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