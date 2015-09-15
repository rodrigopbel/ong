<?php

class ActividadesController extends \AdminBaseController {


    public function __construct()
    {
        parent::__construct();
        $this->data['actividadesOpen'] ='active open';
        $this->data['pageTitle']  =  'Actividades';
    }

    //    Display a listing of awards
    public function index()
    {
        $this->data['actividades'] = Actividad::all();

        $this->data['actividadesActive'] =   'active';

        return View::make('admin.actividades.index', $this->data);
    }


    //Datatable ajax request
    public function ajax_actividades()
    {

        $result =
            Actividad::select('actividades.id','fechaAct','descripcion','lugar','actividades.created_at')
                ->from( 'actividades')
                ->orderBy('actividades.created_at','desc');

        return Datatables::of($result)
            ->add_column('Por el Mes',function($row) {
                return ucfirst($row->created_at).' '.$row->created_at;
            })
            ->add_column('list', '
                        <a  class="btn purple"  href="{{ route(\'admin.actividades.edit\',$id)}}" ><i class="fa fa-cog "></i></a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $descripcion}}\',\'{{ $lugar }}\');return false;" class="btn red">
                        <i class="fa fa-book"></i></a>')

            ->add_column('edit', '
                        <a  class="btn purple"  href="{{ route(\'admin.actividades.edit\',$id)}}" ><i class="fa fa-edit"></i></a>
                            &nbsp;<a href="javascript:;" onclick="del(\'{{ $id }}\',\'{{ $descripcion}}\',\'{{ $lugar }}\');return false;" class="btn red">
                        <i class="fa fa-trash"></i></a>')

//            ->remove_column('created_at')
            ->make();
    }

    public function create()
    {
        $this->data['addActividadesActive'] = 'active';
//        $this->data['beneficiarios'] = Beneficiario::selectRaw('CONCAT(apellidos, " (ID:", beneficiarioID,")") as apellidos, beneficiarioID')
//            ->where('status','=','activo')
//            ->lists('apellidos','beneficiarioID');



        return View::make('admin.actividades.create',$this->data);
    }

    /**
     * Store a newly created award in storage.
     */

    public function store()
    {
        $validator = Validator::make($input = Input::all(), Actividad::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Actividad::create([
            'fechaAct'       => date('Y-m-d',strtotime($input['fechaAct'])),
            'descripcion'    => $input['descripcion'],
            'lugar'         => $input['lugar']
        ]);

        Activity::log([
            'contentId'   =>  $input['lugar'],
            'contentType' => 'Actividad',
            'user_id'     => Auth::admin()->get()->id,
            'action'      => 'Create',
            'description' => 'Creacion '. $input['descripcion'],
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $input['fechaAct'] ? true : false
        ]);


        return Redirect::route('admin.actividades.index')->with('success',"<strong>Guardado</strong> Exitosamente");
    }



    /**
     * Show the form for editing the specified award.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $this->data['actividad']    = Actividad::find($id);
        $this->data['addActividadesActive'] = 'active';
//        $this->data['beneficiarios'] = Beneficiario::lists('apellidos','beneficiarioID');
//        $this->data['personales'] = Personal::selectRaw('CONCAT(nombres, " (ID:", personalID,")") as nombres, personalID')
//            ->where('tipoPersonal','=','aportante')
//            ->lists('nombres','personalID');
        return View::make('admin.actividades.edit', $this->data);
    }

    /**
     * Update the specified award in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $actividad = Actividad::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Actividad::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $actividad->update([

            'fechaAct'       => (trim(Input::get('fechaAct'))!='')?date('Y-m-d',strtotime(Input::get('fechaAct'))):null,
            'descripcion'    => $data['descripcion'],
            'lugar'          => $data['lugar']
        ]);

        Activity::log([
            'contentId'   =>  $id,
            'contentType' => 'Actividad',
            'user_id'     => Auth::admin()->get()->id,
            'action'      => 'Create',
            'description' => 'Actualizacion '. $data['descripcion'],
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $id ? true : false
        ]);

        return Redirect::route('admin.actividades.edit',$id)->with('success',"<strong>Actualizacion</strong> Exitosa");
    }

    /**
     * Remove the specified award from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (Request::ajax()) {
            Actividad::destroy($id);
            $output['success'] = 'deleted';
            Activity::log([
                'contentId'   =>  $id,
                'contentType' => 'Actividad',
                'user_id'     => Auth::admin()->get()->id,
                'action'      => 'Create',
                'description' => 'Eliminacion '. $id,
                'details'     => 'Usuario: '. Auth::admin()->get()->name,
                'updated'     => $id ? true : false
            ]);
            return Response::json($output, 200);
        }else{
            throw(new Exception('Wrong request'));
        }

    }

}
