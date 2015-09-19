<?php


class LogsController extends \AdminBaseController {
     public function __construct()
    {
        parent::__construct();
        $this->data['logsOpen'] =   'active open';
        $this->data['pageTitle']     =   'Logs';
    }
    public function index()
    {
        $this->data['logs']  =  Activity::all();
        $this->data['logsActive'] =   'active';
        return View::make('admin.logs.index', $this->data);
    }
}
