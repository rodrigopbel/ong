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
    public function genrepo($id)
    {
        $result =
            Ayuda::select('ayudas.id','beneficiarios.beneficiarioID','apellidos','requerimiento','centroSalud','nit','numfactura','gastos','ayudas.created_at')
                ->join('beneficiarios', 'ayudas.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
                ->orderBy('ayudas.created_at','desc');

        return Datatables::of($result)
            ->add_column('Por el Mes',function($row) {
                return ucfirst($row->created_at).' '.$row->created_at;
            })
            ->add_column('edit', '
                        <a  class="btn purple"  href="{{ route(\'admin.ayudas.edit\',$id)}}" ><i class="fa fa-edit"></i></a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $apellidos}}\',\'{{ $requerimiento }}\');return false;" class="btn red">
                        <i class="fa fa-trash"></i></a>')

            ->remove_column('created_at')
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