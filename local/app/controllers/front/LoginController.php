<?php

class LoginController extends \BaseController {


    public function __construct()
    {
        parent::__construct();
        $this->data['pageTitle']    =   'Pagina de Ingreso';
    }

	public function index()
	{
        if(Auth::personales()->check())
        {
            return Redirect::route('dashboard.index');
        }else
        {
            return View::make('front.login',$this->data);
        }
	}
    /**
     * @return mixed
     */
    public function ajaxLogin()
    {
        if (Request::ajax())
        {
            $output =   [];
            $input  = Input::all();
            $data	=	[
                'email'	    =>	$input['email'],
                'password'	=>	$input['password'],
	            'estado'    =>  'activo'
            ];
            //Reglas de los Campos de Email y Password
            $rules  =[
                'email'	    => 'required|email',
                'password'	=>	'required'
            ];
            $validator	= Validator::make($input,$rules);
            //Verificacion previa de los campos, antes de la Autenticacion
            if($validator->fails())
            {
                $output['status'] = 'error';
                $output['msg']    =  $validator->getMessageBag()->toArray();
            }
            $data	=	[
                'email'	    =>	$input['email'],
                'password'	=>	$input['password'],
                'estado'    =>  'activo'
            ];
            // Check if  exists in database with the credentials of not
            if (Auth::personales()->attempt($data))
            {
		            $event =  Event::fire('auth.login', Auth::personales()->get());
		            $output['status'] = 'success';
		            $output['msg']    = Lang::get('messages.loginSuccess');
	                return Response::json($output, 200);
            }

	        // For Blocked Users
	        $data['estado']         =   'inactive';
          if(Auth::personales()->validate($data))
            {
	            $output['status']	=	'error';
	            $output['msg']		=	['error'=>Lang::get('messages.loginBlocked')];
            }
            //Muestra el error existente al Autenticarse
            else
	        {
		        $output['status']	=	'error';
		        $output['msg']		=	['error'=>Lang::get('messages.loginInvalid')];
        }
            return Response::json($output, 200);
        }
    }
    public function logout()
    {
        Auth::personales()->logout();

        return Redirect::to('/');
    }

}