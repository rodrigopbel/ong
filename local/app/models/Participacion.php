<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Participacion extends Eloquent  {

    protected $table="participaciones";

    public function voluntarios()
    {
        return $this->hasMany('Personal','personalID','voluntarioID');
    }
}