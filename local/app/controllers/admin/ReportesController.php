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
//       666
//        $result =
//            Ayuda::select('ayudas.id','beneficiarios.beneficiarioID','apellidos','requerimiento','centroSalud','nit','numfactura','gastos','ayudas.created_at')
//                ->join('beneficiarios', 'ayudas.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
//                ->orderBy('ayudas.created_at','desc')
//                ->get();
//        $bens = Beneficiario::all();
//        foreach($bens as $ben)
//        {
////            $result[] = $ben->ayudas()->where('beneficiarioID','=','666');
//            echo ($ben->ayudas);
//
//        }


        return View::make('admin.reportes.index', $this->data);
    }



    //Datatable ajax request
    public function ajax_reportes()
    {
        if(Request::ajax()){

            $idBenObject = Input::get('id');
//            $idBen = json_decode($idBenObject);
            $ben = Ayuda::where('beneficiarioID','=',$idBenObject)->get();
            $b = json_decode($ben);
            $don = Donacion::where('aportanteID','=',$b[0]->aportanteID)->get();

//            echo ($don);
            return Response::json(Input::all());
        }else{
            return Response::json("error de sintaxis");
        }


    }
    public function ReporteBen()
    {
       return Redirect::route('ReporteBen',[Input::get('beneficiario')]);
    }
    public function ReporteGen()
    {
        if(Input::get('beneficiario')){
//            $this->data['beneficiarios'] = Beneficiario::where('beneficiarioID','=',Input::get('beneficiario'))->get();
//            $this->data['ayudas'] = Ayuda::where('beneficiarioID','=',Input::get('beneficiario'))->get();
//            $b = json_decode($this->data['ayudas']);
//            $this->data['donaciones'] = Donacion::where('aportanteID','=',$b[0]->aportanteID)->get();
            $this->data['beneficiario'] = Beneficiario::where('beneficiarioID','=',Input::get('beneficiario'))->get();
//            $this->data['ayudas'] = $this->data['beneficario']->ayudas;
            $this->data['datos'] = Beneficiario::where('beneficiarioID','=',Input::get('beneficiario'))->get();
            foreach($this->data['datos'] as $ben)
            {
                $this->data['datos']['ayudas'] = $this->data['datos']->ayudas();
            }
            return $this->data;
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