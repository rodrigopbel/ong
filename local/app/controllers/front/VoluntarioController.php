<?php

class VoluntarioController extends \BaseController {

    public function index()
    {
       return 'formulario de voluntario';
    }









// Ajax leave application view show
    public function show($id)
    {

        $this->data['leave_application']    =   Attendance::find($id);
        return View::make('front.leave_modal_show',$this->data);
    }



}