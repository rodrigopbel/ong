<?php
use Illuminate\Support\Facades\DB;
/**
 * Class BeneficiarioController
 * This Controller is for the all the related function applied on beneficiarios
 */
class BeneficiariosController extends \AdminBaseController {

    /**
     * Constructor for the Beneficiarios
     */

    public function __construct()
    {
        parent::__construct();
        $this->data['beneficiariosOpen'] =   'active open';
        $this->data['pageTitle']     =   'Beneficiarios';
    }

    public function index()
    {
        $this->data['beneficiarios']       =   Beneficiario::all();
        $this->data['responsables']        =   Personal::where('tipoPersonal','=', '');
        Debugbar::info($this->data['beneficiarios'] );
        $this->data['beneficiariosActive'] =   'active';
        return View::make('admin.beneficiarios.index', $this->data);
    }

    /**
     * Show the form for creating a new
     */
    public function create()
    {
        $this->data['beneficiariosActive'] =   'active';
        $this->data['destinos']      =     Destino::lists('destino','id');
        return View::make('admin.beneficiarios.create',$this->data);
    }

    /**
     * Store a newly created in storage
     */
    public function store()
    {

        $validator = Validator::make($input = Input::all(), Beneficiario::rules('create'));

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {

            $nombres = $input['nombres'];
            $filename   =   null;
            // Profile Image Upload
            if (Input::hasFile('foto')) {
                $path       = public_path()."/foto/";
                File::makeDirectory($path, $mode = 0777, true, true);

                $image 	    = Input::file('foto');
                $extension  = $image->getClientOriginalExtension();
                $filename	= "{$nombres}_{$input['beneficiarioID']}.".strtolower($extension);

                //                Image::make($image->getRealPath())->resize('872','724')->save($path.$filename);
                Image::make($image->getRealPath())
                    ->fit(872, 724, function ($constraint) {
                        $constraint->upsize();
                    })->save($path.$filename);



            }

            Beneficiario::create([
                'beneficiarioID'    => $input['beneficiarioID'],
                'responsableID'     => $input['nitcit']." ".$input['nitcit2'],
                'objetivo'          => $input['objetivo'],
                'nombres'           => ucwords(strtolower($input['nombres'])),
                'apellidos'         => ucwords(strtolower($input['apellidos'])),
                'genero'            => $input['genero'],
//                'email'             => $input['email'],
//                'password'          => Hash::make($input['password']),
            //ucwords(strtolower($bar)); // Hello World!
                'fechanac'          => date('Y-m-d',strtotime($input['fechanac'])),
                'telefono'          => $input['telefono'],
                'fechaing'          =>  date('Y-m-d',strtotime($input['fechaing'])),
                'direccion'         =>  ucwords(strtolower($input['direccion'])),
                'foto'              => isset($filename)?$filename:'default.jpg',
                'direccionperm'     => ucwords(strtolower($input['direccionperm'])),
                'iddiagnostico'     =>$input['iddiag'],
                'diagnostico'     	=>$input['diagnostico'],
                'fechadiagnostico'  =>$input['fechadiag'],
                'tratamiento'  =>$input['tratamiento'],
                'razon'     		=>$input['razon'],
                'duracion'    	 	=>$input['duracion'],
                'referencia'   	  	=>$input['referencia'],
                'lugar'    			=>$input['lugar']
            ]);


            //  Insert into salary table
            if ($input['montosolicitado'] != '')
            {
                Soldonacion::create([
                    'beneficiarioID' => $input['beneficiarioID'],
                    'tipo'       => 'current',
                    'nota'    => 'Primera Solicitud',
                    'monto'     => $input['montosolicitado']

                ]);
            }
            // Insert Into Bank Details
            Zonificacion::create([
                'beneficiarioID'    =>  $input['beneficiarioID'],
                'departamento'   =>  $input['departamento'],
                'provincia' =>  $input['provincia'],
                'localidad'          =>  $input['localidad'],
                'zona'           =>  $input['zona'],
                'canton'          =>  $input['canton'],
                'otros'        =>  $input['otros']

            ]);
//
            $tipo = 'responsable';
            Personal::create([
                'beneficiarioID'    => $input['beneficiarioID'],
                'personalID'        => $input['nitcit'],
                'emision'           => $input['nitcit2'],
                'nombres'           => $input['nombresReponsable'],
                'apellidos'         => $input['apellidosResponsable'],
                'ocupacion'         => $input['ocupacionResponsable'],
                'parentesco'        => $input['parentesco'],
                'tipoPersonal'      => $tipo
            ]);

            $fullname = $input['nombres']." ".$input['apellidos'];
            // -------------- UPLOAD THE DOCUMENTS  -----------------
            $documents  =   ['certnac','CIprueba','solicitud','croquis','perfil'];

            foreach ($documents as $document) {
                if (Input::hasFile($document)) {

                    $path = public_path()."/beneficiarios_documents/{$document}/";
                    File::makeDirectory($path, $mode = 0777, true, true);

                    $file 	    = Input::file($document);
                    $extension  = $file->getClientOriginalExtension();
                    $filename	= "{$document}_{$input['beneficiarioID']}_{$fullname}.$extension";

                    Input::file($document)->move($path, $filename);
                    Bendocumentos::create([
                        'beneficiarioID'=>  $input['beneficiarioID'],
                        'fileName'  =>   $filename,
                        'type'      =>  $document
                    ]);

                }
            }

//            dd(json_encode(Input::all()));
//            if($this->data['setting']->ben_add==1)
//            {
//                $this->data['ben_name'] = $fullname;
//                $this->data['ben_email'] = $input['email'];
//                $this->data['ben_password'] = $input['password'];
//                //        Send Employee Add Mail
//                Mail::send('emails.admin.beneficiarios_add', $this->data, function ($message) use ($input) {
//                    $message->from($this->data['setting']->email, $this->data['setting']->name);
//                    $message->to($input['email'], $input['nombres']." ".$input['apellidos'])
//                        ->subject('Cuenta Creada - ' . $this->data['setting']->website);
//                });
//            }
            //  ********** END UPLOAD THE DOCUMENTS**********

        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }

        Activity::log([
            'contentId'   => $input['beneficiarioID'],
            'contentType' => 'Beneficiario',
            'action'      => 'Creacion',
            'user_id'     => Auth::admin()->get()->id,
            'description' => 'Creacion del un Beneficiario',
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $input['beneficiarioID'] ? true : false
        ]);
        DB::commit();
        return Redirect::route('admin.beneficiarios.index')->with('success',"<strong>{$fullname}</strong> exitosamente adicionado en le base de datos");
    }




