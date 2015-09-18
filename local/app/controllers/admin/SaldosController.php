<?php

class SaldosController extends \AdminBaseController {

    public function __construct()
    {
        parent::__construct();
        $this->data['saldosOpen'] ='active open';
        $this->data['pageTitle']  =  'Saldos';
    }
    public function index()
    {
        $this->data['saldosActive'] =   'active';
        $this->data['saldos']   = Saldo::all();
        return View::make('admin.saldos.index', $this->data);
    }
}