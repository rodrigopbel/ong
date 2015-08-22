<?php

class DestinosController extends \AdminBaseController {



    public function __construct()
    {
        parent::__construct();
        $this->data['destinosOpen'] ='active open';
        $this->data['pageTitle'] ='Destinos';
    }


	public function index() {
		$this->data['destinos'] = Destino::all();
		$this->data['destinosActive'] = 'active';
		$benCount = array();
		foreach (Destino::all() as $des) {
			$benCount[$des->id] = Beneficiario::join('objetivo', 'beneficiarios.objetivo', '=', 'objetivo.id')
			                                    ->join('destino', 'objetivo.destID', '=', 'destino.id')
			                                    ->where('destino.id', '=', $des->id )
			                                    ->count();
		}

		$this->data['beneficiarioCount']    =   $benCount;



		return View::make('admin.destinos.index', $this->data);
	}
	/**
	 * Store a newly created department in storage.
	 */
	public function store()
	{
		$validator = Validator::make($input = Input::all(), Destino::rules());

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$dest = Destino::create([
            'destino'  => $input['destino']
        ]);

        foreach ($input['objetivo'] as $index => $value) {
            if($value=='')continue;
            Objetivo::firstOrCreate([
                'destID' => $dest->id,
                'objetivo' => $value
            ]);

        }

		return Redirect::route('admin.destinos.index')->with('success',"<strong>{$input['destino']}</strong> Adicionado correctamente....");
	}



	/**
	 * Show the form for editing the specified department.
	 */
	public function edit($id)
	{
		$this->data['destinos'] = Destino::find($id);
		return View::make('admin.destinos.edit', $this->data);
	}


	/**
	 * Update the specified department in storage.
	 */
	public function update($id)
	{
		$dest = Destino::findOrFail($id);


		$validator = Validator::make($input = Input::all(), Destino::rules($id));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		$dest->update([
            'destino'=> $input['destino']
        ]);

        foreach ($input['objetivo'] as $index => $value) {
            if($value=='' && !isset($input['objID'][$index]))continue;

            if(isset($input['objID'][$index]))
            {

                if($value=='') {
                    Objetivo::destroy($input['objID'][$index]);
                }
                else{
                    $obj = Objetivo::find($input['objID'][$index]);
					$obj->objetivo = $value;
					$obj->save();
                }


            }else
            {
                Objetivo::firstOrCreate([
                    'destID'=> $dest->id,
                    'objtivo' => $value
                ]);
            }

        }
		dd($input['objetivo']);
		die();
		return Redirect::route('admin.destinos.index')->with('success',"<strong>{$input['destino']}</strong>  Actualizado correctamente");;
	}

	/**
	 * Remove the specified department from storage.
	 */
	public function destroy($id)
	{
		if (Request::ajax()) {

			Destino::destroy($id);

			$output['success'] = 'deleted';

			return Response::json($output, 200);
		}


	}

    public function ajax_destino()
    {
	    if (Request::ajax()) {
		    $input = Input::get('destID');
		    $objetivo = Destino::where('destID', '=', $input)
		                              ->get();

		    return Response::json($objetivo, 200);
	    }
    }
}
