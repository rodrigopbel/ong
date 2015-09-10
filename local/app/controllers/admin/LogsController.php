<?php

class LogsController extends \AdminBaseController {


    public function __construct()
    {
        parent::__construct();
        $this->data['ayudasOpen'] ='active open';
        $this->data['pageTitle']  =  'Ayudas';
    }

    //    Display a listing of awards
    public function index()
	{
		$this->data['logs'] = Log::all();

        $this->data['logsActive'] =   'active';

		return View::make('admin.logs.index', $this->data);
	}


    //Datatable ajax request
    public function ajax_logs()
    {

	    $result =
		    Log::select('activity_log.id','activity_log.user_id','content_id','content_type','action','description','details','developer','ayudas.created_at')
		      ->from('activity_log')
			  ->orderBy('activity_log.created_at','desc');

        return Datatables::of($result)
            ->add_column('Por el Mes',function($row) {
                return ucfirst($row->created_at).' '.$row->created_at;
            })

            ->make();
    }

//	public function create()
//	{
//        $this->data['addAyudasActive'] = 'active';
//        $this->data['beneficiarios'] = Beneficiario::selectRaw('CONCAT(apellidos, " (ID:", beneficiarioID,")") as apellidos, beneficiarioID')
//	                                        ->where('status','=','activo')
//	                                        ->lists('apellidos','beneficiarioID');
//
//        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (IDP:", personalID,")") as nombres, personalID')
//                                            ->where('tipoPersonal','=','aportante')
//                                            ->lists('nombres','personalID');
//
//		return View::make('admin.ayudas.create',$this->data);
//	}

	/**
	 * Store a newly created award in storage.
	 */

//	public function store()
//	{
//		$validator = Validator::make($input = Input::all(), Ayuda::$rules);
//
//		if ($validator->fails())
//		{
//			return Redirect::back()->withErrors($validator)->withInput();
//		}
//
//        Ayuda::create([
//            'beneficiarioID' => $input['beneficiarioID'],
//            'aportanteID'    => $input['personalID'],
//            'requerimiento'  => $input['requerimiento'],
//            'centroSalud'    => $input['centroSalud'],
//            'nit'            => $input['nit'],
//            'numfactura'     => $input['numfactura'],
//            'gastos'         => $input['gastos']
//
//        ]);
//
//		Activity::log([
//			'contentId'   =>  $input['beneficiarioID'],
//			'contentType' => 'Ayuda',
//			'user_id'     => Auth::admin()->get()->id,
//			'action'      => 'Create',
//			'description' => 'Creacion '. $input['requerimiento'],
//			'details'     => 'Usuario: '. Auth::admin()->get()->name,
//			'updated'     => $input['beneficiarioID'] ? true : false
//		]);
//
//
//		return Redirect::route('admin.ayudas.index')->with('success',"<strong>Guardado</strong> Exitosamente");
//	}
//
//
//
//	/**
//	 * Show the form for editing the specified award.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function edit($id)
//	{
//
//        $this->data['ayuda']    = Ayuda::find($id);
//        $this->data['addAyudasActive'] = 'active';
//        $this->data['beneficiarios'] = Beneficiario::lists('apellidos','beneficiarioID');
//        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (ID:", personalID,")") as nombres, personalID')
//                                    ->where('tipoPersonal','=','aportante')
//                                    ->lists('nombres','personalID');
//		return View::make('admin.ayudas.edit', $this->data);
//	}
//
//	/**
//	 * Update the specified award in storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
//	public function update($id)
//	{
//		$ayuda = Ayuda::findOrFail($id);
//
//		$validator = Validator::make($data = Input::all(), Ayuda::$rules);
//
//		if ($validator->fails())
//		{
//			return Redirect::back()->withErrors($validator)->withInput();
//		}
//
//        $ayuda->update([
//
//            'beneficiarioID' => $data['beneficiarioID'],
//            'aportanteID'    => $data['personalID'],
//            'requerimiento'  => $data['requerimiento'],
//            'centroSalud'    => $data['centroSalud'],
//            'nit'            => $data['nit'],
//            'numfactura'     => $data['numfactura'],
//            'gastos'         => $data['gastos']
//        ]);
//
//		Activity::log([
//			'contentId'   =>  $id,
//			'contentType' => 'Ayuda',
//			'user_id'     => Auth::admin()->get()->id,
//			'action'      => 'Create',
//			'description' => 'Actualizacion '. $data['beneficiarioID'],
//			'details'     => 'Usuario: '. Auth::admin()->get()->name,
//			'updated'     => $id ? true : false
//		]);
//
//		return Redirect::route('admin.ayudas.edit',$id)->with('success',"<strong>Actualizacion</strong> Exitosa");
//	}
//
//	/**
//	 * Remove the specified award from storage.
//	 *
//	 * @param  int  $id
//	 * @return Response
//	 */
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