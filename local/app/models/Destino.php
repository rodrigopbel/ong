<?php

class Destino extends \Eloquent {

    protected $fillable = [];
    protected $table    =   'destino';
    protected $guarded  = ['id'];

    protected function department()
    {
        return $this->belongsTo('Objetivo','desID','id');
    }
}