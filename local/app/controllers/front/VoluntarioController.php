<?php

class VoluntarioController extends \BaseController {

    public function index()
    {

        return View::make('front.voluntario');
    }

    public function store()
    {
        return "guardado exitoso";
    }


}