<?php

class ProfileSettingsController extends \AdminBaseController {


    public function __construct()
    {
        parent::__construct();
        $this->data['settingOpen']  =   'active open';
        $this->data['pageTitle']    =    'Perfil';
    }



	/**
	 * Show the form for editing the specified Admin.

	 */
	public function edit()
	{
		$this->data['admin'] = Admin::find(Auth::admin()->get()->id);
        $this->data['profileSettingActive']    =   'active';

		return View::make('admin.profile_settings.edit', $this->data);
	}

	/**
	 * Update the specified Admin in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$admin = Admin::findOrFail(Auth::admin()->get()->id);

        //name and email change
        if(Input::get('name'))
        {
            $validator = Validator::make($data = Input::all(), Admin::$rules);

            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            Session::flash('success','Nombre y Email Actualizados exitosamente');
        }
        // Password Change
        else
        {
            $validator = Validator::make($data = Input::all(), Admin::$rules_password);

            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
            $data['password']   =   Hash::make(Input::get('password'));
            Session::flash('success','Contraseña cambiada con éxito');

        }

            $admin->update($data);

		return Redirect::route('admin.profile_settings.edit',$id);
	}



}
