<?php

//Admin Dashboard controller

class AdminDashboardController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->data['dashboardActive'] = 'active';
        $this->data['dashboardOpen'] =   'active open';
        $this->data['pageTitle']       = 'Dashboard';
    }

// Dashboard view page   controller
    public function index()
    {


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

        $this->data['administradores'] = Admin::all();
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
        $this->data['dashboardActive'] =   'active';
        return View::make('admin.create',$this->data);
    }

    public function store()
    {
        $rules = array('nombreAdmin' =>'required', 'apellidoAdmin'=>'required','emailAdmin'=>'required|email','passwordAdmin'=>'required');
        $validator = Validator::make($input = Input::all(), $rules);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $filename   =   null;
            $fullname = $input['nombreAdmin'] . " " . $input['apellidoAdmin'];

            Admin::create([
                'name'            => $fullname,
                'email'           => $input['emailAdmin'],
                'password'        => Hash::make($input['passwordAdmin'])
            ]);

        }catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
        Activity::log([
            'contentId'   => $input['emailAdmin'],
            'contentType' => 'Administrador',
            'action'      => 'Creacion',
            'user_id'     => Auth::admin()->get()->id,
            'description' => 'Creacion del un Administrador',
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $input['emailAdmin'] ? true : false
        ]);
        DB::commit();
        return Redirect::route('admin.dashboard.index')->with('success',"<strong>{$fullname}</strong> exitosamente adicionado en le base de datos");;
    }
    public function destroy($id)
    {
        Admin::where('id', '=', $id)->delete();
        Activity::log([
            'contentId'   => $id,
            'user_id'     => Auth::admin()->get()->id,
            'contentType' => 'Administrador',
            'action'      => 'Delete ',
            'description' => 'Eliminacion',
            'details'     => 'Usuario: '. Auth::admin()->get()->name,
            'updated'     => $id ? true : false
        ]);
        $output['success']  =   'deleted';
        return Response::json($output, 200);
    }

}