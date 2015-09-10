<?php

class VoluntarioController extends \BaseController {

    public function index()
    {

        return View::make('front.voluntario');
    }

    public function registrar()
    {
//        $validator = Validator::make($input = Input::all(), Voluntario::rules('create'));
//
//        if ($validator->fails())
//        {
//            return Redirect::back()->withErrors($validator)->withInput();
//        }
//
//        DB::beginTransaction();
//        try {
//            $nombres = $input['nombres'];
//            $tipo = 'Voluntario';
//
//            Voluntario::create([
//                'personalID'   => $input['ci'],
//                'nombres'      => ucwords(strtolower($input['nombres'])),
//                'apellidos'    => ucwords(strtolower($input['apellidos'])),
//                'email'         => $input['email'],
//                'telefono'  => $input['telefono'],
//                'tipoPersonal' => $tipo
//            ]);
//
//        }catch(\Exception $e)
//        {
//            DB::rollback();
//            throw $e;
//        }
//
//        DB::commit();
////
//        return Redirect::route('front.final')->with('success',"<strong>{$nombres}</strong> exitosamente adicionado en le base de datos");
////    }


        $input  = Input::all();
        $rules  =[
            'nombres'     => 'required',
            'apellidos'   => 'required',
            'ci'          => 'required|ci|unique:personal',
            'telefono'    => 'required',
            'email'	      => 'required|email'
        ];
        $validator	= Validator::make($input,$rules);
//        if($validator->fails())
//        {
//            $output['status'] = 'error';
//            $output['msg']    =  $validator->getMessageBag()->toArray();
//        }
        $tipo = 'Voluntario';
        Personal::create([
            'nombres'    => $input['nombres'],
            'apellidos'  => $input['apellidos'],
            'personalID' => $input['ci'],
            'telefono'   => $input['telefono'],
            'email'	     =>	$input['email'],
            'tipoPersonal' => $tipo
        ]);

        return View::make('front.final',$this->data);
    }

    
//    public  function ajaxRegister()
//    {
//
//        if (Request::ajax())
//        {
//            $output =   [];
//            $input  = Input::all();
//            $data	=	[
//                'nombres'    => $input['nombres'],
//                'apellidos'  => $input['apellidos'],
//                'ci'         => $input['ci'],
//                'telefono'   => $input['telefono'],
//                'email'	     =>	$input['email']
//            ];
//            //Reglas de los Campos de Email y Password
//            $rules  =[
//                'nombres'     => 'required',
//                'apellidos'   => 'required',
//                'ci'          => 'required|ci|unique:personal',
//                'telefono'    => 'required',
//                'email'	      => 'required|email'
//            ];
//            $validator	= Validator::make($input,$rules);
//            //Verificacion previa de los campos, antes de la Autenticacion
//            if($validator->fails())
//            {
//                $output['status'] = 'error';
//                $output['msg']    =  $validator->getMessageBag()->toArray();
//            }
//            $data	=	[
//                'nombres'   => $input['nombres'],
//                'apellidos'   => $input['apellidos'],
//                'ci'         => $input['ci'],
//                'telefono'   => $input['telefono'],
//                'email'	    =>	$input['email']
//            ];
//
//            Voluntario::create([
//                'nombres'   => $input['nombres'],
//                'apellidos'   => $input['apellidos'],
//                'ci'   => $input['ci'],
//                'telefono'   => $input['telefono'],
//                'email'	    =>	$input['email']
//            ]);
//            $output = "Registrado exitosamente";
//            return Response::json($output, 200);
//        }
//    }


}