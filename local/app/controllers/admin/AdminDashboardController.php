<?php

//Admin Dashboard controller

class AdminDashboardController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->data['dashboardActive'] = 'active';
        $this->data['pageTitle']       = 'Dashboard';

    }

// Dashboard view page   controller
    public function index()
    {
        $this->data['holidays'] =   Holiday::all();
        $attendance   = Attendance::where(function($query)
        {
            $query->where('application_status','=','approved')
                ->orwhere('application_status','=',null)
                ->orwhere('status','=','present');
        })->get();

        $this->data['pending_applications']   = Attendance::where('application_status','=','pending')->get();
        $at =   array();
        $final = array();
        foreach($attendance as $attend)
        {
            $at[$attend->date]['status'][]  =   $attend->status;
            $at[$attend->date]['employee'][]  =   $attend->employeeDetails->fullName;
        }

        foreach($at as $index=>$att){

            if(in_array('absent',$att['status'])) {
                foreach ($att['employee'] as $index_emp=>$employee){
                    if($att['status'][$index_emp]=='absent')
                        $final[$index][] = $employee;
                }

            }else
            {
                $final[$index][] = 'all present';
            }

        }

        $this->data['attendance']   = $final;


        //Expense Calculation
        $expense = DB::select( DB::raw("SELECT sum(price) as sum,m.month
     FROM (
           SELECT 1 AS MONTH
           UNION SELECT 2 AS MONTH
           UNION SELECT 3 AS MONTH
           UNION SELECT 4 AS MONTH
           UNION SELECT 5 AS MONTH
           UNION SELECT 6 AS MONTH
           UNION SELECT 7 AS MONTH
           UNION SELECT 8 AS MONTH
           UNION SELECT 9 AS MONTH
           UNION SELECT 10 AS MONTH
           UNION SELECT 11 AS MONTH
           UNION SELECT 12 AS MONTH
          ) AS m
LEFT JOIN `expenses` u
ON m.month = MONTH(purchaseDate)
   AND YEAR(purchaseDate) = YEAR(CURDATE())

GROUP BY m.month
ORDER BY month ;"));


        foreach($expense as $ex){
            $expensevalue[] = isset($ex->sum)?$ex->sum:"''";
        }
        $this->data['expense'] = implode(',',$expensevalue);


        return View::make('admin/dashboard',$this->data);

    }



    /*    Screen lock controller.When screen lock button from menu is cliked this controller is called.
    *     lock variable is set to 1 when screen is locked.SET to 0  if you dont want screen variable
    */
    public function screenlock()
    {
        Session::put('lock', '1');
        return View::make("admin/screen_lock",$this->data);
    }

    public function create()
    {
        $this->data['personalActive']  =   'active';
        return View::make('admin.personal.createAdministrador',$this->data);
    }
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
}