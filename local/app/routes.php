<?php
/*
 * Redefined Ind.
 */
# Beneficiario  Login
    Route::get('/',['as'=>'login','uses'=>'LoginController@index']);
    Route::post('/login',['as'=>'login','uses'=>'LoginController@ajaxLogin']);
    Route::get('logout', ['as'=>'front.logout','uses'=>'LoginController@logout']);


# Voluntarios Formulario
    Route::resource('voluntarios', 'VoluntarioController');
//Route::get('/voluntarios/register',['as'=>'voluntario.register','uses'=>'VoluntarioController@ajaxRegister']);
Route::post('/voluntarios/registrar',['as'=>'voluntario.registrar','uses'=>'VoluntarioController@registrar']);


# Beneficiario Panel
    Route::group(array('before' => 'auth.personales'), function()
    {
        Route::post('/change_password_modal',['as'=>'front.change_password_modal','uses'=>'DashboardController@changePasswordModal']);
        Route::post('/change_password',['as'=>'front.change_password','uses'=>'DashboardController@change_password']);
        Route::resource('dashboard','DashboardController');
    });

# Admin Login
Route::group(array('prefix' => 'admin'), function()
{
	Route::get('/',['as'=>'admin.getlogin','uses'=>'AdminLoginController@index']);
	Route::get('logout',['as'=>'admin.logout','uses'=> 'AdminLoginController@logout']);
    Route::post('login',['as'=>'admin.login','uses'=> 'AdminLoginController@ajaxAdminLogin']);


});


// Admin Panel After Login
Route::group(array('prefix' => 'admin','before' => 'auth.admin|lock'), function()
{

    //	Dashboard Routing
    //Route::resource('dashboard', 'AdminDashboardController');
    Route::resource('dashboard', 'AdminDashboardController',['as' => 'admin']);
    //  Destinos Routing
    Route::get('destinos/ajax_objetivos/',['as'=>'admin.destinos.ajax_objetivos','uses'=> 'DestinosController@ajax_objetivos']);
    Route::resource('destinos', 'DestinosController',['except' => ['show','create'],'as' => 'admin']);
    //    Beneficiarios Routing
    Route::get('beneficiarios/export',['as'=>'admin.beneficiarios.export','uses'=>'BeneficiariosController@export']);
    Route::get('beneficiarios/beneficiariosLogin/{id}',['as'=>'admin.beneficiarios.benLogin','uses'=>'BeneficiariosController@benLogin']);
    Route::resource('beneficiarios', 'BeneficiariosController',['except' => ['show'],'as' => 'admin']);
    //    Personal Routing
    Route::resource('personal', 'PersonalController',['except' => ['show'],'as' => 'admin']);
    Route::get('personales/personalesLogin/{id}',['as'=>'admin.personales.perLogin','uses'=>'PersonalController@perLogin']);
    //  Actividades Routing
    Route::get('ajax_actividades/',['as'=>'admin.ajax_actividades','uses'=> 'ActividadesController@ajax_actividades']);
    Route::resource('actividades', 'ActividadesController',['as' => 'admin']);
    //  Ayudas Routing
    Route::get('ajax_ayudas/',['as'=>'admin.ajax_ayudas','uses'=> 'AyudasController@ajax_ayudas']);
    Route::resource('ayudas', 'AyudasController',['as' => 'admin']);
    //  Donaciones Routing
    Route::get('ajax_donaciones/',['as'=>'admin.ajax_donaciones','uses'=> 'DonacionesController@ajax_donaciones']);
    Route::resource('donaciones', 'DonacionesController',['as' => 'admin']);
    //  Participaciones Routing
    Route::resource('participaciones', 'ParticipacionesController',['as' => 'admin']);
    // Saldos Routing
    Route::resource('saldos','SaldosController',['as' => 'admin']);
    // Reportes Routing
    Route::get('ajax_reportes/',['as'=>'admin.ajax_reportes','uses'=> 'ReportsController@ajax_reportes']);
    Route::resource('reportes','ReportsController',['as'=>'admin']);
    Route::get('ReporteBen',['as'=>'ReporteBen','uses'=>'ReportsController@ReporteBen']);
    Route::get('ReporteBen/{id}',['as'=>'ReporteBen','uses'=>'ReportsController@ReporteGen']);
    //  Logs Routing
    Route::resource('logs', 'LogsController',['except' => ['show'],'as' => 'admin']);
//    //  Awards Routing
//    Route::get('ajax_awards/',['as'=>'admin.ajax_awards','uses'=> 'AwardsController@ajax_awards']);
//    Route::resource('awards', 'AwardsController',['as' => 'admin']);
//
//    //  Department Routing
//    Route::get('departments/ajax_designation/',['as'=>'admin.departments.ajax_designation','uses'=> 'DepartmentsController@ajax_designation']);
//    Route::resource('departments', 'DepartmentsController',['except' => ['show','create'],'as' => 'admin']);




    //    Expense Routing
    Route::get('ajax_expenses/',['as'=>'admin.ajax_expenses','uses'=> 'ExpensesController@ajax_expenses']);
    Route::resource('expenses', 'ExpensesController',['except' => ['show'],'as' => 'admin']);

    //    Holiday Routing
    Route::get('holidays/mark_sunday', 'HolidaysController@Sunday');
    Route::resource('holidays', 'HolidaysController',['as' => 'admin']);

    //  Routing for the attendance
    Route::get('attendances/report/{attendances}', ['as'=>'admin.attendance.report','uses'=>'AttendancesController@report']);
    Route::resource('attendances', 'AttendancesController',['as' => 'admin']);

    //    Routing or the leavetypes
    Route::resource('leavetypes', 'LeavetypesController',['except'=>['show'],'as' => 'admin']);

    //    Leave Applications routing
    Route::get('leave_applications/ajaxApplications',['as'=>'admin.leave_applications','uses'=> 'LeaveApplicationsController@ajaxApplications']);
    Route::resource('leave_applications', 'LeaveApplicationsController',['except'=>['create','store','edit'],'as' => 'admin']);

    //   Routing for setting
    Route::resource('settings', 'SettingsController',['only'=>['edit','update'],'as' => 'admin']);

    //    Salary Routing
    Route::resource('salary','SalaryController',['only'=>['destroy','update','store'],'as' => 'admin']);

    //    Profile Setting
    Route::resource('profile_settings', 'ProfileSettingsController',['only'=>['edit','update'],'as' => 'admin']);

    //   Notification Setting

	Route::post('ajax_update_notification',['as'=>'admin.ajax_update_notification','uses'=> 'NotificationSettingsController@ajax_update_notification']);
    Route::resource('notificationSettings', 'NotificationSettingsController',['only'=>['edit','update'],'as' => 'admin']);

//    //  Notice Board
    Route::get('ajax_notices/',['as'=>'admin.ajax_notices','uses'=> 'NoticeboardsController@ajax_notices']);
    Route::resource('noticeboards', 'NoticeboardsController',['except'=>['show'],'as' => 'admin']);

});

// Lock Screen Routing
Route::get('screenlock', 'AdminDashboardController@screenlock');

//Event for updating the last login of user
Event::listen('auth.login', function($user)
{
    $user->last_login = new DateTime;
    $user->save();
});
