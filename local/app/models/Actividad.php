<?php

class Actividad extends \Eloquent {
    // Add your validation rules here
    public static $rules = [
        'date.0' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = [];
    protected $guarded  =   ['id'];
    protected $table = 'actividades';
}