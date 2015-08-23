<?php

use Illuminate\Support\Facades\Auth;

class LoginController extends \BaseController {


    public function __construct()
    {
        parent::__construct();
        $this->data['pageTitle']    =   'Pagina de Ingreso';
    }

	public function index()
	{
        if(Auth::beneficiarios()->check())
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
	            'status'    =>  'active'
            ];
            if (Auth::attempt(array('email' => $input['email'], 'password' => $input['password'])))
            {
                return 'hola mundo';
            }
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
            // Check if employee exists in database with the credentials of not
//            if (Auth::beneficiarios()->attempt($data))
//            {
//		            $event =  Event::fire('auth.login', Auth::beneficiarios()->get());
//		            $output['status'] = 'success';
//		            $output['msg']    = Lang::get('messages.loginSuccess');
//	                return Response::json($output, 200);
//            }
            if (Auth::attempt($data))
            {
                $event =  Event::fire('auth.login', Auth::beneficiarios()->get());
                $output['status'] = 'success';
                $output['msg']    = Lang::get('messages.loginSuccess');
                return Response::json($output, 200);
            }
	        // For Blocked Users
	        $data['status']         =   'inactive';
          if(Auth::beneficiarios()->validate($data))
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
        Auth::beneficiarios()->logout();

        return Redirect::to('/');
    }

}