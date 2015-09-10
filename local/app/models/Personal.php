<?php
class Personal extends Eloquent  implements UserInterface {

//    protected $fillable = [];
    protected $table="personal";

//    // Validation Rules
    public static function rules($action,$id=false, $merge=[])
	{
        $fullNameValidation     = 'required';
        $ProfileImageValidation = 'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:4000';
		$rules = [
		'create' => [
			'personalID'    =>  'required|unique:personal,personalID|numeric',
			'nombres'       =>  $fullNameValidation,
			'apellidos'     =>  $fullNameValidation,
		    'genero'        =>  'required',
            'email'         =>  'required|email',
            'password'      =>  'required',
			'fotoPersonal'  =>  $ProfileImageValidation
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


    public function getBeneficiario()
    {
        return $this->has('Beneficiario','beneficiarioID','beneficiarioID');
    }

    public function donaciones()
    {
        return $this->hasMany('Donacion','aportanteID','personalID');
    }
}