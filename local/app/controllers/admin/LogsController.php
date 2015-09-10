<?php


class LogsController extends \AdminBaseController {

    /**
     * Constructor for the Employees
     */

    public function __construct()
    {
        parent::__construct();
        $this->data['logsOpen'] =   'active open';
        $this->data['pageTitle']     =   'Logs';
        dd("error");
    }

    public function index()
    {
        $this->data['logs']       =   Log::all();
        Debugbar::info($this->data['logs'] );
        $this->data['logsActive'] =   'active';

        return View::make('admin.logs.index', $this->data);
    }



}
