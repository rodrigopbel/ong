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
        $ben = Ayuda::where('beneficiarioID','=','666')->get();
        $benA = Ayuda::where('beneficiarioID','=','666')->get()->aportanteID;
        $don = Donacion::where('aportanteID','=','321')->get();
        echo('***********');
        $b = json_decode($ben);

        echo ($benA);
        echo('***********');
        echo ($don);

//        echo (json_encode($result));
//        dd( Datatables::of($result));
//        return View::make('admin.reportes.index', $this->data);
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
            $idBen = Input::get('id');
            $ayudas = Ayuda::select('ayudas.created_at','ayudas.gastos')
                                    ->join('beneficiarios','ayudas.beneficiarioID','=','beneficiarios.beneficiarioID')
                                    ->join('donaciones','ayudas.aportanteID','=','donaciones.aportanteID')
                                    ->groupBy('ayudas.id');
            $input = Input::all();
//            return Response::json($input);
            var_dump($ayudas);
            $json_ayudas = json_encode($ayudas);
            return Response::json($json_ayudas);
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