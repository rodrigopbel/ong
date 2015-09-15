<?php

class AyudasController extends \AdminBaseController {


    public function __construct()
    {
        parent::__construct();
        $this->data['ayudasOpen'] ='active open';
        $this->data['pageTitle']  =  'Ayudas';
    }

    //    Display a listing of awards
    public function index()
	{
		$this->data['ayudas'] = Ayuda::all();

        $this->data['ayudasActive'] =   'active';

		return View::make('admin.ayudas.index', $this->data);
	}


    //Datatable ajax request
    public function ajax_ayudas()
    {

	    $result =
            Ayuda::select('ayudas.id','beneficiarios.apellidos','personal.nombres','requerimiento','nit','ayudas.gastos','numfactura','ayudas.created_at')
                ->join('beneficiarios', 'ayudas.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
                ->join('personal', 'ayudas.aportanteID', '=', 'personal.personalID')
                ->orderBy('ayudas.created_at','desc');


        return Datatables::of($result)

            ->add_column('edit', '
                        <a  class="btn purple"  href="{{ route(\'admin.ayudas.edit\',$id)}}" ><i class="fa fa-edit"></i></a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $apellidos}}\',\'{{ $requerimiento }}\');return false;" class="btn red">
                        <i class="fa fa-trash"></i></a>')

//            ->remove_column('created_at')
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

	/**
	 * Store a newly created award in storage.
	 */

	public function store()
	{
		$validator = Validator::make($input = Input::all(), Ayuda::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        Ayuda::create([
            'beneficiarioID' => $input['beneficiarioID'],
            'aportanteID'    => $input['personalID'],
            'requerimiento'  => $input['requerimiento'],
            'centroSalud'    => $input['centroSalud'],
            'nit'            => $input['nit'],
            'numfactura'     => $input['numfactura'],
            'gastos'         => $input['gastos']

        ]);

        $donacion = Donacion::where('aportanteID','=',$input['personalID'])->get()->first();
        Saldo::create([
            'donacionesID'  =>  $donacion->id,
            'ayudasID'      =>  $input['nit'],
            'donacion'      =>  $donacion->montodonacion,
            'ayuda'         =>  $input['gastos'],
            'saldo'         =>  $donacion->montodonacion - $input['gastos']
        ]);

		Activity::log([
			'contentId'   =>  $input['beneficiarioID'],
			'contentType' => 'Ayuda',
			'user_id'     => Auth::admin()->get()->id,
			'action'      => 'Create',
			'description' => 'Creacion '. $input['requerimiento'],
			'details'     => 'Usuario: '. Auth::admin()->get()->name,
			'updated'     => $input['beneficiarioID'] ? true : false
		]);


		return Redirect::route('admin.ayudas.index')->with('success',"<strong>Guardado</strong> Exitosamente");
	}



	/**
	 * Show the form for editing the specified award.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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

	/**
	 * Update the specified award in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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
			'action'      => 'Create',
			'description' => 'Actualizacion '. $data['beneficiarioID'],
			'details'     => 'Usuario: '. Auth::admin()->get()->name,
			'updated'     => $id ? true : false
		]);

		return Redirect::route('admin.ayudas.edit',$id)->with('success',"<strong>Actualizacion</strong> Exitosa");
	}

	/**
	 * Remove the specified award from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Request::ajax()) {
			Ayuda::destroy($id);
			$output['success'] = 'deleted';
			Activity::log([
				'contentId'   =>  $id,
				'contentType' => 'Ayuda',
				'user_id'     => Auth::admin()->get()->id,
				'action'      => 'Create',
				'description' => 'Eliminacion '. $id,
				'details'     => 'Usuario: '. Auth::admin()->get()->name,
				'updated'     => $id ? true : false
			]);
			return Response::json($output, 200);
		}else{
			throw(new Exception('Wrong request'));
		}

	}

}
