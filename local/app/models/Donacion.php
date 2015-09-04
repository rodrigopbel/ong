<?php

class Donacion extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		//'ayudaName'      =>  'required',
       // 'beneficiarioID' =>  'required',
       'aportanteID'    =>  'required'

	];

	// Don't forget to fill this array
    protected $guarded = ['id'];
//    protected $fillable = ['username', 'email', 'password'];

    public function aportanteDetails(){

        return $this->belongsTo('Personal','personalID','personalID');
    }

}