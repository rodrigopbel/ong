<?php

class Zonificacion extends \Eloquent {
	protected $fillable = [];
    protected $guarded=[''];
	protected $table ='zonificacion_beneficiario';
	public function beneficiariosDetails(){

		return $this->belongsTo('Beneficiario','beneficiarioID','beneficiarioID');
	}
    public function beneficiario()
    {
        return $this->belongsTo('Beneficiario');
    }
}