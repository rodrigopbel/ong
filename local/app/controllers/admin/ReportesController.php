<?php

class ReportsController extends \AdminBaseController {
    public function __construct()
    {
        parent::__construct();
        $this->data['reportOpen'] ='active open';
        $this->data['pageTitle'] =  'Reportes';
    }
    public function index()
    {
        $this->data['ayudas'] = Ayuda::all();
        $this->data['beneficiarios'] = Beneficiario::all();
        $this->data['ayudasActive'] =   'active';
//        $this->data['reporte'] = Ayuda::select('ayudas.gastos','donaciones.montodonacion','donaciones.aportanteID','ayudas.requerimiento','ayudas.created_at','beneficiarios.nombres','beneficiarios.apellidos')
//                                ->join('beneficiarios', 'ayudas.beneficiarioID','=','beneficiarios.beneficiarioID')
//                                ->join('donaciones', 'ayudas.aportanteID','=','donaciones.aportanteID')
//                                ->orderBy('ayudas.created_at','desc');


        $result =
                Ayuda::select('ayudas.gastos','donaciones.montodonacion','donaciones.aportanteID','ayudas.requerimiento','ayudas.created_at','beneficiarios.nombres','beneficiarios.apellidos')
                    ->join('beneficiarios', 'ayudas.beneficiarioID','=','beneficiarios.beneficiarioID')
                    ->join('donaciones', 'ayudas.aportanteID','=','donaciones.aportanteID')
                    ->orderBy('ayudas.created_at','desc');


//        $result =
//            Ayuda::select('ayudas.id','beneficiarios.beneficiarioID','apellidos','requerimiento','centroSalud','nit','numfactura','gastos','ayudas.created_at')
//                ->join('beneficiarios', 'ayudas.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
//                ->orderBy('ayudas.created_at','desc');
        dd ($result);

    }
    public function reportesben()
    {
        $this->data['reporteActive']    =   'active';
        return "hola reportes Beneficiarios";
    }
    public function reportestran()
    {
        $this->data['reporteActive']    =   'active';
        return "hola reportes Transacciones";
    }
    public function store()
    {

        $validator = Validator::make($input = Input::all(), Salary::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Salary::create($input);
        Session::flash('success',"<strong>{$input['type']}</strong> Created");
        return Redirect::route('admin.employees.edit',Input::get('employeeID'));
    }
    public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /salary/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Salary::destroy($id);
        $output['success']  =   'deleted';
        $output['msg']      =   'Salary Deleted successfully';
        return Response::json($output, 200);
	}

}