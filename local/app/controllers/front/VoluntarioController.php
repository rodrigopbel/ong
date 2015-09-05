<?php

class VoluntarioController extends \BaseController {
    public function __construct()
    {
        parent::__construct();
        setlocale(LC_ALL,"es_ES");
        $this->data['reportOpen'] ='active open';
        $this->data['pageTitle'] =  'Reportes';
    }
    public function index()
    {
        $this->data['reporteActive']    =   'active';
        return View::make('front.voluntario');
    }

    public function store()
    {
        return "guardado exitoso";
    }


}