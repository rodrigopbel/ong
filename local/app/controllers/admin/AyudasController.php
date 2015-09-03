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
            ->add_column('For Month',function($row) {
                return ucfirst($row->porelMes).' '.$row->porelAnio;
            })
            ->add_column('edit', '
                        <a  class="btn purple"  href="{{ route(\'admin.ayudas.edit\',$id)}}" ><i class="fa fa-edit"></i> View/Edit</a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $tipo_aporte}}\',\'{{ $montoaporte }}\');return false;" class="btn red">
                        <i class="fa fa-trash"></i> Borrar</a>')

            ->remove_column('porelAnio')



            ->make();
    }

	public function create()
	{
        $this->data['addAyudasActive'] = 'active';
        $this->data['beneficiarios'] = Beneficiario::selectRaw('CONCAT(apellidos, " (EmpID:", beneficiarioID,")") as apellidos, beneficiarioID')
	                                        ->where('status','=','active')
	                                        ->lists('apellidos','beneficiarioID');
    dd($this->data['beneficiarios']);
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

        if($this->data['setting']->ayuda_notification==1)
        {
            $beneficiario = Beneficiario::select('email','apellidos')->where('beneficiarioID', '=', $input['beneficiarioID'])->first();

            $this->data['ayudaName'] = $input['ayudaName'];
	        $this->data['beneficiario_name'] = $beneficiario->apellidos;

            //        Send award Mail
            Mail::send('emails.admin.ayuda', $this->data, function ($message) use ($beneficiario) {
                $message->from($this->data['setting']->email, $this->data['setting']->name);
                $message->to($beneficiario['email'], $beneficiario['apellidos'])
                    ->subject('Ayuda - ' . $this->data['ayudaName']);
            });
        }
        Ayuda::create($input);

		return Redirect::route('admin.ayudas.index')->with('success',"<strong>{$input['ayudaName']}</strong> is awarded");
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

        $ayuda->update($data);

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
