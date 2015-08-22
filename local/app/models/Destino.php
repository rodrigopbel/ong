<?php

class Destino extends \Eloquent {

    public static $rules = [
        'destino' => 'required|unique:destino,destino,:id',
        "objetivo.0"=>'required',
    ];



    protected $table="destino";

    // Don't forget to fill this array
    protected $fillable = [];

    protected $guarded  =   ['id'];

    public static function rules($id=false,$merge=[])
    {
        $rules = self::$rules;
        if ($id) {
            foreach ($rules as &$rule) {
                $rule = str_replace(':id', $id, $rule);
            }
        }
        return array_merge( $rules, $merge );
    }


    protected  function objetivos(){
        return $this->hasMany('Objetivo','destID','id');
    }


}