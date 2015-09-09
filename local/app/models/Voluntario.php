<?php

class Voluntario extends \Eloquent {

	// Add your validation rules here
    protected $table = "personal";
	public static $rules = [

            'nombres'     => 'required',
            'apellidos'   => 'required',
            'ci'          => 'required|ci|unique:personal',
            'telefono'    => 'required',
            'email'	      => 'required|email'
	];

	// Don't forget to fill this array
    protected $guarded = ['id'];
//    protected $fillable = ['username', 'email', 'password'];





}