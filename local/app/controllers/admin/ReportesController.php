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

//        $this->data['reportes'] = Reprote::all();
        $this->data['reportesActive'] =   'active';
//        Ayuda::select('ayudas.id','beneficiarios.beneficiarioID','apellidos','requerimiento','centroSalud','nit','numfactura','gastos','ayudas.created_at')
//            ->join('beneficiarios', 'ayudas.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
//            ->orderBy('ayudas.created_at','desc');
        $this->data['xyz'] = Ayuda::select('ayudas.gastos','ayudas.aportanteID','ayudas.id')
                            ->join('beneficiarios','ayudas.beneficiarioID','=','beneficiarios.beneficiarioID')
                            ->join('donaciones','ayudas.aportanteID','=','donaciones.aportanteID')
                            ->groupBy('ayudas.id');
        $this->data['abc'] = $this->data['xyz']->groupBy('ayudas.id');
        echo $this->data['abc'];
//            $this->data['ayudas'] = Ayuda::all();
//            $ben = Beneficiario::all();
//            $ayuBen = $ben->ayudas;
//            echo($ayuBen);
//        foreach (Beneficiario::all() as $ben)
//        {
//            $benAyu[] = $ben->ayudas;
////            echo $ben->ayudas;
//        }
//        echo '----------';
//        foreach(Personal::all() as $per)
//        {
////            $perA = $per->where('tipoPersonal','=','Aportante');
////            $perDon[] = $per;
//            echo $per::where('tipoPersonal','=','Aportante')->get()->first();
//        }
//        echo($perDon);
//        return View::make('admin.reportes.index', $this->data);
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