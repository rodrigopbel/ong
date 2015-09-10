<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Log extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;
    protected $table="activity_log";
    // Validation Rules
//    public static function rules($action,$id=false, $merge=[])
//    {
//        $fullNameValidation     = 'required';
//        $ProfileImageValidation = 'image|mimes:jpeg,jpg,png,bmp,gif,svg|max:4000';
//
//        $rules = [
//            'create' => [
//                'beneficiarioID'         =>  'required|unique:beneficiarios,beneficiarioID|alpha_dash',
//                'nombres'                =>  $fullNameValidation,
//                'apellidos'              =>  $fullNameValidation,
//                'email'                  =>  'required|email|unique:beneficiarios',
//                'password'               =>  'required',
//                'genero'                 =>  'required',
//                'telefono'               =>  'required',
//                'direccion'        		 =>  'required',
//                'foto'  				 =>  $ProfileImageValidation,
//                'perfil'                 =>  'max:1000',
//                'solicitud'              =>  'max:1000',
//                'certnac'                =>  'max:1000',
//                'croquis'                =>  'max:1000',
//                'CIprueba'               =>  'max:1000',
//            ],
//
//            'update'=>[
//                'beneficiarioID'   =>   "required|unique:beneficiarios,beneficiarioID,:id"
//            ],
//
//            'password' =>  [
//                'password'              =>  'required|confirmed',
//                'password_confirmation' =>  'required|min:5'
//            ],
//
//            'zonificacion' => [
//                'departamento'   =>   'required',
//                'zona' 			=>   'required'
//            ],
//
//            'personalInfo'=>[
//                'nombres'      =>   $fullNameValidation,
//                'apellidos'    =>   $fullNameValidation,
//                'email'        =>   "required|email|unique:beneficiarios,email,:id",
//                'foto'         =>   $ProfileImageValidation,
//            ],
//
//        ];
//
//        $rules = $rules[$action];
//
//        if ($id) {
//            foreach ($rules as &$rule) {
//                $rule = str_replace(':id', $id, $rule);
//            }
//        }
//
//        return array_merge( $rules, $merge );
//    }
//


    // Don't forget to fill this array
    protected $guarded = ['id'];

    protected $hidden  = ['password'];

    //Nuevos

//    public function getObjetivo()
//    {
//        // belongs('OtherClass','thisclasskey','otherclasskey')
//        return $this->belongsTo('Objetivo','objetivo','id');
//    }


//    public function getDocuments()
//    {
//        return $this->hasMany('Bendocumentos','beneficiarioID','beneficiarioID');
//    }
//
//    public function getSoldonacion()
//    {
//        return $this->hasMany('Soldonacion','beneficiarioID','beneficiarioID');
//    }
//    public function getDesignation()
//    {
//        // belongs('OtherClass','thisclasskey','otherclasskey')
//        return $this->belongsTo('Designation','designation','id');
//    }
//    public function getAwards()
//    {
//        return $this->hasMany('Award','employeeID','employeeID');
//    }
//    public function getBankDetail()
//    {
//        return $this->belongsTo('Bank_detail','employeeID','employeeID');
//    }
//

}