<?php
use Illuminate\Support\Facades\DB;

/**
 * Class PersonalController
 * This Controller is for the all the related function applied on personal
 */
class PersonalController extends \AdminBaseController {
    /**
     * Constructor de Personal
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['personalOpen']  =   'active open';
        $this->data['pageTitle']     =   'Personal';
    }
    public function index()
    {
        $this->data['personales']       =    Personal::all();
        $this->data['personalActive']   =   'active';
        Debugbar::info($this->data['personales'] );
        return View::make('admin.personal.index', $this->data);
    }
    /**
     * Show the form for creating a new employee
     */
    public function create()
    {
        $this->data['personalActive']  =   'active';
        return View::make('admin.personal.create',$this->data);
//        dd("hola a todos");
    }
    /**
     * Store a newly created employee in storage
     */
    public function store()
    {
//        dd(Input::all());
//        dd("cerca a la calidacion");
        $validator = Validator::make($input = Input::all(), Personal::rules('create'));
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        dd($validator);
    }
    /**
     * Show the form for editing the specified employee
     */
    public function edit($id)
    {
        $this->data['employeesActive']  =   'active';
        $this->data['department']       =   Department::lists('deptName','id');
        $this->data['employee']         =   Employee::where('employeeID', '=' ,$id)->get()->first();
        $this->data['designation']      =   Designation::find($this->data['employee']->designation);

        $doc = [];
        foreach($this->data['employee']->getDocuments as $documents)
        {
            $doc[$documents->type] =  $documents->fileName ;
        }
        $this->data['documents']  =   $doc;
        $this->data['bank_details']     =   Bank_detail::where('employeeID', '=' ,$id)->get()->first();
        return View::make('admin.employees.edit', $this->data);
    }
    /**
     * Update the specified employee in storage.
     */
    public function update($id)
    {
        //----Bank Details Update-------
        if(Input::get('updateType')=='bank')
        {
            $validator = Validator::make($input = Input::all(), Employee::rules('bank'));
            if ($validator->fails())
            {
                $output['status']   =   'error';
                $output['msg']      =   $validator->getMessageBag()->toArray();
            }else{
                $bank_details = Bank_detail::firstOrNew(['employeeID' => $id]);
                $bank_details->accountName   = Input::get('accountName');
                $bank_details->accountNumber = Input::get('accountNumber');
                $bank_details->bank          = Input::get('bank');
                $bank_details->pan           = Input::get('pan');
                $bank_details->ifsc          = Input::get('ifsc');
                $bank_details->branch        = Input::get('branch');
                $bank_details->save();
                $output['status'] = 'success';
                $output['msg'] = 'Bank details updated successfully';
            }
        }
        //-------Bank Details Update End--------
        //-------Company Details Update Start--------
        else if(Input::get('updateType')=='company')
        {
            $company_details = Employee::where('employeeID','=', $id)->first();
            $validator = Validator::make($input = Input::all(), Employee::rules('update',$company_details->id));
            if ($validator->fails())
            {
                $output['status']   =   'error';
                $output['msg']      =   $validator->getMessageBag()->toArray();
            }else{
                $company_details->employeeID  = $id;
                $company_details->designation = Input::get('designation');
                $company_details->joiningDate = date('Y-m-d',strtotime(Input::get('joiningDate')));
                $company_details->exit_date   = (trim(Input::get('exit_date'))!='')?date('Y-m-d',strtotime(Input::get('exit_date'))):null;

                $company_details->status      = (Input::get('status')!='active')?'inactive':'active';
                $company_details->save();
                if(isset($input['salary']))
                {
                    foreach ($input['salary'] as $index => $value)
                    {
                        $salary_details = Salary::find($index);
                        $salary_details->type = $input['type'][$index];
                        $salary_details->salary = $value;
                        $salary_details->save();
                    }
                }
                $output['status'] = 'success';
                $output['msg']    = 'Company Details updated successfully';
            }
        }
        //-------Company Details Update End--------------
        //-------Personal info Details Update Start----------
        else if(Input::get('updateType')=='personalInfo')
        {
            $employee   =   Employee::where('employeeID','=',$id)->get()->first();
            $validator = Validator::make($data = Input::all(),Employee::rules('personalInfo',$employee->id));
            if ($validator->fails())
            {
                return Redirect::back()->with(['errorPersonal' => $validator->messages()->all()])->withInput();
            }
            $input  =   Input::all();
            $name   = explode(' ', $input['fullName']);
            $firstName = ucfirst($name[0]);
            $password = ($data['password']!='')?Hash::make(Input::get('password')):$data['oldpassword'];
            // Profile Image Upload
            if (Input::hasFile('profileImage'))
            {
                $path       = public_path()."/profileImages/";
                File::makeDirectory($path, $mode = 0777, true, true);
                $image 	    = Input::file('profileImage');
                $extension  = $image->getClientOriginalExtension();
                $filename	= "{$firstName}_{$id}.".strtolower($extension);
                //Image::make($image->getRealPath())->resize(872,724)->save("$path$filename");
                Image::make($image->getRealPath())
                    ->fit(872, 724, function ($constraint) {
                        $constraint->upsize();
                    })->save($path . $filename);
            }else
            {
                $filename   =   Input::get('hiddenImage');
            }
                $employee->update(
                [
                    'fullName'      => ucwords(strtolower($input['fullName'])),
                    'fatherName'    => ucwords(strtolower($input['fatherName'])),
                    'gender'        => $input['gender'],
                    'email'         => $input['email'],
                    'password'      => $password,
                    'date_of_birth' => (trim(Input::get('date_of_birth'))!='')?date('Y-m-d',strtotime(Input::get('date_of_birth'))):null,
                    'mobileNumber'  => $input['mobileNumber'],
                    'localAddress'  => $input['localAddress'],
                    'permanentAddress' => $input['permanentAddress'],
                    'profileImage'     => $filename,
                ]);
            return Redirect::route('admin.employees.edit',$id)->with('successPersonal',"<strong>Success</strong> Updated Successfully");
        }
        //-------Personal Details Update End-------------
        //-------Documents info Details Update Start--------
        else if(Input::get('updateType')=='documents')
        {
            // -------------- UPLOAD THE DOCUMENTS  -----------------
            $documents  =   ['resume','offerLetter','joiningLetter','contract','IDProof'];

            foreach ($documents as $document) {
                if (Input::hasFile($document)) {

                    $path = public_path()."/employee_documents/{$document}/";
                    File::makeDirectory($path, $mode = 0777, true, true);

                    $file 	= Input::file($document);
                    $extension  = $file->getClientOriginalExtension();

                    $employee   =   Employee::where('employeeID','=',$id)->get()->first();
                    $nameArray  =   explode(' ',$employee->fullName);
                    $firstName  =   $nameArray[0];
                    $filename	= "{$document}_{$id}_{$firstName}.$extension";

                    Input::file($document)->move($path, $filename);
                    $employee_document  =   Employee_document::firstOrNew(['employeeID'=>$id,'type'=>$document]);
                    $employee_document->fileName  =   $filename;
                    $employee_document->type      =   $document;
                    $employee_document->save();
                }
            }
            return Redirect::route('admin.employees.edit',$id)->with('successDocuments',"<strong>Success</strong> Updated Successfully");
            //  ********** END UPLOAD THE DOCUMENTS**********
        }
        //-------Documents info Details Update END--------
        return Response::json($output, 200);
    }
    /**
     * Remove the specified employee from storage.
     */

    public function destroy($id)
    {
        Employee::where('employeeID', '=', $id)->delete();
        $output['success']  =   'deleted';
        return Response::json($output, 200);
    }





}
