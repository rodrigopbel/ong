<?php

class Bendocumentos extends \Eloquent {
	protected $fillable = [];
    protected $guarded  =['id'];
	protected $table  = 'beneficiario_documentos';

	public function benDetalles(){

		return $this->belongsTo('Beneficiario','beneficiarioID','beneficiarioID');
	}
}