<?php
use Illuminate\Support\Facades\DB;

/**
 * Class PersonalVoluntarioController
 * This Controller is for the all the related function applied on personal voluntario
 */
class PersonalVoluntarioController extends \AdminBaseController {
    /**
     * Constructor de Personal
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['personalVoluntarioOpen']  =   'active open';
        $this->data['pageTitle']     =   'Personal Voluntario';
    }
    public function index()
    {
        $this->data['personales']       =    Personal::where('tipoPersonal', '=', 'Voluntario')->get();
        $this->data['personalVoluntarioActive']   =   'active';
        Debugbar::info($this->data['personales'] );

        return View::make('admin.personalVoluntario.index', $this->data);
    }
    /**
     * Show the form for creating a new employee
     */
    public function create()
    {
        $this->data['personalActive']  =   'active';
        return View::make('admin.personal.create',$this->data);
    }
    /**
     * Store a newly created employee in storage
     */
    public function store()
    {

        $validator = Validator::make($input = Input::all(), Personal::rules('create'));
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $nombres = $input['nombres'];
            $apellidos = $input['apellidos'];
            $filename   =   null;
            // Profile Image Upload
            if (Input::hasFile('fotoPersonal')) {
                $path       = public_path()."/foto/";
                File::makeDirectory($path, $mode = 0777, true, true);
                $image 	    = Input::file('fotoPersonal');
                $extension  = $image->getClientOriginalExtension();
                $filename	= "{$nombres}_{$input['personalID']}.".strtolower($extension);
                Image::make($image->getRealPath())
                    ->fit(872, 724, function ($constraint) {
                        $constraint->upsize();
                    })->save($path.$filename);
            }

            $tipo = "Aportante";
//            return Input::all();
            Personal::create([
                'personalID'    => $input['personalID'],
                'emision'       => $input['nitcit2'],
                'nombres'       => ucwords(strtolower($input['nombres'])),
                'apellidos'     => ucwords(strtolower($input['apellidos'])),
                'email'         => $input['email'],
                'password'      => Hash::make($input['password']),
                'genero'        => $input['genero'],
                'tipoPersonal'  => $tipo,
                'telefono'      => $input['telefono'],
////                'parentesco'  => $input['parentesco'],
////                'fechanac' => date('Y-m-d',strtotime($input['fechanac'])),
                'fotoPersonal'  =>  isset($filename)?$filename:'default.jpg',
            ]);



            Activity::log([
                'contentId'   =>  $input['personalID'],
                'contentType' => 'Personal Aportante',
                'user_id'     => Auth::admin()->get()->id,
                'action'      => 'Creando Un Aportante',
                'description' => 'Creacion '. $tipo,
                'details'     => 'Usuario: '. Auth::admin()->get()->name,
                'updated'     => $input['personalID'] ? true : false
            ]);
//            return Input::all();

        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return Redirect::route('admin.personal.index')->with('success',"<strong>{$nombres}</strong> exitosamente adicionado en le base de datos");
    }
    /**
     * Show the form for editing the specified employee
     */
    public function edit($id)
    {
        $this->data['personalActive']  =   'active';
        $this->data['personal']         =   Personal::where('personalID', '=' ,$id)->get()->first();
        return View::make('admin.personal.edit', $this->data);
    }
    /**
     * Update the specified employee in storage.
     */
    public function update($id)
    {
        if(Input::get('updateType')=='responsable')
        {
            $per  =   Personal::where('personalID','=',$id)->get()->first();
            $validator = Validator::make($input = Input::all(), Personal::rules('personalInfo', $per->id));
            if ($validator->fails())
            {
                $output['status']   =   'error';
                $output['msg']      =   $validator->getMessageBag()->toArray();
            }else{
                // Profile Image Upload
                if (Input::hasFile('fotoPersonal'))
                {
                    $path       = public_path()."/personalImages/";
                    File::makeDirectory($path, $mode = 0777, true, true);
                    $image 	    = Input::file('fotoPersonal');
                    $fullname = Input::get('nombres')." ". Input::get('apellidos');
                    $extension  = $image->getClientOriginalExtension();
                    $filename	= "{$fullname}_{$id}.".strtolower($extension);
                    Image::make($image->getRealPath())
                        ->fit(872, 724, function ($constraint) {
                            $constraint->upsize();
                        })->save($path . $filename);
                }else
                {
                    $filename   =   Input::get('hiddenImage');
                }
                $responsable = Personal::firstOrNew(['personalID' => $id]);
                $responsable->nombres       = ucwords(strtolower($input['nombres']));
                $responsable->apellidos     = ucwords(strtolower($input['apellidos']));
                $responsable->email         = Input::get('email');
                $responsable->password      = Hash::make($input['password']);
                $responsable->genero        = Input::get('genero');
                $responsable->tipoPersonal  = Input::get('tipoPersonal');
                $responsable->telefono      = Input::get('telefono');
                $responsable->fechanac      = date('Y-m-d',strtotime(Input::get('fechanac')));
                $responsable->fotoPersonal  =  isset($filename)?$filename:'default.jpg';
                $responsable->save();

//                return $responsable;
                Activity::log([
                    'contentId'   =>  $id,
                    'contentType' => 'Personal',
                    'user_id'     => Auth::admin()->get()->id,
                    'action'      => 'Update',
                    'description' => 'Actualizacion  '. Input::get('tipoPersonal'),
                    'details'     => 'Usuario: '. Auth::admin()->get()->name,
                    'updated'     => $id ? true : false
                ]);
                $output['status'] = 'success';
                $output['msg'] = 'Persona actualizad correctamente....';
            }
        }
        //-------Documents info Details Update END--------
        return Redirect::route('admin.personal.edit',$id)->with('successPersonal',"<strong>Actualizacion</strong> Existosa");
    }
    /**
     * Remove the specified employee from storage.
     */
    public function export(){
        $ben   =   Personal::all()->get()->toArray();
        $data = $ben;
        Excel::create('ong'.time(), function($excel) use($data) {
            $excel->sheet('Personales', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        })->store('xls')->download('xls');
        Activity::log([
            'contentId'   => 'All',
            'user_id'     => Auth::admin()->get()->id,
            'contentType' => 'Personal',
            'action'      => 'Export ',
            'description' => 'Exportacion de Personal',
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     =>  false
        ]);
    }
    public function destroy($id)
    {
        Personal::where('personalID', '=', $id)->delete();
        Activity::log([
            'contentId'   =>  $id,
            'contentType' => 'Personal',
            'user_id'     => Auth::admin()->get()->id,
            'action'      => 'Borrado de Personal Voluntario',
            'description' => 'Borrado de Personal Voluntario',
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $id ? true : false
        ]);
        $output['success']  =   'deleted';
        return Response::json($output, 200);
    }
}