    /**
     * Show the form for editing the specified
     */
    public function edit($id)
    {
        $this->data['beneficiariosActive']  =   'active';
        $this->data['destinos']      =     Destino::lists('destino','id');
        $this->data['beneficiario']  =   Beneficiario::where('beneficiarioID', '=' ,$id)->get()->first();
        $this->data['objetivo']      =   Objetivo::find($this->data['beneficiario']->objetivo);
        $this->data['responsable']      =  Personal::where('beneficiarioID','=',$id)->where('tipoPersonal', '=', 'responsable')->get()->first();

        $doc = [];
//        dd($this->data['responsable']);
        foreach($this->data['beneficiario']->getDocuments as $documents)
        {
            $doc[$documents->type] =  $documents->fileName ;
        }
        $this->data['documents']  =   $doc;
        $this->data['zonificacion']     =   Zonificacion::where('beneficiarioID', '=' ,$id)->get()->first();
//        dd($this->data['responsable'] );
//return $this->data;
        return View::make('admin.beneficiarios.edit', $this->data);
    }
    /**
     * Update the specified in storage.
     */
    public function update($id)
    {
        //----Bank Details Update-------
        if(Input::get('updateType')=='zonificacion')
        {

            $validator = Validator::make($input = Input::all(), Beneficiario::rules('zonificacion'));

            if ($validator->fails())
            {
                $output['status']   =   'error';
                $output['msg']      =   $validator->getMessageBag()->toArray();

            }else{

                $details = Zonificacion::firstOrNew(['beneficiarioID' => $id]);

                $details->departamento   = Input::get('departamento');
                $details->provincia = Input::get('provincia');
                $details->otros          = Input::get('otros');
                $details->localidad           = Input::get('localidad');
                $details->canton          = Input::get('canton');
                $details->zona        = Input::get('zona');
                $details->save();

                $output['status'] = 'success';
                $output['msg'] = 'Zonificacion actualizado exitosamente';
            }
        }
        else if(Input::get('updateType')=='donacion')
        {
            $ddetails = Beneficiario::where('beneficiarioID','=', $id)->first();


            $validator = Validator::make($input = Input::all(), Beneficiario::rules('update',$ddetails->id));

            if ($validator->fails())
            {
                $output['status']   =   'error';
                $output['msg']      =   $validator->getMessageBag()->toArray();

            }else{

                $ddetails->beneficiarioID  = $id;
                $ddetails->objetivo = Input::get('objetivo');
                $ddetails->fechaing = date('Y-m-d',strtotime(Input::get('fechaing')));
                $ddetails->fecha_desvinculacion   = (trim(Input::get('fecha_desvinculacion'))!='')?date('Y-m-d',strtotime(Input::get('fecha_desvinculacion'))):null;

                $ddetails->status      = (Input::get('status')!='activo')?'inactivo':'activo';
                $ddetails->save();
                if(isset($input['monto']))
                {
                    foreach ($input['monto'] as $index => $value)
                    {
                        $salary_details = Soldonacion::find($index);
                        $salary_details->tipo = $input['tipo'][$index];
                        $salary_details->monto = $value;
                        $salary_details->save();
                    }
                }
                $output['status'] = 'success';
                $output['msg']    = 'Donacion Actualizado Existosamente';
            }
        }

        else if(Input::get('updateType')=='personalInfo')
        {

            $ben   =   Beneficiario::where('beneficiarioID','=',$id)->get()->first();


            $validator = Validator::make($data = Input::all(),Beneficiario::rules('personalInfo',$ben->id));

            if ($validator->fails())
            {
                return Redirect::back()->with(['errorPersonal' => $validator->messages()->all()])->withInput();
            }


            $input  =   Input::all();
            $fullname = $input['nombres']." ".$input['apellidos'];

//            $password = ($data['password']!='')?Hash::make(Input::get('password')):$data['oldpassword'];

            // Profile Image Upload
            if (Input::hasFile('foto'))
            {
                $path       = public_path()."/profileImages/";
                File::makeDirectory($path, $mode = 0777, true, true);

                $image 	    = Input::file('foto');


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



            $ben->update(
                [
                    'nombres'      => ucwords(strtolower($input['nombres'])),
                    'apellidos'    => ucwords(strtolower($input['apellidos'])),
                    'genero'        => $input['genero'],
//                    'email'         => $input['email'],
//                    'password'      => $password,
                    'fechanac' => (trim(Input::get('fechanac'))!='')?date('Y-m-d',strtotime(Input::get('fechanac'))):null,
                    'telefono'  => $input['telefono'],
                    'direccion'  => $input['direccion'],
                    'foto'  =>  isset($filename)?$filename:'default.jpg',
                    'direccionperm' => $input['direccionperm'],
                    'iddiagnostico'     =>$input['iddiag'],
                    'diagnostico'     	=>$input['diagnostico'],
                    'fechadiagnostico'  =>$input['fechadiag'],
                    'tratamiento'  =>$input['tratamiento'],
                    'razon'     		=>$input['razon'],
                    'duracion'    	 	=>$input['duracion'],
                    'referencia'   	  	=>$input['referencia'],
                    'lugar'    			=>$input['lugar']
                ]);
            Activity::log([
                'contentId'   => $id,
                'contentType' => 'Beneficiario',
                'user_id'     => Auth::admin()->get()->id,
                'action'      => 'Update',
                'description' => 'Actualizacion '. Input::get('updateType'),
                'details'     => 'Usuario: '. Auth::admin()->get()->name,
                'updated'     => $id ? true : false
            ]);
            return Redirect::route('admin.beneficiarios.edit',$id)->with('successPersonal',"<strong>Actualizacion</strong> Existosa");

        }
        else if(Input::get('updateType')=='responsable')
        {
//            dd(Input::all());
            $per  =   Personal::where('personalID','=',$id)->get()->first();

            $validator = Validator::make($input = Input::all(), Personal::rules('personalInfo', $per->id));

            if ($validator->fails())
            {
                $output['status']   =   'error';
                $output['msg']      =   $validator->getMessageBag()->toArray();
            }else{

                $responsable = Personal::firstOrNew(['personalID' => $id]);
                $responsable->personalID    = $input['ciResponsable'];
                $responsable->emision    = $input['ciResponsableEmision'];
                $responsable->nombres       = ucwords(strtolower($input['nombresReponsable']));
                $responsable->apellidos     = ucwords(strtolower($input['apellidosResponsable']));
                $responsable->ocupacion     = $input['ocupacionResponsable'];
                $responsable->tipoPersonal  = "Responsable";
                $responsable->parentesco    = Input::get('parentesco');
                $responsable->save();
                $output['status'] = 'success';
                $output['msg'] = 'Persona actualizad correctamente....';
            }
            return $responsable;
            return $responsable;
        }
        else if(Input::get('updateType')=='documents')
        {

            $input  =   Input::all();
            $ben   =   Beneficiario::where('beneficiarioID','=',$id)->get()->first();

            // -------------- UPLOAD THE DOCUMENTS  -----------------
            $documents  =   ['certnac','CIprueba','solicitud','croquis','perfil'];
            $fullname = $ben->nombres." ".$ben->apellidos;
            foreach ($documents as $document) {

                if (Input::hasFile($document)) {

                    $path = public_path()."/beneficiarios_documents/{$document}/";


                    File::makeDirectory($path, $mode = 0777, true, true);

                    $file 	= Input::file($document);
                    $extension  = $file->getClientOriginalExtension();
                    $filename	= "{$document}_{$id}_{$fullname}.$extension";



                    Input::file($document)->move($path, $filename);

                    $edoc   =   Bendocumentos::where('beneficiarioID','=',$id)->get()->first();
                    if ($edoc) {
                        $edoc->fileName  =   $filename;
                        $edoc->type      =   $document;
                        $edoc->save();
                    } else {
                        $edoc = new Bendocumentos();
                        $edoc->beneficiarioID = $id;
                        $edoc->fileName  =   $filename;
                        $edoc->type      =   $document;
                        $edoc->save();
                    }



                }
            }
            Activity::log([
                'contentId'   => $id,
                'contentType' => 'Beneficiario',
                'user_id'     => Auth::admin()->get()->id,
                'action'      => 'Update',
                'description' => 'Actualizacion '. Input::get('updateType'),
                'details'     => 'Usuario: '. Auth::admin()->get()->name,
                'updated'     => $id ? true : false
            ]);

            return Redirect::route('admin.beneficiarios.edit',$id)->with('successDocuments',"<strong>Actualizacion</strong> Existosa");
            //  ********** END UPLOAD THE DOCUMENTS**********

        }
        Activity::log([
            'contentId'   => $id,
            'contentType' => 'Beneficiario',
            'user_id'     => Auth::admin()->get()->id,
            'action'      => 'Update',
            'description' => 'Actualizacion '. Input::get('updateType'),
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $id ? true : false
        ]);
        //-------Documents info Details Update END--------
        return Response::json($output, 200);
    }

    public function export(){
        $ben   =   Beneficiario::join('objetivo', 'beneficiarios.objetivo', '=', 'objetivo.id')
            ->join('destino', 'destino.id', '=', 'objetivo.destID')
            ->leftJoin('zonificacion_beneficiario', 'zonificacion_beneficiario.beneficiarioID', '=', 'beneficiarios.beneficiarioID')
            ->select('beneficiarios.id','beneficiarios.beneficiarioID',
                'beneficiarios.nombres','beneficiarios.apellidos', 'destino.destino as Destino', 'objetivo.objetivo as Objetivo',
                'beneficiarios.telefono','beneficiarios.fechanac',
                'beneficiarios.fechaing','beneficiarios.direccion','beneficiarios.direccionperm','beneficiarios.status',
                'beneficiarios.fecha_desvinculacion',
                'zonificacion_beneficiario.departamento','zonificacion_beneficiario.zona','zonificacion_beneficiario.otros'
            )->orderBy('beneficiarios.apellidos','asc')
            ->get()->toArray();

        $data = $ben;

        Excel::create('ong'.time(), function($excel) use($data) {

            $excel->sheet('Beneficiarios', function($sheet) use($data) {

                $sheet->fromArray($data);

            });

        })->store('xls')->download('xls');

        Activity::log([
            'contentId'   => 'All',
            'user_id'     => Auth::admin()->get()->id,
            'contentType' => 'Beneficiario',
            'action'      => 'Export ',
            'description' => 'Exportacion de Beneficiarios',
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     =>  false
        ]);
    }
    /**
     * Remove the specified  from storage.
     */

    public function destroy($id)
    {
        Beneficiario::where('beneficiarioID', '=', $id)->delete();
        Activity::log([
            'contentId'   => $id,
            'user_id'     => Auth::admin()->get()->id,
            'contentType' => 'Beneficiario',
            'action'      => 'Borrado de Beneficiario ',
            'description' => 'Eliminacion de un Beneficiario',
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $id ? true : false
        ]);
        $output['success']  =   'deleted';
        return Response::json($output, 200);
    }
}