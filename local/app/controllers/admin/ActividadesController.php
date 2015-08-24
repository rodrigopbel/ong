<?php

class ActividadesController extends \AdminBaseController {



    public function __construct()
    {
        parent::__construct();
        $this->data['actividadOpen'] ='active open';
        $this->data['pageTitle'] =  'Actividad';

        for ($m=1; $m<=12; $m++)
        {
            $month[] = date('F', mktime(0,0,0,$m, 1, date('Y')));
        }
        $this->data['months']       =   $month;
        $this->data['currentMonth'] =   date('F');
    }

    public function index()
    {
        $this->data['actividades']         =   Actividad::orderBy('date', 'ASC')->get();;
        $this->data['actividadActive']    =   'active';
        $hol        = array();

        $year       = date("Y");
        $dateArr    = $this->getDateForSpecificDayBetweenDates($year.'-01-01', $year.'-12-31', 0);
        $this->data['number_of_sundays']  =   count($dateArr);

        $this->data['actividades_in_db']      =  count($this->data['actividades']);

        foreach($this->data['actividades'] as $holiday)
        {
            $hol[date('F', strtotime($holiday->date))]['id'][] = $holiday->id;
            $hol[date('F', strtotime($holiday->date))]['date'][] = date('d F Y', strtotime($holiday->date));
            $hol[date('F', strtotime($holiday->date))]['ocassion'][] = $holiday->occassion;
            $hol[date('F', strtotime($holiday->date))]['day'][] = date('D', strtotime($holiday->date));
        }
        $this->data['actividadArray'] = $hol;
        return View::make('admin.actividades.index', $this->data);
    }

    /**
     * Show the form for creating a new holiday
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.actividades.create');
    }

    /**
     * Store a newly created holiday in storage.
     *
     * @return Response
     */
    public function store()
    {
        Cache::forget('actividad_cache');
        $validator = Validator::make($input = Input::all(), Actividad::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $holiday = array_combine($input['date'], $input['occasion']);

        foreach ($holiday as $index => $value){
            if($index =='')continue;
            $add     =  Actividad::firstOrCreate([
                'date' => date('Y-m-d',strtotime( $index)),

            ]);

            $holi = Actividad::find($add->id);
            $holi->occassion = $value;
            $holi->save();
        }
        return Redirect::route('admin.actividades.index')->with('success',"<strong>New Holidays</strong> successfully added to the Database");
    }

    /**
     * Display the specified holiday.
     */
    public function show($id)
    {
        $holiday = Actividad::findOrFail($id);

        return View::make('admin.actividades.show', compact('actividad'));
    }

    /**
     * Show the form for editing the specified holiday.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $holiday = Actividad::find($id);

        return View::make('admin.actividades.edit', compact('actividad'));
    }

    /**
     * Update the specified holiday in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        Cache::forget('actividad_cache');
        $holiday = Actividad::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Actividad::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $holiday->update($data);

        return Redirect::route('admin.actividades.index');
    }

    /**
     * Remove the specified holiday from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Actividad::destroy($id);
        $output['success']  =   'deleted';

        Cache::forget('actividad_cache');
        return Response::json($output, 200);
    }

    public function Sunday()
    {
        Cache::forget('actividad_cache');

        $year   = date("Y");
        $dateArr = $this->getDateForSpecificDayBetweenDates($year.'-01-01', $year.'-12-31', 0);

        foreach($dateArr as $date)
        {
            Actividad::firstOrCreate([
                'date'  =>  $date,
                'occassion' =>'Sunday'
            ]);
        }


        return Redirect::route('admin.actividades.index')->with('success',"<strong>All Sundays</strong> successfully added to the Database");;;
    }

    public  function getDateForSpecificDayBetweenDates($startDate, $endDate, $weekdayNumber)
    {
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        $dateArr = array();

        do
        {
            if(date("w", $startDate) != $weekdayNumber)
            {
                $startDate += (24 * 3600); // add 1 day
            }
        } while(date("w", $startDate) != $weekdayNumber);


        while($startDate <= $endDate)
        {
            $dateArr[] = date('Y-m-d', $startDate);
            $startDate += (7 * 24 * 3600); // add 7 days
        }

        return($dateArr);
    }
}
