<?php

class AyudasController extends \AdminBaseController {
    public function __construct()
    {
        parent::__construct();
        $this->data['ayudasOpen'] ='active open';
        $this->data['pageTitle']  =  'Ayudas';
    }
    public function index()
	{
		$this->data['ayudas'] = Ayuda::all();
        $this->data['ayudasActive'] =   'active';
		return View::make('admin.ayudas.index', $this->data);
	}
    public function ajax_ayudas()
    {
	    $result =
            Ayuda::select('ayudas.id','beneficiarios.apellidos','personal.nombres','requerimiento','ayudas.gastos','nit','numfactura','ayudas.created_at')
                ->join('beneficiarios', 'ayudas.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
                ->join('personal', 'ayudas.aportanteID', '=', 'personal.personalID')
                ->orderBy('ayudas.created_at','desc');
        return Datatables::of($result)
            ->add_column('edit', '
                        <a  class="btn purple"  href="{{ route(\'admin.ayudas.edit\',$id)}}" ><i class="fa fa-edit"></i></a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $apellidos}}\',\'{{ $requerimiento }}\');return false;" class="btn red">
                        <i class="fa fa-trash"></i></a>')
            ->make();
    }
	public function create()
	{
        $this->data['addAyudasActive'] = 'active';
        $this->data['beneficiarios'] = Beneficiario::selectRaw('CONCAT(apellidos, " (ID:", beneficiarioID,")") as apellidos, beneficiarioID')
	                                        ->where('status','=','activo')
	                                        ->lists('apellidos','beneficiarioID');
        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (IDP:", personalID,")") as nombres, personalID')
                                            ->where('tipoPersonal','=','aportante')
                                            ->lists('nombres','personalID');
		return View::make('admin.ayudas.create',$this->data);
	}
	public function store()
	{

		$validator = Validator::make($input = Input::all(), Ayuda::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
//        return Input::all();
        $aportante = Personal::where('personalID','=', $input['personalID'])->get()->first();
        $beneficiario = Beneficiario::where('beneficiarioID','=', $input['beneficiarioID'])->get()->first();
        Ayuda::create([
            'beneficiarioID' => $input['beneficiarioID'],
            'aportanteID'    => $input['personalID'],
            'nombreBeneficiario'    => $beneficiario->nombres ." " .$beneficiario->apellidos,
            'nombreAportante'    => $aportante->nombres ." ". $aportante->apellidos,
            'requerimiento'  => $input['requerimiento'],
            'centroSalud'    => $input['centroSalud'],
            'nit'            => $input['nit'],
            'numfactura'     => $input['numfactura'],
            'gastos'         => $input['gastos']
        ]);

        $donacion = Donacion::where('aportanteID','=',$input['personalID'])->get()->first();
        $aportante = Personal::where('personalID','=', $input['personalID'])->get()->first();

        $beneficiario = Beneficiario::where('beneficiarioID', '=', $input['beneficiarioID'])->get()->first();
//        return $donacion;
//        return ("hola a todos");

        $saldo = Saldo::where('donacionesID', '=', $donacion->id)->get()->last();
//        $saldo2 = Saldo::where('donacionesID', '=', $donacion->id)->get()->first();
//        return [$saldo, $saldo2];
//        return $saldo;
        if(!empty($saldo->saldo)){

            $saldo2 = $saldo->saldo - $input['gastos'];
            Saldo::create([
                'nombreBeneficiario' => $beneficiario->nombres . " " .$beneficiario->apellidos,
                'nombreAportante' => $aportante->nombres . " " .$aportante->apellidos,
                'donacionesID'  =>  $donacion->id,
                'ayudasID'      =>  $input['nit'],
                'donacion'      =>  $saldo->saldo,
                'ayuda'         =>  $input['gastos'],
                'saldo'         =>  $saldo2
            ]);
//            return "entro aca false";
        }

        if(empty($saldo->saldo)){

            $saldo2 = $donacion->montodonacion - $input['gastos'];
            Saldo::create([
                'nombreBeneficiario' => $beneficiario->nombres . " " .$beneficiario->apellidos,
                'nombreAportante' => $aportante->nombres . " " .$aportante->apellidos,
                'donacionesID'  =>  $donacion->id,
                'ayudasID'      =>  $input['nit'],
                'donacion'      =>  $donacion->montodonacion,
                'ayuda'         =>  $input['gastos'],
                'saldo'         =>  $saldo2
            ]);
//            return "entro aca true";
        }

//        Saldo::create([
//            'nombreBeneficiario' => $beneficiario->nombres . " " .$beneficiario->apellidos,
//            'donacionesID'  =>  $donacion->id,
//            'ayudasID'      =>  $input['nit'],
//            'donacion'      =>  $donacion->montodonacion,
//            'ayuda'         =>  $input['gastos'],
//            'saldo'         =>  $saldo2
//        ]);
//        return Input::all();

		Activity::log([
			'contentId'   =>  $input['beneficiarioID'],
			'contentType' => 'Ayuda',
			'user_id'     => Auth::admin()->get()->id,
			'action'      => 'Creacion',
			'description' => 'Creacion '. $input['requerimiento'],
			'details'     => 'Usuario: '. Auth::admin()->get()->name,
			'updated'     => $input['beneficiarioID'] ? true : false
		]);
		return Redirect::route('admin.ayudas.index')->with('success',"<strong>Guardado</strong> Exitosamente");
	}
	public function edit($id)
	{
        $this->data['ayuda']    = Ayuda::find($id);
        $this->data['addAyudasActive'] = 'active';
        $this->data['beneficiarios'] = Beneficiario::lists('apellidos','beneficiarioID');
        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (ID:", personalID,")") as nombres, personalID')
                                    ->where('tipoPersonal','=','aportante')
                                    ->lists('nombres','personalID');
		return View::make('admin.ayudas.edit', $this->data);
	}
	public function update($id)
	{
		$ayuda = Ayuda::findOrFail($id);
		$validator = Validator::make($data = Input::all(), Ayuda::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        $ayuda->update([
            'beneficiarioID' => $data['beneficiarioID'],
            'aportanteID'    => $data['personalID'],
            'requerimiento'  => $data['requerimiento'],
            'centroSalud'    => $data['centroSalud'],
            'nit'            => $data['nit'],
            'numfactura'     => $data['numfactura'],
            'gastos'         => $data['gastos']
        ]);
		Activity::log([
			'contentId'   =>  $id,
			'contentType' => 'Ayuda',
			'user_id'     => Auth::admin()->get()->id,
			'action'      => 'Actualizando',
			'description' => 'Actualizacion '. $data['beneficiarioID'],
			'details'     => 'Usuario: '. Auth::admin()->get()->name,
			'updated'     => $id ? true : false
		]);
		return Redirect::route('admin.ayudas.edit',$id)->with('success',"<strong>Actualizacion</strong> Exitosa");
	}
	public function destroy($id)
	{
		if (Request::ajax()) {
			Ayuda::destroy($id);
			$output['success'] = 'deleted';
			Activity::log([
				'contentId'   =>  $id,
				'contentType' => 'Ayuda',
				'user_id'     => Auth::admin()->get()->id,
				'action'      => 'Eliminacion',
				'description' => 'Eliminacion de ayudas '. $id,
				'details'     => 'Usuario: '. Auth::admin()->get()->name,
				'updated'     => $id ? true : false
			]);
			return Response::json($output, 200);
		}else{
			throw(new Exception('Wrong request'));
		}
	}
}
