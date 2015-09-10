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



    //Datatable ajax request
    public function ajax_reportes()
    {

//        $result   =   Ayuda::join('beneficiarios','ayudas.beneficiarioID','=','beneficiarios.beneficiarioID')
//            ->join('donaciones','ayudas.aportanteID','=','donaciones.aportanteID')
//            ->join('personal', 'ayudas.aportanteID', '=', 'personal.personalID')
//            ->select('ayudas.id','beneficiarios.nombres','requerimiento','created_at','donaciones.montodonacion','gastos',('donaciones.montodonacion'-'gastos'))
//            ->where('personal','personal.tipoPersonal','=','aportante')
//            ->orderBy('beneficiarios.apellidos','asc')
//            ->groupBy('ayudas.id')
//            ->get();
//        $result = Ayuda::select('ayudas.id','beneficiarios.nombres','requerimiento','created_at','donaciones.montodonacion','gastos',('donaciones.montodonacion'-'gastos'))
//                ->join('personal', 'ayudas.aportanteID', '=', 'personal.personalID')
//                ->join('donaciones','ayudas.aportanteID','=','donaciones.aportanteID')
//                ->join('beneficiarios','ayudas.beneficiarioID','=','beneficiarios.beneficiarioID')
//                ->where('personal','personal.tipoPersonal','=','aportante')
//                ->groupBy('ayudas.id');
//
//        return Datatables::of($result)
//
//            ->make();

//        echo $result;
        if(Request::ajax()){
            $input = json_decode(Input::all());
            $id = json_decode($input);
            $idBen = $id->{'id'};
            $ayudas = new stdClass();
            $ayudas->idBen = $idBen;
            $ayudas->name = "guillermo";
            $ayudas->nayudas = array("a1" => 8815,"a2" => 546,"a3" => 333);
//            var_dump($idBen);
            $name = "guillermo";
            $reponse = array($idBen,$name);
            return Response::json(json_encode($ayudas));
        }else{
            return Response::json("error de sintaxis");
        }


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