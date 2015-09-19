<?php
class ParticipacionesController extends \AdminBaseController {
    public function __construct()
    {
        parent::__construct();
        $this->data['$participacionOpen'] ='active open';
        $this->data['pageTitle'] =      'Participaciones';
    }
	public function index()
	{
		$this->data['actividades']          =   Actividad::all();
        $this->data['viewAttendanceActive'] =   'active';
        $this->data['date']     = date('Y-m-d');
        $this->data['participantes'] = Participacion::all();
        return View::make('admin.participaciones.index', $this->data);
	}
    public function show($id)
    {
        $this->data['participantes']  =  Participacion::where('actividadID','=',$id)
                                    ->join('actividades','participaciones.actividadID','=','actividades.id')
                                    ->join('personal','participaciones.voluntarioID','=','personal.personalID')
                                    ->select('actividades.descripcion','personal.nombres','email','telefono')
                                      ->get();
        return View::make('admin.participaciones.show', $this->data);
    }

	public function edit($id)
	{
        $this->data['actividad']    = Actividad::find($id);
        $this->data['voluntarios']     = Personal::where('tipoPersonal','=','Voluntario')->get();
        return View::make('admin.participaciones.edit',$this->data );
	}
    public function store()
    {
        $input = Input::all();
        $vols = $input['checkbox'];
        foreach($vols as $index => $value)
        {
                $participacion = new Participacion;
                $participacion->actividadID  = $input['idActividad'];
                $participacion->voluntarioID = $index;
                $participacion->save() ;
        }
        return Redirect::route('admin.participaciones.index')->with('success',"<strong></strong> exitosamente adicionado en le base de datos");
    }
}
