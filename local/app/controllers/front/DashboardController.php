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

//	show leave Page
	public function leave()
	{
        $this->data['leaveActive'] =    'active';

//        $this->data['attendance']         = Attendance::where('employeeID', '=',  $this->data['employeeID'] )->get();

        return View::make('front.leave',$this->data);
	}


	public function  notice_ajax($id)
	{
        $notice                   =    Noticeboard::find($id);
        $output['title']          =   $notice->title;
        $output['description']    =   $notice->description;

        return Response::json($output,200);
	}

    //	Submitting the leave request from Employee
	public function leave_store()
    {

        $input = Input::all();

        if ($input['date'][0] == '') {
            Session::flash('error_leave', ['<strong>Error!</strong> Please select the date']);
            return Redirect::route('front.leave');
        }

        foreach ($input['date'] as $index => $value) {
            if (empty($value)) continue;
            try {

                Attendance::create([
                    'employeeID' => $this->data['employeeID'],
                    'date' => date('Y-m-d', strtotime($value)),
                    'status' => 'absent',
                    'leaveType' => $input['leaveType'][$index],
                    'halfDayType' => ($input['leaveType'][$index]=='half day')?$input['halfleaveType'][$index]:null,
                    'reason' =>   $input['reason'][$index],
                    'application_status' => 'pending',
                    'applied_on' => date('Y-m-d', time())
                ]);

                $this->data['dates'][$index] = date('d-M-Y', strtotime($value));
                $this->data['leaveType'][$index] = $input['leaveType'][$index];
                $this->data['reason'][$index] = $input['reason'][$index];

            } catch (Exception $e) {

                Session::flash('error_leave', ['<strong>Error!</strong> You have already applied leave for the particular date']);
                return Redirect::route('front.leave');
            }

        }

//        Send email to all admins
        $admins = Admin::select('email')->get()->toArray();
        foreach ($admins as $admin){
            Mail::send('emails.leave_request', $this->data, function ($message) use ($admin) {
                $message->from(Auth::personales()->get()->email, Auth::personales()->get()->fullName);
                $message->to($admin['email'])
                    ->subject('Leave Request - ' . $this->data['setting']->website);
            });
        }
        Session::flash('success_leave','<strong>Success!</strong> Leave request is send to the HR Manger.You will be notified soon.');
        return Redirect::route('front.leave');


    }


    //Datatable ajax request
    public function ajaxApplications()
    {

        $result = Attendance::select('id','date','leaveType','reason','applied_on','application_status','halfDayType')
            ->where('employeeID','=',$this->data['employeeID'])
            ->whereNotNull('application_status')
            ->orderBy('applied_on','desc');

        return Datatables::of($result)
            ->edit_column('date',function($row){
                return date('d-M-Y',strtotime($row->date));
            })
            ->edit_column('applied_on',function($row){
                return date('d-M-Y',strtotime($row->applied_on));
            })
	        ->edit_column('leaveType',function($row){
		        $leave = ($row->leaveType=='half day')?$row->leaveType.'-'.$row->halfDayType:$row->leaveType;
		        return $leave;
	        })
            ->edit_column('reason',function($row){
	            return    strip_tags(Str::limit($row->reason,50));

            })
            ->edit_column('application_status',function($row)
            {
                $color = [
                    'pending'   =>  'warning',
                    'approved'  =>  'success',
                    'rejected'  =>  'danger'
                ];

                return "<span class='label label-{$color[$row->application_status]}'>{$row->application_status}</span>";
            })
	        ->remove_column('halfDayType')
            ->add_column('edit', '
                        <button  class="btn-u btn-u-blue" data-toggle="modal" data-target=".show_notice" onclick="show_application({{ $id }});return false;" ><i class="fa fa-eye"></i> View</button>
                         ')
            ->make();
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

// Ajax leave application view show
    public function show($id)
    {

        $this->data['leave_application']    =   Attendance::find($id);
       return View::make('front.leave_modal_show',$this->data);
    }



}