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
		    Ayuda::select('ayudas.id','beneficiarios.beneficiarioID','apellidos','montoaporte','anonimo','porelMes','ayudas.porelAnio')
		      ->join('beneficiarios', 'ayudas.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
			  ->orderBy('ayudas.created_at','desc');

        return Datatables::of($result)
            ->add_column('Por el Mes',function($row) {
                return ucfirst($row->porelMes).' '.$row->porelAnio;
            })
            ->add_column('edit', '
                        <a  class="btn purple"  href="{{ route(\'admin.ayudas.edit\',$id)}}" ><i class="fa fa-edit"></i></a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $apellidos}}\',\'{{ $montoaporte }}\');return false;" class="btn red">
                        <i class="fa fa-trash"></i></a>')

            ->remove_column('porelAnio')
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
            'tipo_aporte'    => $input['tipo_aporte'],
            'aportanteID'    => $input['personalID'],
            'montoaporte'    => $input['montoaporte'],
            'anonimo'        => $input['anonimo'],
            'porelMes'       => $input['porelMes'],
            'porelAnio'      => $input['porelAnio']

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
//        dd($data);
        $ayuda->update([

            'beneficiarioID' => $data['beneficiarioID'],
            'tipo_aporte'    => $data['tipo_aporte'],
            'aportanteID'    => $data['personalID'],
            'montoaporte'    => $data['montoaporte'],
            'anonimo'        => $data['anonimo'],
            'porelMes'       => $data['porelMes'],
            'porelAnio'      => $data['porelAnio']
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

			return Response::json($output, 200);
		}else{
			throw(new Exception('Wrong request'));
		}

	}

}
