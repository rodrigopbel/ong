<?php

class DonacionesController extends \AdminBaseController {

dd("aaaa");

    public function __construct()
    {

        parent::__construct();
        $this->data['donacionesOpen'] ='active open';
        $this->data['pageTitle']  =  'Donaciones';

    }

    //    Display a listing of awards
    public function index()
	{dd("joalskn");
		$this->data['donaciones'] = Donacion::all();
        $this->data['donacionesActive'] =   'active';
		return View::make('admin.donaciones.index', $this->data);
	}

    //Datatable ajax request
    public function ajax_donaciones()
    {

	    $result =
		    Ayuda::select('donaciones.id','personal.personalID','descripcion','montodonacion','donaciones.fechadon')
		      ->join('personal', 'donaciones.aportanteID', '=', 'personal.personalID')
			  ->orderBy('donaciones.created_at','desc');

        return Datatables::of($result)
//            ->add_column('Por el Mes',function($row) {
//                return ucfirst($row->porelMes).' '.$row->porelAnio;
//            })
//            ->add_column('edit', '
//                        <a  class="btn purple"  href="{{ route(\'admin.ayudas.edit\',$id)}}" ><i class="fa fa-edit"></i></a>
//                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $descripciondon}}\',\'{{ $montodonacion }}\');return false;" class="btn red">
//                        <i class="fa fa-trash"></i></a>')
//
//            ->remove_column('porelAnio')
//            ->make();
    }

	public function create()
	{
        $this->data['addDonacionesActive'] = 'active';
        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (IDP:", personalID,")") as nombres, personalID')
                                            ->where('tipoPersonal','=','aportante')
                                            ->lists('nombres','personalID');

		return View::make('admin.donaciones.create',$this->data);
	}

	/**
	 * Store a newly created award in storage.
	 */

	public function store()
	{
		$validator = Validator::make($input = Input::all(), Donacion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        Donacion::create([
            'aportanteID' => $input['beneficiarioID'],
            'descripcion'    => $input['tipo_aporte'],
            'montodonacion'    => $input['personalID'],
            'fechadon'      => $input['porelAnio']

        ]);

		return Redirect::route('admin.donaciones.index')->with('success',"<strong>Guardado</strong> Exitosamente");
	}



	/**
	 * Show the form for editing the specified award.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        $this->data['donacion']    = Donacion::find($id);
        $this->data['addDonacionesActive'] = 'active';
        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (ID:", personalID,")") as nombres, personalID')
                                    ->where('tipoPersonal','=','aportante')
                                    ->lists('nombres','personalID');
		return View::make('admin.donaciones.edit', $this->data);
	}

	/**
	 * Update the specified award in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$donacion = Donacion::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Donacion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $donacion->update([

            'beneficiarioID' => $data['beneficiarioID'],
            'tipo_aporte'    => $data['tipo_aporte'],
            'aportanteID'    => $data['personalID'],
            'montoaporte'    => $data['montoaporte'],
            'anonimo'        => $data['anonimo'],
            'porelMes'       => $data['porelMes'],
            'porelAnio'      => $data['porelAnio']
        ]);
		return Redirect::route('admin.donaciones.edit',$id)->with('success',"<strong>Actualizacion</strong> Exitosa");
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
			Donacion::destroy($id);
			$output['success'] = 'deleted';

			return Response::json($output, 200);
		}else{
			throw(new Exception('Wrong request'));
		}

	}

}
