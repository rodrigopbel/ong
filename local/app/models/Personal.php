<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Employee extends Eloquent {
	// Validation Rules
    protected $table="personal";
	public static function rules($action,$id=false, $merge=[])
	{
		$nombresValidation     = 'required';
		$apellidosValidation     = 'required';
		$fotoPersonalValidation = 'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:4000';

		$rules = [
		'create' => [
			'personalID'    =>  'required|unique:employees,employeeID|alpha_dash',
			'nombres'       =>  $nombresValidation,
			'apellidos'     =>  $apellidosValidation,
			'email'         =>  'required|email|unique:employees',
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
			'nombres'      =>   $nombresValidation,
			'apellidos'      =>   $apellidosValidation,
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
	// Don't forget to fill this array
    protected $guarded = ['id'];
	protected $hidden  = ['password'];
}