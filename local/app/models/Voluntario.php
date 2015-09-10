<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Voluntario extends Eloquent  implements UserInterface, RemindableInterface  {

//    protected $fillable = [];
	use UserTrait, RemindableTrait;
    protected $table="personal";

//    // Validation Rules
    public static function rules($action,$id=false, $merge=[])
	{
        $fullNameValidation     = 'required';

		$rules = [
		'create' => [
			'personalID'    =>  'required|unique:personal,personalID|numeric',
			'nombres'       =>  $fullNameValidation,
			'apellidos'     =>  $fullNameValidation,
            'email'         =>  'required|email',
            'tipoPersonal'  =>  'required',

		],
        'update'=>[
            'personalID'   =>   "required|unique:personal,personalID,:id"
        ],
        'password' =>  [
			'password'              =>  'required|confirmed',
            'password_confirmation' =>  'required|min:5'
		],
		'personalInfo'=>[
			'nombres'       =>   $fullNameValidation,
			'apellidos'     =>   $fullNameValidation,
            'email'        =>   "required|email",
			'fotoPersonal'  =>   $ProfileImageValidation,
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

        protected $guarded = ['id'];
        protected $hidden  = ['password'];


    public function getayudas()
    {
        return $this->hasMany('Ayuda','aportanteID','personalID');
    }

    public function getdonaciones()
    {
        return $this->hasMany('Donacion','aportanteID','personalID');
    }
}