<?php
use Illuminate\Support\Facades\DB;

/**
 * Class PersonalController
 * This Controller is for the all the related function applied on personal
 */
class PersonalController extends \AdminBaseController {
    /**
     * Constructor de Personal
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['personalOpen']  =   'active open';
        $this->data['pageTitle']     =   'Personal';
    }
    public function index()
    {
        $this->data['personales']       =    Personal::all();
        $this->data['personalActive']   =   'active';
        Debugbar::info($this->data['personales'] );
        return View::make('admin.personal.index', $this->data);
    }
    /**
     * Show the form for creating a new employee
     */
    public function create()
    {
        $this->data['personalActive']  =   'active';
        return View::make('admin.personal.create',$this->data);
//        dd("hola a todos");
    }
    public function createAdministrador()
    {
        $this->data['personalActive']  =   'active';
        return View::make('admin.personal.createAdministrador',$this->data);
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

                //                Image::make($image->getRealPath())->resize('872','724')->save($path.$filename);
                Image::make($image->getRealPath())
                    ->fit(872, 724, function ($constraint) {
                        $constraint->upsize();
                    })->save($path.$filename);



            }

            Personal::create([
                'personalID'    => $input['personalID'],
                'nombres'      => ucwords(strtolower($input['nombres'])),
                'apellidos'    => ucwords(strtolower($input['apellidos'])),
                'email'         => $input['email'],
                'password'      => Hash::make($input['password']),
                'genero'        => $input['genero'],
                'tipoPersonal'   => $input['tipoPersonal'],
                'telefono'  => $input['telefono'],
                'parentesco'  => $input['parentesco'],
                'fechanac' => date('Y-m-d',strtotime($input['fechanac'])),
                'fotoPersonal'  =>  isset($filename)?$filename:'default.jpg',
            ]);

            Activity::log([
                'contentId'   =>  $input['personalID'],
                'contentType' => 'Personal',
                'user_id'     => Auth::admin()->get()->id,
                'action'      => 'Create',
                'description' => 'Creacion '. $input['tipoPersonal'],
                'details'     => 'Usuario: '. Auth::admin()->get()->name,
                'updated'     => $input['personalID'] ? true : false
            ]);

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
        //----Bank Details Update-------

        if(Input::get('updateType')=='responsable')
        {
//            dd(Input::all());
            $per  =   Personal::where('personalID','=',$id)->get()->first();

            $validator = Validator::make($input = Input::all(), Personal::rules('personalInfo', $per->id));

            if ($validator->fails())
            {
                $output['status']   =   'error';
                $output['msg']      =   $validator->getMessageBag()->toArray();
            }else{
                // Profile Image Upload
                if (Input::hasFile('foto'))
                {
                    $path       = public_path()."/personalImages/";
                    File::makeDirectory($path, $mode = 0777, true, true);

                    $image 	    = Input::file('fotoPersonal');

                    $fullname = Input::get('nombres')." ". Input::get('apellidos');
                    $extension  = $image->getClientOriginalExtension();
                    $filename	= "{$fullname}_{$id}.".strtolower($extension);

                    //Image::make($image->getRealPath())->resize(872,724)->save("$path$filename");

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
                $responsable->parentesco    = Input::get('parentesco');
                $responsable->fechanac      = date('Y-m-d',strtotime(Input::get('fechanac')));
                $responsable->fotoPersonal  =  isset($filename)?$filename:'default.jpg';
                $responsable->save();

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

    public function destroy($id)
    {
        Employee::where('employeeID', '=', $id)->delete();
        Activity::log([
            'contentId'   =>  $id,
            'contentType' => 'Personal',
            'user_id'     => Auth::admin()->get()->id,
            'action'      => 'Delete',
            'description' => 'Eliminacion  '. $id,
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $id ? true : false
        ]);

        $output['success']  =   'deleted';

        return Response::json($output, 200);
    }





}
