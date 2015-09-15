<?php

class SaldosController extends \AdminBaseController {

    public function __construct()
    {
        parent::__construct();
        $this->data['saldosOpen'] ='active open';
        $this->data['pageTitle']  =  'Saldos';
    }

    //    Display a listing of awards
    public function index()
    {
//        dd("entro aqui");
        $this->data['saldosActive'] =   'active';
        $this->data['saldos']   = Saldo::all();
        return $this->data;
//        return View::make('admin.saldos.index', $this->data);
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