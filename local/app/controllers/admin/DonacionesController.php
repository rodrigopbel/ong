<?php

class DonacionesController extends \AdminBaseController {

    public function __construct()
    {
        parent::__construct();
        $this->data['donacionesOpen'] ='active open';
        $this->data['pageTitle']  =  'Donaciones';
    }
    public function index()
	{
		$this->data['donaciones'] = Donacion::all();
        $this->data['donacionesActive'] =   'active';
//        return $this->data['donaciones'];
		return View::make('admin.donaciones.index', $this->data);
	}
    public function ajax_donaciones()
    {
        $result =
            Donacion::select('donaciones.id',DB::raw('CONCAT(personal.nombres, personal.apellidos) AS nombre_aportante'),'montodonacion',DB::raw('CONCAT(beneficiarios.nombres," ", beneficiarios.apellidos)'),'donaciones.created_at','descripcion')
                ->join('personal', 'donaciones.aportanteID', '=', 'personal.personalID')
                ->join('beneficiarios', 'donaciones.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
                ->orderBy('donaciones.created_at','desc');
        return Datatables::of($result)
            ->add_column('edit', '
                        <a  class="btn purple"  href="{{ route(\'admin.donaciones.edit\',$id)}}" ><i class="fa fa-edit"></i></a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $descripcion}}\',\'{{ $montodonacion }}\');return false;" class="btn red">
                        <i class="fa fa-trash"></i></a>')
            ->make();
    }
	public function create()
	{
        $this->data['addDonacionesActive'] = 'active';
        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (IDP:", personalID,")") as nombres, personalID')
                                            ->where('tipoPersonal','=','aportante')
                                            ->lists('nombres','personalID');
        $this->data['beneficiarios'] = Beneficiario::selectRaw('CONCAT(apellidos, " (ID:", beneficiarioID,")") as apellidos, beneficiarioID')
            ->where('status','=','activo')
            ->lists('apellidos','beneficiarioID');
		return View::make('admin.donaciones.create',$this->data);
	}
	public function store()
	{
		$validator = Validator::make($input = Input::all(), Donacion::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        $aportante = Personal::where('personalID','=', $input['personalID'])->get()->first();
        $beneficiario = Beneficiario::where('beneficiarioID','=', $input['beneficiarioID'])->get()->first();
        Donacion::create([
            'aportanteID'    => $input['personalID'],
            'nombreAportante'    => $aportante->nombres ." " .$aportante->apellidos,
            'nombreBeneficiario'    => $beneficiario->nombres ." " .$beneficiario->apellidos,
            'beneficiarioID' => $input['beneficiarioID'],
            'descripcion'    => $input['descripcion'],
            'montodonacion'  => $input['montodonacion']
        ]);
		Activity::log([
			'contentId'   => $input['personalID'],
			'contentType' => 'Donacion',
			'user_id'     => Auth::admin()->get()->id,
			'action'      => 'Create',
			'description' => 'Creacion '. $input['descripcion'],
			'details'     => 'Usuario: '. Auth::admin()->get()->name,
			'updated'     => $input['personalID'] ? true : false
		]);
		return Redirect::route('admin.donaciones.index')->with('success',"<strong>Guardado</strong> Exitosamente");
	}
	public function edit($id)
	{
        $this->data['donacion']    = Donacion::find($id);
        $this->data['addDonacionesActive'] = 'active';
        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (ID:", personalID,")") as nombres, personalID')
                                    ->where('tipoPersonal','=','aportante')
                                    ->lists('nombres','personalID');
        $this->data['beneficiarios'] = Beneficiario::selectRaw('CONCAT(apellidos, " (ID:", beneficiarioID,")") as apellidos, beneficiarioID')
                                    ->where('status','=','activo')
                                    ->lists('apellidos','beneficiarioID');
		return View::make('admin.donaciones.edit', $this->data);
	}
	public function update($id)
	{
		$donacion = Donacion::findOrFail($id);
		$validator = Validator::make($data = Input::all(), Donacion::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        $donacion->update([
            'aportanteID'        => $data['personalID'],
            'descripcion'        => $data['descripcion'],
            'montodonacion'      => $data['montodonacion']
        ]);
		Activity::log([
			'contentId'   => $data['personalID'],
			'contentType' => 'Donacion',
			'user_id'     => Auth::admin()->get()->id,
			'action'      => 'Update',
			'description' => 'Creacion '. $data['descripcion'],
			'details'     => 'Usuario: '. Auth::admin()->get()->name,
			'updated'     => $data['personalID'] ? true : false
		]);
		return Redirect::route('admin.donaciones.edit',$id)->with('success',"<strong>Actualizacion</strong> Exitosa!");
	}
	public function destroy($id)
	{
		if (Request::ajax()) {
			Donacion::destroy($id);
			$output['success'] = 'deleted';
			Activity::log([
				'contentId'   => $id,
				'contentType' => 'Donacion',
				'user_id'     => Auth::admin()->get()->id,
				'action'      => 'Update',
				'description' => 'Eliminacion de Donacion '. $id,
				'details'     => 'Usuario: '. Auth::admin()->get()->name,
				'updated'     => $id ? true : false
			]);
			return Response::json($output, 200);
		}else{
			throw(new Exception('Wrong request'));
		}
	}
}
