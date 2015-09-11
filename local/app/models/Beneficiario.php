<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Beneficiario extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;
	protected $table="beneficiarios";
	// Validation Rules
	public static function rules($action,$id=false, $merge=[])
	{
		$fullNameValidation     = 'required';
		$ProfileImageValidation = 'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:4000';

		$rules = [
		'create' => [
			'beneficiarioID'         =>  'required|unique:beneficiarios,beneficiarioID|alpha_dash',
			'nombres'                =>  $fullNameValidation,
			'apellidos'              =>  $fullNameValidation,
//			'email'                  =>  'required|email|unique:beneficiarios',
//			'password'               =>  'required',
            'genero'                 =>  'required',
            'telefono'               =>  'required',
            'direccion'        		 =>  'required',
			'foto'  				 =>  $ProfileImageValidation,
			'perfil'                 =>  'max:1000',
			'solicitud'              =>  'max:1000',
			'certnac'                =>  'max:1000',
			'croquis'                =>  'max:1000',
			'CIprueba'               =>  'max:1000',
		],

		'update'=>[
			'beneficiarioID'   =>   "required|unique:beneficiarios,beneficiarioID,:id"
		],

//		'password' =>  [
//			'password'              =>  'required|confirmed',
//			'password_confirmation' =>  'required|min:5'
//		],

		'zonificacion' => [
			'departamento'   =>   'required',
			'zona' 			=>   'required'
		],

		'personalInfo'=>[
			'nombres'      =>   $fullNameValidation,
			'apellidos'    =>   $fullNameValidation,
//			'email'        =>   "required|email|unique:beneficiarios,email,:id",
			'foto'         =>   $ProfileImageValidation,
		],

	];

		$rules = $rules[$action];

		if ($id) {
			foreach ($rules as &$rule) {
				$rule = str_replace(':id', $id, $rule);
			}
		}

		return array_merge( $rules, $merge );
	}



	// Don't forget to fill this array
    protected $guarded = ['id'];

//	protected $hidden  = ['password'];

    //Nuevos

	public function getObjetivo()
	{
		// belongs('OtherClass','thisclasskey','otherclasskey')
		return $this->belongsTo('Objetivo','objetivo','id');
	}


	public function getDocuments()
	{
		return $this->hasMany('Bendocumentos','beneficiarioID','beneficiarioID');
	}

	public function getSoldonacion()
	{
		return $this->hasMany('Soldonacion','beneficiarioID','beneficiarioID');
	}
    public function getDesignation()
    {
       // belongs('OtherClass','thisclasskey','otherclasskey')
       return $this->belongsTo('Designation','designation','id');
    }


    public static function  currentMonthBirthday()
    {
        $birthdays = Employee::select('fullName', 'date_of_birth','profileImage')
                ->whereRaw("MONTH(date_of_birth) = ?", [date('m')])
                ->where('status','=','active')
	            ->orderBy('date_of_birth','asc')

                ->get();
        return $birthdays;
    }
	//Function to calculate number of days of work
	public function workDuration($employeeID)
	{
		$employee = Employee::select('joiningDate','exit_date')->where('employeeID','=',$employeeID)->first();
		$lastDate   =   ($employee->exit_date==NULL)?date('Y-m-d'):$employee->exit_date;

		$diff = date_diff(date_create($employee->joiningDate),date_create($lastDate));

		$difference = ($diff->y==0)?null:$diff->y.' year ';
		$difference .= ($diff->m==0)?null:$diff->m.' month ';
		$difference .= ($diff->d==0)?null:$diff->d.' day ';
		return $difference;
	}
	//Function to calculate number of days of work
	public function duracionVinculacion($benID)
	{
		$ben = Beneficiario::select('fechaing','fecha_desvinculacion')->where('beneficiarioID','=',$benID)->first();
		$lastDate   =   ($ben->fecha_desvinculacion==NULL)?date('Y-m-d'):$ben->fecha_desvinculacion;

		$diff = date_diff(date_create($ben->fechaing),date_create($lastDate));

		$difference = ($diff->y==0)?null:$diff->y.' A&Ntildeo(s) ';
		$difference .= ($diff->m==0)?null:$diff->m.' mes(es) ';
		$difference .= ($diff->d==0)?null:$diff->d.' dia(s) ';

		return $difference;

	}

	/**
	 * Get the last absent days
	 * If the user is not absent since joining then.Joining date is last absent date
	 */
	public function lastAbsent($employeeID,$type='days'){
		$absent =   Attendance::where('status','=','absent')
		                      ->where('employeeID','=',$employeeID)
		                      ->where(function($query)
		                      {
			                      $query->where('application_status','=','approved')
			                            ->orWhere('application_status','=',null);
		                      })->orderBy('date', 'desc')->first();

		$joiningDate = Employee::select('joiningDate')->where('employeeID','=',$employeeID)->first();

		$lastDate   =   date('Y-m-d');
		$old_date   =   isset($absent->date)?$absent->date:$joiningDate->joiningDate;
		$diff       =   date_diff(date_create($old_date),date_create($lastDate));

		$difference = $diff->format('%R%a').' day ago';
		if($type == 'days'){
			return $difference;
		}elseif($type   ==  'date'){
			return date_create($old_date)->format('d-M-Y');
		}
	}

    public function zonificacion()
    {
        return $this->hasOne('Zonificacion','beneficiarioID','beneficiarioID');
    }

    public function responsable()
    {
        return $this->hasMany('Personal', 'personalID', 'responsableID');
    }

    public function ayudas()
    {
        return $this->hasMany('Ayuda','beneficiarioID','beneficiarioID');
    }

    public function donaciones()
    {
        return $this->hasMany('Donacion','beneficiarioID','beneficiarioID');
    }

}