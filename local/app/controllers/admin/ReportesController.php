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
        $this->data['reportesActive'] =   'active';
        $this->data['beneficiarios'] = Beneficiario::selectRaw('CONCAT(apellidos, " (ID:", beneficiarioID,")") as apellidos, beneficiarioID')
                                ->where('status','=','activo')
                                ->lists('apellidos','beneficiarioID');
        return View::make('admin.reportes.index', $this->data);
    }
    public function ReporteBen()
    {
       return Redirect::route('ReporteBen',[Input::get('beneficiario')]);
    }
    public function ReporteGen()
    {
        if(Input::get('beneficiario')){

            $this->data['beneficiario'] = Beneficiario::where('beneficiarioID','=',Input::get('beneficiario'))->get();
            foreach($this->data['beneficiario'] as $ben)
            {
                $this->data['beneficiario']['ayudas'] = $ben->ayudas;
                $this->data['beneficiario']['donaciones'] = $ben->donaciones;
            }
            echo $this->data;

//            return View::make('admin.reportes.reporte',$this->data);
        } else {
            return Redirect::route('admin.reportes.index');
        }
//        return Input::get('beneficiario');
    }
    public function reportestran()
    {
        $this->data['reporteActive']    =   'active';
        return "hola reportes Transacciones";
    }
}