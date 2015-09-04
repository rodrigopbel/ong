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
//            //  ********** END UPLOAD THE DOCUMENTS**********

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
            $validator = Validator::make($input = Input::all(), Personal::rules('create'));
            if ($validator->fails())
            {
                $output['status']   =   'error';
                $output['msg']      =   $validator->getMessageBag()->toArray();
            }else{
                $bank_details = Bank_detail::firstOrNew(['employeeID' => $id]);
                $bank_details->accountName   = Input::get('accountName');
                $bank_details->accountNumber = Input::get('accountNumber');
                $bank_details->bank          = Input::get('bank');
                $bank_details->pan           = Input::get('pan');
                $bank_details->ifsc          = Input::get('ifsc');
                $bank_details->branch        = Input::get('branch');
                $bank_details->save();
                $output['status'] = 'success';
                $output['msg'] = 'Bank details updated successfully';
            }
        }
        //-------Documents info Details Update END--------
        return Response::json($output, 200);
    }
    /**
     * Remove the specified employee from storage.
     */

    public function destroy($id)
    {
        Employee::where('employeeID', '=', $id)->delete();
        $output['success']  =   'deleted';
        return Response::json($output, 200);
    }





}
