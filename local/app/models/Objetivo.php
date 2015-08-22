<?php

class Objetivo extends \Eloquent {

    // Add your validation rules here

protected $fillable = [];
protected $table    =   'objetivo';
protected $guarded  = ['id'];

protected function destinos()
{
    return $this->belongsTo('Destino','destID','id');
}
}