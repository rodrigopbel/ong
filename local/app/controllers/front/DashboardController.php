<?php

class DashboardController extends \BaseController {

	public function __construct()
    {
        parent::__construct();
        $this->data['pageTitle']   =   'Dashboard';
        $this->data['personalID']  =   Auth::personales()->get()->personalID;
	    $this->data['personal']        =    Personal::find(Auth::personales()->get()->id);
        $this->data['donaciones']      =    Donacion::where('aportanteID', '=', Auth::personales()->get()->personalID)->get();
        $this->data['ayudas']          =    Ayuda::where('aportanteID', '=', Auth::personales()->get()->personalID)->get();
        $beneficiario   =    Ayuda::where('aportanteID', '=', Auth::personales()->get()->personalID)->select('beneficiarioID')->get();
        $ben = json_decode($beneficiario);
        $this->data['beneficiarios']      =    Beneficiario::where('beneficiarioID','=',$ben[0]->beneficiarioID)->get();
        $this->data['ingresoTotal'] = 0;
        $this->data['egresoTotal'] = 0;
        foreach($this->data['ayudas'] as $ayuda)
        {
            $this->data['egresoTotal'] = $this->data['egresoTotal'] + $ayuda->gastos;
        }
        foreach($this->data['donaciones'] as $donacion)
        {
            $this->data['ingresoTotal'] = $this->data['ingresoTotal'] + $donacion->montodonacion;
        }
        $this->data['saldo'] = $this->data['ingresoTotal']- $this->data['egresoTotal'];
    }
	public function index()
	{

        $this->data['homeActive']         =    'active';
        $this->data['donacion_color']      = ['info','error','success','pending',''];
        $this->data['donacion_font_color'] = ['blue','red','green','yellow','dark'];
        return View::make('front.personalDashboard',$this->data);
	}



	public  function changePasswordModal()
	{
		return View::make('front.change_password_modal',$this->data);
	}


    public function change_password()
    {

        $validator = Validator::make($input = Input::all(), Employee::rules('password'));

        if ($validator->fails())
        {
            $output['status']   =   'error';
            $output['msg']      =   $validator->getMessageBag()->toArray();

        }else{

            $employee = Employee::find(Auth::personales()->get()->id);
            $employee->password =   Hash::make($input['password']);
            $employee->save();
            //        Send change password email
            Mail::send('emails.changePassword', $this->data, function($message)
            {
                $message->from($this->data['setting']->email, $this->data['setting']->name);

                $message->to(Auth::personales()->get()->email, Auth::personales()->get()->fullName)
                    ->subject('Change Password - '.$this->data['setting']->website);
            });

            $output['status']   =   'success';
            $output['msg']      =   '<strong>Success ! </strong>Password changed successfully';
        }


        return Response::json($output,200);


    }





}