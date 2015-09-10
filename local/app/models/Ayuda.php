<?php

class Ayuda extends \Eloquent {

	// Add your validation rules here
    protected $table = "ayudas";
	public static $rules = [
		//'ayudaName'      =>  'required',
        'beneficiarioID' =>  'required',
       // 'aportanteID'    =>  'required'

	];

	// Don't forget to fill this array
    protected $guarded = ['id'];
//    protected $fillable = ['username', 'email', 'password'];


    public function beneficiarioDetails(){

        return $this->belongsTo('Beneficiario','beneficiarioID','beneficiarioID');
    }
    
}