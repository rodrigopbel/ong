<?php
class Personal extends Eloquent {

    protected $table="personal";
    protected $guarded = ['id'];
    protected $hidden  = ['password'];
    // Validation Rules
    public static function rules($action,$id=false, $merge=[])
	{
		$nombresValidation       = 'required';
		$apellidosValidation     = 'required';
		$fotoPersonalValidation  = 'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:4000';
		$rules = [
		'create' => [
			'personalID'    =>  'required|unique:personal,personalID|alpha_dash',
			'nombres'       =>  $nombresValidation,
			'apellidos'     =>  $apellidosValidation,
			'email'         =>  'required|email|unique:personal',
			'password'      =>  'required',
			'fotoPersonal'  =>  $fotoPersonalValidation
		],

		'update'=>[
			'personalID'   =>   "required|unique:personal,personalID,:id"
		],
		'password' =>  [
			'password'              =>  'required|confirmed',
			'password_confirmation' =>  'required|min:5'
		],
		'personalInfo'=>[
			'nombres'       =>   $nombresValidation,
			'apellidos'     =>   $apellidosValidation,
			'email'         =>   "required|email|unique:employees,email,:id",
			'profileImage'  =>   $fotoPersonalValidation,
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

}