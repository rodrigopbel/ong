<?php

class ReportsController extends \AdminBaseController {
    public function __construct()
    {
        parent::__construct();
        setlocale(LC_ALL,"es_ES");
        $this->data['reportOpen'] ='active open';
        $this->data['pageTitle'] =  'Reportes';
    }
    public function index()
    {
        return "hola index";
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