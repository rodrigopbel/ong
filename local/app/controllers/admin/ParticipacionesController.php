<?php
/*
 * Attendance Controller of Admin Panel
 */
class ParticipacionesController extends \AdminBaseController {


    public function __construct()
    {
        parent::__construct();
        $this->data['$participacionOpen'] ='active open';
        $this->data['pageTitle'] =      'Participaciones';
    }


/*
 * This is the view page of attendance.
 */
	public function index()
	{
		$this->data['actividades']          =   Actividad::all();
        $this->data['viewAttendanceActive'] =   'active';

        $this->data['date']     = date('Y-m-d');
        $this->data['participantes'] = Participacion::all();
        return View::make('admin.participaciones.index', $this->data);
	}


/*
 * This method is called when we mark the attendance and redirects to edit page.
 */
	public function create()
	{
            $date = (Input::get('date')!='')?Input::get('date'):date('Y-m-d');
            $attendance_count           = Attendance::where('date','=',$date)->count();
            $employee_count             = Employee::where('status','=','active')->count();

            if($employee_count  ==  $attendance_count)
            {
                if(!Session::get('success'))
                    Session::flash('success',"<strong>Attendance already marked</strong>");
            }else
            {
                Session::forget('success');
            }
                return Redirect::route('admin.attendances.edit',$date );
	}




	/**
	 * Display the specified attendance
	 */
	public function show($id)
    {
        $this->data['actividad']    = Actividad::find($id);
//        $date = (Input::get('date')!='')?Input::get('date'):date('Y-m-d');
//        $attendance_count           = Attendance::where('date','=',$date)->count();

        $this->data['voluntarios']     = Personal::where('tipoPersonal','=','Voluntario')->get();

        return View::make('admin.participaciones.edit',$this->data );
	}

	/**
	 * Show the form for editing the specified attendance.
	 */
	public function edit($id)
	{
        $this->data['actividad']    = Actividad::find($id);
//        $date = (Input::get('date')!='')?Input::get('date'):date('Y-m-d');
//        $attendance_count           = Attendance::where('date','=',$date)->count();

        $this->data['voluntarios']     = Personal::where('tipoPersonal','=','Voluntario')->get();
        return View::make('admin.participaciones.edit',$this->data );
	}

	/**
	 * Update the specified attendance in storage.
	 */


    public function store()
    {

        $input = Input::all();
//dd(Input::all());
        $vols = $input['checkbox'];
        foreach($vols as $index => $value)
        {
            echo "1";
                $volun = Personal::where('personalID','=',$index)->get;
                $participacion = new Participacion;
            echo "2";
                $participacion->actividadID  = $input['idActividad'];
                $participacion->voluntarioID = $index;
                $participacion->nombreVoluntario = $volun->nombres;
            echo "3";
                $participacion->telefonoVoluntario = $volun->telefono;
            echo "4";
                $participacion->save() ;
//            $participacion->voluntarioID  = (isset($input['checkbox'][$par])=='on')?$par:null;
        }
        return Redirect::route('admin.participaciones.index')->with('success',"<strong></strong> exitosamente adicionado en le base de datos");
//        dd("si se pudo");
    }
	/**
	 * Remove the specified attendance from storage.
	 */
	public function destroy($id)
	{

		Attendance::destroy($id);

		return Redirect::route('admin.attendances.index');
	}

}
