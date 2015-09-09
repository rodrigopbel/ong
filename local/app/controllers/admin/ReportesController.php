<?php

class ReportsController extends \AdminBaseController {

    public function __construct()
    {
        parent::__construct();
        $this->data['reportesOpen'] ='active open';
        $this->data['pageTitle']  =  'Reportes';
    }

    //    Display a listing of awards
    public function index()
    {
//        $this->data['beneficiarios'] = Beneficiario::all();
        $this->data['reportesActive'] =   'active';
        $this->data['beneficiarios'] = Beneficiario::selectRaw('CONCAT(apellidos, " (ID:", beneficiarioID,")") as apellidos, beneficiarioID')
                                ->where('status','=','activo')
                                ->lists('apellidos','beneficiarioID');
//
//        $this->data['xyz'] = Ayuda::select('ayudas.gastos','ayudas.aportanteID','ayudas.id')
//                            ->join('beneficiarios','ayudas.beneficiarioID','=','beneficiarios.beneficiarioID')
//                            ->join('donaciones','ayudas.aportanteID','=','donaciones.aportanteID')
//                            ->get();
//        $this->data['abc'] = $this->data['xyz']->groupBy('ayudas.id');
//        echo $this->data['abc'];
        return View::make('admin.reportes.index', $this->data);
    }



    //Datatable ajax request
    public function ajax_reportes()
    {

        $result = Ayuda::select('ayudas.id','beneficiarios.nombres','requerimiento','created_at','donaciones.montodonacion','gastos',('donaciones.montodonacion'-'gastos'))
                ->join('personal', 'ayudas.aportanteID', '=', 'personal.personalID')
                ->join('donaciones','ayudas.aportanteID','=','donaciones.aportanteID')
                ->join('beneficiarios','ayudas.beneficiarioID','=','beneficiarios.beneficiarioID')
                ->where('personal','personal.tipoPersonal','=','aportante')
                ->groupBy('ayudas.id');

        return Datatables::of($result)

            ->make();
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

}