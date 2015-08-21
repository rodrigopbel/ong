<?php

class Objetivo extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
        'objname' => 'required|unique:objetivo,objname,:id',
        "destino.0"=>'required',
    ];



    protected $table="objetivo";

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


    protected  function Designations(){
        return $this->hasMany('Destino','desID','id');
    }


}