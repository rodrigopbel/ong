<?php

class Soldonacion extends \Eloquent {

	 public  static $rules = [
		'type'   =>  'required',
		'salary' =>  'required'
	];
	protected $fillable = [];
    protected $table ='solicitud_donacion';
    protected $guarded = ['id'];
}