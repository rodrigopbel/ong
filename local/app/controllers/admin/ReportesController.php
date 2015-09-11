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
    public function ReporteBenMen()
    {

        if(Input::all())
        {
            $this->data['beneficiario'] = Beneficiario::where('beneficiarioID','=',Input::get('beneficiario'))->get();
            foreach($this->data['beneficiario'] as $ben)
            {
                $this->data['ayudas'] = $ben->ayudas->where(MONTH('created_at'),'=', '9');
                $this->data['donaciones'] = $ben->donaciones;
            }


        }
        return $this->data;
    }
    public function ReporteGen()
    {
        if(Input::get('beneficiario'))
        {
            $this->data['beneficiario'] = Beneficiario::where('beneficiarioID','=',Input::get('beneficiario'))->get();
            foreach($this->data['beneficiario'] as $ben)
            {
                $this->data['ayudas'] = $ben->ayudas;
                $this->data['donaciones'] = $ben->donaciones;
            }
            $this->data['ingresoTotal'] = 0;
            $this->data['egresoTotal'] = 0;
            foreach($this->data['ayudas'] as $ayuda)
            {
                $this->data['egresoTotal'] = $this->data['egresoTotal'] + $ayuda->gastos;
            }
            foreach($this->data['donaciones'] as $donacion)
            {
                $this->data['ingresoTotal'] = $this->data['ingresoTotal'] + $donacion->montodonacion;
            }
            $this->data['saldo'] = $this->data['ingresoTotal']- $this->data['egresoTotal'];
            return View::make('admin.reportes.reporte',$this->data);
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