<?php

namespace App\Http\Controllers;

use App\Mail\adminMail;
use App\Mail\AgentEmailVerify;
use App\Mail\agentSignup;
use App\Mail\packageSubscription;
use App\Mail\packageSubscriptionSendAdmin;
use App\Mail\sendemailbyadmin;
use App\Models\addAddressModel;
use App\Models\addAgentLogin;
use App\Models\addCoupon;
use App\Models\addDocument;
use App\Models\addEmailTemplate;
use App\Models\addGroup;
use App\Models\addGroupMember;
use App\Models\addInstitution;
use App\Models\addLead;
use App\Models\addPackage;
use App\Models\addRole;
use App\Models\addSampleDocument;
use App\Models\addSmsGroup;
use App\Models\addSmsGroupMember;
use App\Models\addSmsTemplate;
use App\Models\addStoragePackage;
use App\Models\addStudentAcademic;
use App\Models\addStudentContact;
use App\Models\addStudentFinancial;
use App\Models\addStudentMarksheet;
use App\Models\addStudentOther;
use App\Models\addStudentPassport;
use App\Models\addStudentRecommand;
use App\Models\addSupport;
use App\Models\addTask;
use App\Models\AgentModel;
use App\Models\agentSubscription;
use App\Models\emailModel;
use App\Models\EmailSubcription;
use App\Models\email_package;
use App\Models\InstitutionModel;
use App\Models\smsModel;
use App\Models\smsPackage;
use App\Models\SmsSubcription;
use App\Models\StorageSubcription;
use App\Models\studentLanguageModel;
use App\Models\StudentModel;
use App\Models\studentWorkflow;
use App\Models\universityCoursePayment;
use App\Models\workflow;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use Response;
use Stripe;

class AgentController extends Controller
{

    public function studentView($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $contact = addStudentContact::where('student_id', $id)->first();
            $student = StudentModel::where('id', $id)->first();
            $address = addAddressModel::where('student_id', $id)->first();
            $language = studentLanguageModel::where('student_id', $id)->first();
            $academics = addStudentAcademic::where('student_id', $id)->get();
            $countries = DB::table('countries')->get();
            $session = Session::get('status');
            $passportimage = addStudentPassport::where('student_id', $id)->get();
            $marksheet = addStudentMarksheet::where('student_id', $id)->get();
            $other = addStudentOther::where('student_id', $id)->get();
            $recommendation = addStudentRecommand::where('student_id', $id)->get();
            $financial = addStudentFinancial::where('student_id', $id)->get();
            if ($session) {
                Session::put('status', $session);
            } else {
                Session::put('status', 'personal');
            }
            return view('agent/studentView', compact('student', 'address', 'language', 'contact', 'countries', 'academics', 'passportimage', 'marksheet', 'other', 'recommendation', 'financial'));
        }
    }

    //
    public function agentlogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email is must required.',
            'password.required' => 'password is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $email_verify = AgentModel::where('email', $request->email)->first();
        if ($email_verify) {
            if ($email_verify->email_verify == '0') {
                return back()->with('fail', 'Please Verify your email');
            }
        }

        // $package = AgentModel::where('email', $request->email)->first();
        // if ($package) {
        //     if ($package->package_status == '0') {
        //         return back()->with('fail', 'Please buy package first');
        //     }
        // }

        $activestatus = AgentModel::where('email', $request->email)->first();
        if ($activestatus) {
            if ($activestatus->status == '0') {
                return back()->with('fail', 'Please wait to approve your account');
            }
        }

        $activestatus = AgentModel::where('status', '2')->first();
        if ($activestatus) {
            if ($activestatus->status == '0') {
                return back()->with('fail', 'Please contact to adminstrator');
            }
        }

        $fields = $request->all();
        $user = AgentModel::where('email', $fields['email'])->first();

        if ($user) {
            Session::forget('login');
            Session::put('login', 'agent');

            Session::put('agent_id', $user->id);
            Session::put('company_name', $user->company_name);
            addAgentLogin::create(['agent_id' => $user->id]);

            //Check Password
            if (!$user || Hash::check($fields['password'], $user->password)) {

                $firstname = $user->first_name;
                $lastname = $user->last_name;
                $shortname = $firstname[0] . $lastname[0];

                $packagefeature = addPackage::where('package_id', $user->package_id)->where('type', '2')->get();

                Session::put('features', $packagefeature);
                Session::put('role', 'agent');
                Session::put('agentlogin', 'loginsuccess');
                Session::forget('student_id');
                Session::forget('shortname');
                Session::put('shortname', $shortname);

                $package_id = AgentModel::where('email', $request->email)->first();
                if ($package_id) {
                    if ($package_id->package_id == '0') {
                        return redirect()->route('/agent/select-package')->with('agentLogin', 'Login successfully');
                    }
                }

                return redirect()->route('agent/dashboard')->with('agentLogin', 'Login successfully');
            } else {
                return back()->with('fail', 'Invalid credentitals!');

            }
        } else {

            $otherrole = addRole::where('email', $fields['email'])->first();
            if ($otherrole) {
                $str = $otherrole->rolefeatures;
                $str1 = RemoveSpecialChar($str);
                $str2 = explode(",", $str1);

                if (!$otherrole || Hash::check($fields['password'], $otherrole->password)) {
                    $shortname = $otherrole->name;
                    Session::put('roleidd', $otherrole->id);
                    Session::put('role', 'other');
                    Session::put('rolefeature', $str2);
                    Session::put('agentlogin', 'loginsuccess');
                    Session::forget('student_id');
                    Session::forget('shortname');
                    Session::put('shortname', $shortname);

                    return redirect()->route('agent/dashboard')->with('agentLogin', 'Login successfully');
                } else {
                    return back()->with('fail', 'Invalid credentitals!');

                }
            } else {
                return back()->with('fail', 'Invalid credentitals!');
            }
        }
    }

    public function register(Request $request)
    {

        if ($request->password != $request->confirm_password) {
            return back()->with('password', 'Password not match');
        } else {

            $validate = Validator::make($request->all(), [
                'company_name' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required|min:9',
                'password' => 'required|min:8',
                'confirm_password' => 'required',
                'country' => 'required',
            ], [
                'company_name.required' => 'Company is must required.',
                'first_name.required' => 'Firstname is must required.',
                'last_name.required' => 'Lastname is must required.',
                'email.required' => 'Email is must required.',
                'phone.required' => 'Phone is must required.',
                'password.required' => 'Password is must required.',
                'confirm_password.required' => 'Confirm password is must required.',
                'country.required' => 'Country is must required.',
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }

            $userexit = StudentModel::where('email', $request->email)->first();
            if ($userexit) {
                return back()->with('emailexit', 'Email Already Exist');
            }

            $agentexit = AgentModel::where('email', $request->email)->first();
            if ($agentexit) {
                return back()->with('emailexit', 'Email Already Exist');
            }

            $institutionexit = InstitutionModel::where('email', $request->email)->first();
            if ($institutionexit) {
                return back()->with('emailexit', 'Email Already Exist');
            }

            $userexit = StudentModel::where('phone', $request->countrycode . $request->phone)->first();
            if ($userexit) {
                return back()->with('emailexit', 'Phone Number Already Exist');
            }

            $agentexit = AgentModel::where('phone', $request->countrycode . $request->phone)->first();
            if ($agentexit) {
                return back()->with('emailexit', 'Phone Number Already Exist');
            }

            $institutionexit = InstitutionModel::where('phone', $request->countrycode . $request->phone)->first();
            if ($institutionexit) {
                return back()->with('emailexit', 'Phone Number Already Exist');
            }

            $company_name = $request->company_name;
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $email = $request->email;
            $phone = $request->countrycode . $request->phone;
            $password = $request->password;
            $user = AgentModel::create(['company_name' => $company_name, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'phone' => $phone, 'country' => $request->country, 'password' => Hash::make($password)]);
            Session::put('agent_iddd', $user->id);
            Session::put('agent_id', $user->id);
            if ($user) {
                Session::put('agent_id', $user->id);
                Session::put('agent_iddd', $user->id);
                $details = [
                    'name' => $first_name,
                    'email' => $email,
                    'id' => $user->id,
                ];

                Mail::to($request->email)->send(new AgentEmailVerify($details));

                return back()->with('verifymessage', 'Please Confirm your email account');
            } else {
                return redirect()->route('/agent/register');
            }
        }
    }

    public function EmailVerify($id)
    {
        Session::put('agent_iddd', $id);
        $email_verify = AgentModel::find($id);
        $email_verify->email_verify = '1';

        if ($email_verify->save()) {
            $agent = AgentModel::where('id', $id)->first();
            $details = [
                'name' => $agent->first_name,
                'email' => $agent->email,
                'type' => 'Agent',
            ];
            Mail::to($agent->email)->send(new agentSignup($details));
            Mail::to('info@studify.au')->send(new adminMail($details));

            if ($agent->payment_status == '0' && $agent->package_id == '0') {
                return redirect()->route('/agent/select-package');
            } else {
                return redirect()->route('agent/dashboard')->with('agentLogin', 'Login successfully');
            }

        }
    }

    public function index()
    {

        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('student_id');

            $contact = addStudentContact::where('student_id', $id)->first();
            $student = StudentModel::where('id', $id)->first();
            $address = addAddressModel::where('student_id', $id)->first();
            $language = studentLanguageModel::where('student_id', $id)->first();
            $user = StudentModel::where('id', $id)->first();
            $academics = addStudentAcademic::where('student_id', $id)->get();
            $countries = DB::table('countries')->get();
            $session = Session::get('status');
            $passportimage = addStudentPassport::where('student_id', $id)->get();
            $marksheet = addStudentMarksheet::where('student_id', $id)->get();
            $other = addStudentOther::where('student_id', $id)->get();
            $recommendation = addStudentRecommand::where('student_id', $id)->get();
            $financial = addStudentFinancial::where('student_id', $id)->get();
            $institution = addInstitution::all();
            $country = DB::table('country')->get();

            if ($session) {
                Session::put('status', $session);
            } else {
                Session::put('status', 'personal');
            }

            // $name = $user->first_name;
            return view('agent/index', compact('student', 'country', 'institution', 'user', 'address', 'language', 'contact', 'countries', 'academics', 'passportimage', 'marksheet', 'other', 'recommendation', 'financial'));
        }
    }

    public function checkapplication($id)
    {

        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            Session::forget('status');
            $contact = addStudentContact::where('student_id', $id)->first();
            $student = StudentModel::where('id', $id)->first();
            $address = addAddressModel::where('student_id', $id)->first();
            $language = studentLanguageModel::where('student_id', $id)->first();
            $user = StudentModel::where('id', $id)->first();
            $academics = addStudentAcademic::where('student_id', $id)->get();
            $countries = DB::table('countries')->get();
            $session = Session::get('status');
            $passportimage = addStudentPassport::where('student_id', $id)->get();
            $marksheet = addStudentMarksheet::where('student_id', $id)->get();
            $other = addStudentOther::where('student_id', $id)->get();
            $recommendation = addStudentRecommand::where('student_id', $id)->get();
            $financial = addStudentFinancial::where('student_id', $id)->get();
            $institution = addInstitution::all();
            if ($session) {
                Session::put('status', $session);
            } else {
                Session::put('status', 'personal');
            }

            // $name = $user->first_name;
            return view('agent/checkapplication', compact('student', 'institution', 'user', 'address', 'language', 'contact', 'countries', 'academics', 'passportimage', 'marksheet', 'other', 'recommendation', 'financial'));
        }
    }

    public function checkedapplication($id)
    {
        $user = StudentModel::find($id);
        $user->student_status = '2';
        $user->save();
        return redirect()->back()->with('message', 'Send to admin successfully');
    }

    public function newmember()
    {
        Session::forget('student_id');
        Session::forget('status');
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {

            $id = Session::get('student_id');

            $contact = addStudentContact::where('student_id', $id)->first();
            $student = StudentModel::where('id', $id)->first();
            $address = addAddressModel::where('student_id', $id)->first();
            $language = studentLanguageModel::where('student_id', $id)->first();
            $user = StudentModel::where('id', $id)->first();
            $academics = addStudentAcademic::where('student_id', $id)->get();
            $countries = DB::table('countries')->get();
            $session = Session::get('status');
            $passportimage = addStudentPassport::where('student_id', $id)->get();
            $marksheet = addStudentMarksheet::where('student_id', $id)->get();
            $other = addStudentOther::where('student_id', $id)->get();
            $recommendation = addStudentRecommand::where('student_id', $id)->get();
            $financial = addStudentFinancial::where('student_id', $id)->get();
            $institution = addInstitution::all();
            $country = DB::table('country')->get();

            if ($session) {
                Session::put('status', $session);
            } else {
                Session::put('status', 'personal');
            }

            // $name = $user->first_name;
            return view('agent/index', compact('student', 'country', 'institution', 'user', 'address', 'language', 'contact', 'countries', 'academics', 'passportimage', 'marksheet', 'other', 'recommendation', 'financial'));

        }

    }
    public function studentRegister(Request $request)
    {
        $id = Session::get('agent_id');
        $packagetype = AgentModel::where('id', $id)->first();
        $packagedata = addPackage::where('id', $packagetype->agent_package_id)->first();
        if ($packagedata->package_monthly == '0') {
            $studentexxit = StudentModel::where('agent_id', $id)->get();
            if ($studentexxit->count() > '2') {
                return back()->with('emailexit', 'Your free package limit finished , Please upgrade your package');
            }
        }

        Session::forget('status');
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|min:10',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'image' => 'required|min:0|max:1024',
        ], [
            'first_name.required' => 'Firstname is must required.',
            'last_name.required' => 'Lastname is must required.',
            'phone.required' => 'Phone is must required.',
            'email.required' => 'Email is must required.',
            'gender.required' => 'Gender is must required.',
            'dob.required' => 'DOB  is must required.',
            'country.required' => 'Country  is must required.',
            'image.max' => 'Please select image minimum size 1mb ',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $userexit = StudentModel::where('email', $request->email)->first();
        if ($userexit) {
            return back()->with('emailexit', 'Email Already Exit');
        }

        $agentexit = AgentModel::where('email', $request->email)->first();
        if ($agentexit) {
            return back()->with('emailexit', 'Email Already Exit');
        }

        $institutionexit = InstitutionModel::where('email', $request->email)->first();
        if ($institutionexit) {
            return back()->with('emailexit', 'Email Already Exit');
        }

        $image = '';

        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('StudentImage/'), $filename);

            $image = $filename;
        }

        $id = Session::get('agent_id');
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $phone = $request->phone;
        $email = $request->email;
        $gender = $request->gender;
        $dob = $request->dob;
        $country = $request->country;
        $password = '';
        $insitution_id = $request->insitution_id;

        $user = StudentModel::create(['agent_id' => $id, 'institution_id' => $insitution_id, 'first_name' => $first_name, 'last_name' => $last_name, 'phone' => $phone, 'email' => $email, 'gender' => $gender, 'dob' => $dob, 'country' => $country, 'student_img' => $image, 'password' => $password]);

        $last_student_id = $user->id;

        Session::put('student_id', $last_student_id);
        if ($user) {
            $course = universityCoursePayment::create(['agent_id' => $id, 'insitution_id' => $request->insitution_id, 'course_id' => $request->course_id, 'student_id' => $last_student_id, 'transcation_id' => '0',
                'payment_status' => '0', 'mode' => 'Offline']);
            Session::forget('status');
            Session::put('status', 'address');
            return redirect()->route('/agent/member/add');
        } else {

            return redirect()->route('/agent/member/add');
        }

    }

    public function updatestudent(Request $request)
    {

        Session::forget('status');
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|min:10',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',

        ], [
            'first_name.required' => 'Firstname is must required.',
            'last_name.required' => 'Lastname is must required.',
            'phone.required' => 'Phone is must required.',
            'email.required' => 'Email is must required.',
            'gender.required' => 'Gender is must required.',
            'dob.required' => 'DOB  is must required.',
            'country.required' => 'Country  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $agentexit = AgentModel::where('email', $request->email)->first();
        if ($agentexit) {
            return back()->with('emailexit', 'Email Already Exit');
        }

        $institutionexit = InstitutionModel::where('email', $request->email)->first();
        if ($institutionexit) {
            return back()->with('emailexit', 'Email Already Exit');
        }

        $image = '';

        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('StudentImage/'), $filename);

            $image = $filename;
        }

        $id = $request->id;
        $student = StudentModel::where('id', $id)->first();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->gender = $request->gender;
        $student->dob = $request->dob;
        $student->country = $request->country;
        $student->insitution_id = $request->insitution_id;
        $student->student_img = $image;
        if ($student->save()) {
            Session::put('student_id', $id);
            Session::forget('status');
            Session::put('status', 'address');
            return redirect()->route('/agent/member/add');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    public function addStudentAddress(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'street_name' => 'required',
            'city_name' => 'required',
            'province_state' => 'required',
            'zip_code' => 'required',
            'countries_id' => 'required',

        ], [
            'street_name.required' => 'Street is must required.',
            'city_name.required' => 'City is must required.',
            'province_state.required' => 'State is must required.',
            'zip_code.required' => 'ZipCode is must required.',
            'countries_id.required' => 'Country is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = Session::get('student_id');
       
        $student_id = $id;
        $street_name = $request->street_name;
        $city_name = $request->city_name;
        $province_state = $request->province_state;
        $zip_code = $request->zip_code;
        $countries_id = $request->countries_id;

        $address = addAddressModel::create(['student_id' => $student_id, 'country' => $countries_id, 'street_name' => $street_name, 'city' => $city_name, 'state' => $province_state, 'zipcode' => $zip_code]);
        if ($address) {
            Session::forget('status');
            Session::put('status', 'language');
            return redirect()->route('/agent/member/add');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    public function updateStudentAddress(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'street_name' => 'required',
            'city_name' => 'required',
            'province_state' => 'required',
            'zip_code' => 'required',
            'countries_id' => 'required',

        ], [
            'street_name.required' => 'Street is must required.',
            'city_name.required' => 'City is must required.',
            'province_state.required' => 'State is must required.',
            'zip_code.required' => 'ZipCode is must required.',
            'countries_id.required' => 'Country is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $address = addAddressModel::where('student_id', $request->id)->first();
        $student_id = $request->id;
        $address->street_name = $request->street_name;
        $address->city = $request->city_name;
        $address->state = $request->province_state;
        $address->zipcode = $request->zip_code;
        $address->country = $request->countries_id;

        if ($address->save()) {
            Session::forget('status');
            Session::put('status', 'language');
            return redirect()->route('/agent/member/add');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    // add language score
    public function addLanguageScore(Request $request)
    {
        $id = Session::get('student_id');
        if ($request->exam_type == 'DontHave') {
            Session::forget('status');
            Session::put('status', 'gpa');
            return redirect()->route('/agent/member/add');
        } else {
            $validate = Validator::make($request->all(), [
                'exam_type' => 'required',
                'speaking_score' => 'required',
                'reading_score' => 'required',
                'writing_score' => 'required',
                'listening_score' => 'required',
                'average_score' => 'required',
                'exam_date' => 'required',
            ], [
                'exam_type.required' => 'Street is must required.',
                'speaking_score.required' => 'Speaking score is must required.',
                'reading_score.required' => 'Reading score is must required.',
                'writing_score.required' => 'Writing score is must required.',
                'listening_score.required' => 'Listening score is must required.',
                'average_score.required' => 'Average score score is must required.',
                'exam_date.required' => 'Exam date score is must required.',
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }

            $student_id = $id;
            $exam_type = $request->exam_type;
            $speaking_score = $request->speaking_score;
            $reading_score = $request->reading_score;
            $writing_score = $request->writing_score;
            $listening_score = $request->listening_score;
            $average_score = $request->average_score;
            $exam_date = $request->exam_date;

            $language = studentLanguageModel::create(['student_id' => $student_id, 'exam_type' => $exam_type, 'speaking_score' => $speaking_score, 'reading_score' => $reading_score, 'writing_score' => $writing_score, 'listening_score' => $listening_score, 'average_score' => $average_score, 'exam_date' => $exam_date]);

            if ($language) {
                Session::forget('status');
                Session::put('status', 'gpa');
                return redirect()->route('/agent/member/add');
            } else {
                return redirect()->route('/agent/member/add');
            }
        }
    }

    public function updateLanguageScore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'exam_type' => 'required',
            'speaking_score' => 'required',
            'reading_score' => 'required',
            'writing_score' => 'required',
            'listening_score' => 'required',
            'average_score' => 'required',
            'exam_date' => 'required',
        ], [
            'exam_type.required' => 'Street is must required.',
            'speaking_score.required' => 'Speaking score is must required.',
            'reading_score.required' => 'Reading score is must required.',
            'writing_score.required' => 'Writing score is must required.',
            'listening_score.required' => 'Listening score is must required.',
            'average_score.required' => 'Average score score is must required.',
            'exam_date.required' => 'Exam date score is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $student_id = $request->id;
        $language = studentLanguageModel::where('student_id', $request->id)->first();
        $language->exam_type = $request->exam_type;
        $language->speaking_score = $request->speaking_score;
        $language->reading_score = $request->reading_score;
        $language->writing_score = $request->writing_score;
        $language->listening_score = $request->listening_score;
        $language->average_score = $request->average_score;
        $language->exam_date = $request->exam_date;

        if ($language->save()) {
            Session::forget('status');
            Session::put('status', 'gpa');
            return redirect()->route('/agent/member/add');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    public function updateGpaScore(Request $request)
    {
        $id = Session::get('student_id');
        $validate = Validator::make($request->all(), [
            'gpa_scale' => 'required',
            'gpa_score' => 'required',

        ], [
            'gpa_scale.required' => 'Gpa scale is must required.',
            'gpa_score.required' => 'Gpa score score is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $gpa = StudentModel::where('id', $id)->first();
        $gpa->gpa_scale = $request->gpa_scale;
        $gpa->gpa_score = $request->gpa_score;
        if ($gpa->save()) {
            Session::forget('status');
            Session::put('status', 'academic');
            return redirect()->route('/agent/member/add');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    public function addContact(Request $request)
    {
        $id = Session::get('student_id');
        $validate = Validator::make($request->all(), [
            'contact_name' => 'required',
            'relationship' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',

        ], [
            'contact_name.required' => 'Contact name is must required.',
            'relationship.required' => 'Relationship is must required.',
            'contact_phone.required' => 'Contact phone is must required.',
            'contact_email.required' => 'Contact email is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $student_id = Session::get('student_id');

        $contact_name = $request->contact_name;
        $relationship = $request->relationship;
        $contact_phone = $request->contact_phone;
        $contact_email = $request->contact_email;

        $contact = addStudentContact::create(['student_id' => $student_id, 'contact_name' => $contact_name, 'relationship' => $relationship, 'phone_number' => $contact_phone, 'email' => $contact_email]);

        if ($contact) {
            Session::forget('status');
            Session::put('status', 'document');
            return redirect()->route('/agent/member/add');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    public function updateContact(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'contact_name' => 'required',
            'relationship' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',

        ], [
            'contact_name.required' => 'Contact name is must required.',
            'relationship.required' => 'Relationship is must required.',
            'contact_phone.required' => 'Contact phone is must required.',
            'contact_email.required' => 'Contact email is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = Session::get('student_id');
        $contact = addStudentContact::where('student_id', $request->id)->first();
        $contact->contact_name = $request->contact_name;
        $contact->relationship = $request->relationship;
        $contact->phone_number = $request->contact_phone;
        $contact->email = $request->contact_email;
        if ($contact->save()) {
            Session::forget('status');
            Session::put('status', 'document');
            return redirect()->with('studentsave', 'Add student successfully');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    public function updateSignature(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'consent_signature' => 'required',
        ], [
            'consent_signature.required' => 'Please Verify.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $id = Session::get('student_id');
        $sign = StudentModel::where('id', $id)->first();
        $sign->signature_status = $request->consent_signature;
        $sign->student_status = '1';
        if ($sign->save()) {
            Session::forget('student_id');
            Session::forget('status');
            Session::put('status', 'personal');
            return redirect()->back()->with('studentsave', 'Add student successfully');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    public function dashboard()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $member = AgentModel::where('id', $id)->first();
          
            if ($member) {
                $id = $member->agent_package_id;
              
                $package = addPackage::where('id', $member->agent_package_id)->first();
                $packagefeature = addPackage::where('package_id', $member->agent_package_id)->get();
                $message = '';
                if ($package) {
                    return view('agent.dashboard', compact('package', 'message', 'id', 'member', 'packagefeature'));
                } else {
                    $package = '';
                    $packagefeature = '';
                    $message = "Your Current Package not avaible Please upgrade your package";
                }

                $message = "Your Current Package not avaible Please upgrade your package";
                return view('agent.dashboard', compact('package', 'message', 'id', 'member', 'packagefeature'));
            } else {
                $package = '';
                $packagefeature = '';
                $message = '';
            }

            return view('agent.dashboard', compact('package', 'message', 'id', 'member', 'packagefeature'));
        }
    }

    public function studentdelete($id)
    {
        $product = StudentModel::find($id);
        $product->status = '2';
        if ($product->save()) {
            return back()->with('deletestudent', 'Student delete successfully');
        } else {
            return back()->with('deletestudent', 'Student not delete successfully');

        }
    }

    public function getmember()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $member = StudentModel::where('agent_id', $id)->where('status', '!=', '2')->get();
            return view('agent.getmember', compact('member'));
        }
    }

    public function getInsitutionStudent($insitutuionid)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {

            $id = Session::get('agent_id');

            $member = StudentModel::where('agent_id', $id)->where('insitution_id', $insitutuionid)->get();
            return view('agent.getInsitutionmember', compact('member'));
        }
    }

    public function getList(Request $request)
    {
        if ($request->type == 'Staff') {
            $id = Session::get('agent_id');
            $data['members'] = addRole::where('agent_id', '=', $id)->where('type', '=', 'agent')->get();
        } else {
            $id = Session::get('agent_id');
            $data['members'] = StudentModel::where('agent_id', '=', $id)->get();
        }
        return response()->json($data);
    }

    public function getincompletemember(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            return view('agent.getincompletemember');
        }
    }

    public function getcompletemember(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            return view('agent.getcompletemember');
        }
    }

    public function application()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $application = StudentModel::where('agent_id', $id)->where('student_status', '1')->get();

            return view('agent.applicationlist', compact('application'));
        }
    }

    public function getprofile(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $agentprofile = AgentModel::where('id', $id)->first();
            $countstudent = StudentModel::where('agent_id', '=', $id)->count();
            $incomplete = AgentModel::where('status', '=', '0')->count();
            $completeStudent = AgentModel::where('status', '=', '1')->count();
            $country = DB::table('country')->get();
            $state = DB::table('states')->get();
            $city = DB::table('cities')->get();
            return view('agent.getprofile', compact('agentprofile', 'countstudent', 'incomplete', 'completeStudent', 'country', 'state', 'city'));
        }
    }

    public function activity(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $login = addAgentLogin::where('agent_id', $id)->orderBy('id', 'DESC')->take(10)->get();
            return view('agent.activity', compact('login'));
        }
    }

    public function addacademicInfo(Request $request)
    {

        $data = $request->all();
        $finalArray = array();
        foreach ($data['school_name'] as $key => $value) {
            $id = Session::get('student_id');
            if ($value != '' && $data['street_name'][$key] != '' && $data['country'][$key] != '' && $data['province_state'][$key] != '' && $data['city'][$key] != '' && $data['passed_year'][$key] != '' && $data['zipcode'][$key] != '' && $data['level_of_study'][$key] != '') {
                array_push($finalArray, array(
                    'student_id' => $id,
                    'school_name' => $data['school_name'][$key],
                    'street_name' => $data['street_name'][$key],
                    'country' => $data['country'][$key],
                    'province_state' => $data['province_state'][$key],
                    'city' => $data['city'][$key],
                    'passed_year' => $data['passed_year'][$key],
                    'zipcode' => $data['zipcode'][$key],
                    'level_of_study' => $data['level_of_study'][$key])
                );
            }
        }
        $addacademicInfo = addStudentAcademic::insert($finalArray);
        if ($addacademicInfo) {
            Session::forget('status');
            Session::put('status', 'contact');
            return redirect()->route('/agent/member/add');
        } else {
            return redirect()->route('/agent/member/add');
        }
    }

    public function updateacademicInfo(Request $request)
    {

        $id = Session::get('student_id');
        $aca = addStudentAcademic::where('student_id', $id)->delete();

        $data = $request->all();
        $finalArray = array();
        foreach ($data['school_name'] as $key => $value) {
            $id = Session::get('student_id');
            if ($value != '' && $data['street_name'][$key] != '' && $data['country'][$key] != '' && $data['province_state'][$key] != '' && $data['city'][$key] != '' && $data['passed_year'][$key] != '' && $data['zipcode'][$key] != '' && $data['level_of_study'][$key] != '') {

                array_push($finalArray, array(
                    'student_id' => $id,
                    'school_name' => $data['school_name'][$key],
                    'street_name' => $data['street_name'][$key],
                    'country' => $data['country'][$key],
                    'province_state' => $data['province_state'][$key],
                    'city' => $data['city'][$key],
                    'passed_year' => $data['passed_year'][$key],
                    'zipcode' => $data['zipcode'][$key],
                    'level_of_study' => $data['level_of_study'][$key])
                );
            }
        }
        $addacademicInfo = addStudentAcademic::insert($finalArray);
        if ($addacademicInfo) {
            Session::forget('status');
            Session::put('status', 'contact');
            return redirect()->route('/agent/member/add');
        } else {
            return redirect()->route('/agent/member/add');
        }

    }

    public function uploadmultipleimage(Request $request)
    {
        if ($request->english_certificate) {
            $validate = Validator::make($request->all(), [
                'english_certificate' => 'required|min:0|max:1024',

            ], [
                'english_certificate.max' => 'Please select image minimum size 1mb ',

            ]);
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
        }
        if ($request->resume) {
            $validate = Validator::make($request->all(), [
                'resume' => 'required|min:0|max:1024',
            ], [
                'resume.max' => 'Please select image minimum size 1mb ',
            ]);
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
        }

        if ($request->hasFile('passport')) {
            $request->validate([
                'passport' => 'required',
                'passport.*' => 'required|min:0|max:5120',
            ]);
        }

        if ($request->hasFile('financialDoc')) {
            $request->validate([
                'financialDoc' => 'required',
                'financialDoc.*' => 'required|min:0|max:5120',
            ]);
        }
        if ($request->hasFile('marksheet')) {
            $request->validate([
                'marksheet' => 'required',
                'marksheet.*' => 'required|min:0|max:5120',
            ]);
        }

        if ($request->hasFile('recommendation')) {
            $request->validate([
                'recommendation' => 'required',
                'recommendation.*' => 'required|min:0|max:5120',
            ]);
        }

        if ($request->hasFile('other')) {
            $request->validate([
                'other' => 'required',
                'other.*' => 'required|min:0|max:5120',
            ]);
        }
        
       
        $resume = '';
        $certificate = '';

        if ($request->hasFile('passport')) {
            $image = $request->file('passport');
            $i = 0;

            $id = Session::get('student_id');

            if ($request->hasfile('passport')) {
                foreach ($request->file('passport') as $file) {
                    $student_id = Session::get('student_id');
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/StudentPassportImage/', $name);
                    $imgData = $name;

                    $fileModal = new addStudentPassport();
                    $fileModal->image = $imgData;
                    $fileModal->student_id = $student_id;
                    $fileModal->save();
                }
            }

        }

        if ($request->hasfile('financialDoc')) {
            foreach ($request->file('financialDoc') as $file) {
                $student_id = Session::get('student_id');
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/StudentFinanicalImage/', $name);
                $financial = $name;

                $fileModal = new addStudentFinancial();
                $fileModal->financial_images = $financial;
                $fileModal->student_id = $student_id;
                $fileModal->save();
            }
        }

        if ($request->hasfile('marksheet')) {
            foreach ($request->file('marksheet') as $file) {
                $student_id = Session::get('student_id');
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/StudentMarksheetImage/', $name);
                $marksheet = $name;

                $fileModal = new addStudentMarksheet();
                $fileModal->marksheet = $marksheet;
                $fileModal->student_id = $student_id;
                $fileModal->save();
            }
        }

        if ($request->hasfile('recommendation')) {
            foreach ($request->file('recommendation') as $file) {
                $student_id = Session::get('student_id');
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/StudentRecommandation/', $name);
                $recommand = $name;

                $fileModal = new addStudentRecommand();
                $fileModal->recommand = $recommand;
                $fileModal->student_id = $student_id;
                $fileModal->save();
            }
        }

        if ($request->hasfile('other')) {
            foreach ($request->file('other') as $file) {
                $student_id = Session::get('student_id');
                $name = $file->getClientOriginalName();
                $file->move(public_path() . '/StudentOther/', $name);
                $other = $name;

                $fileModal = new addStudentOther();
                $fileModal->other_image = $other;
                $fileModal->student_id = $student_id;
                $fileModal->save();
            }
        }

        if (!empty($request->english_certificate)) {
            $files = $request->file('english_certificate');
            $extensions = $files->getClientOriginalExtension();
            $filenames = time() . rand(1, 99) . '.' . $extensions;
            $files->move(public_path('StudentEnglishCertificate/'), $filenames);

            $certificate = $filenames;

            $id = Session::get('student_id');
            $uploadcertificate = StudentModel::find($id);
            $uploadcertificate->english_certificate = $certificate;
            $uploadcertificate->save();
        }

        if (!empty($request->resume)) {
            $files = $request->file('resume');
            $extensions = $files->getClientOriginalExtension();
            $filenames = time() . rand(1, 99) . '.' . $extensions;
            $files->move(public_path('StudentResume/'), $filenames);

            $resume = $filenames;

            $id = Session::get('student_id');
            $uploadresume = StudentModel::find($id);
            $uploadresume->resume = $resume;
            $uploadresume->save();
        }

        Session::forget('status');
        Session::put('status', 'sign');

        return redirect()->route('/agent/member/add');
    }

    public function updateAgentprofile(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'company_name' => 'required',
            'first_name' => 'required',
            'email' => 'required',
            'agent_address' => 'required',
            'established' => 'required',
            'contact_person' => 'required',
            'contact_email' => 'required',
            'contact_phone' => 'required',
            'bank_name' => 'required',
            'bank_account' => 'required',
            'account_name' => 'required',
            'bank_address' => 'required',
            'routing' => 'required',
            'swift_code' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',

        ], [
            'company_name.required' => 'Company name is must required.',
            'first_name.required' => 'Name is must required.',
            'email.required' => 'Email is must required.',
            'agent_address.required' => 'Address is must required.',
            'established.required' => 'Established is must required.',
            'contact_person.required' => 'Contact Person password is must required.',
            'contact_email.required' => 'Contact Email is must required.',
            'contact_phone.required' => 'Contact Phone is must required.',
            'bank_name.required' => 'Bank Name is must required.',
            'bank_account.required' => 'Bank Account is must required.',
            'account_name.required' => 'Account Name is must required.',
            'bank_address.required' => 'Bank Address is must required.',
            'routing.required' => 'Routing is must required.',
            'swift_code.required' => 'Swift Code is must required.',
            'phone.required' => 'Phone is must required.',
            'country.required' => 'Country is must required.',
            'state.required' => 'State is must required.',
            'city.required' => 'City is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if ($request->agent_image) {
            $AgentImage = '';

            if (!empty($request->agent_image)) {
                $files = $request->file('agent_image');
                $extensions = $files->getClientOriginalExtension();
                $filenames = time() . rand(1, 99) . '.' . $extensions;
                $files->move(public_path('AgentImage/'), $filenames);

                $AgentImage = $filenames;

            }
            $country = DB::table('country')->where('id', $request->country)->first();
            $state = DB::table('states')->where('id', $request->state)->first();
            $city = DB::table('cities')->where('id', $request->city)->first();

            $id = $request->id;
            $agent_profile = AgentModel::where('id', $id)->first();
            $agent_profile->company_name = $request->company_name;
            $agent_profile->first_name = $request->first_name;
            $agent_profile->email = $request->email;
            $agent_profile->agent_address = $request->agent_address;
            $agent_profile->established = $request->established;
            $agent_profile->contact_person = $request->contact_person;
            $agent_profile->contact_email = $request->contact_email;
            $agent_profile->contact_phone = $request->contact_phone;
            $agent_profile->bank_name = $request->bank_name;
            $agent_profile->bank_account = $request->bank_account;
            $agent_profile->account_name = $request->account_name;
            $agent_profile->bank_address = $request->bank_address;
            $agent_profile->routing = $request->routing;
            $agent_profile->swift_code = $request->swift_code;
            $agent_profile->agent_image = $AgentImage;
            $agent_profile->phone = $request->phone;
            $agent_profile->country = $country->country_name;
            $agent_profile->state = $state->name;
            $agent_profile->city = $request->city;

            if ($agent_profile->save()) {

                return redirect()->route('agent/profile');
            } else {
                return redirect()->route('agent/profile');
            }

        } else {

            $country = DB::table('country')->where('id', $request->country)->first();
            $state = DB::table('states')->where('id', $request->state)->first();
            $city = DB::table('cities')->where('id', $request->city)->first();

            $id = $request->id;
            $agent_profile = AgentModel::where('id', $id)->first();
            $agent_profile->company_name = $request->company_name;
            $agent_profile->first_name = $request->first_name;
            $agent_profile->email = $request->email;
            $agent_profile->agent_address = $request->agent_address;
            $agent_profile->established = $request->established;
            $agent_profile->contact_person = $request->contact_person;
            $agent_profile->contact_email = $request->contact_email;
            $agent_profile->contact_phone = $request->contact_phone;
            $agent_profile->bank_name = $request->bank_name;
            $agent_profile->bank_account = $request->bank_account;
            $agent_profile->account_name = $request->account_name;
            $agent_profile->bank_address = $request->bank_address;
            $agent_profile->routing = $request->routing;
            $agent_profile->swift_code = $request->swift_code;
            $agent_profile->phone = $request->phone;
            $agent_profile->country = $country->name;
            $agent_profile->state = $state->name;
            $agent_profile->city = $city->name;
            if ($agent_profile->save()) {
                return redirect()->route('agent/profile');
            } else {
                return redirect()->route('agent/profile');
            }

        }

    }

    public function addnew()
    {
        Session::flush();
        Session::forget('student_id');
        return redirect()->route('/agent/member/add');
    }

    public function rolePermission()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $allrole = addRole::where('agent_id', $id)->where('type', 'agent')->get();

            return view('agent/rolePermission', compact('allrole'));
        }
    }

    public function managedocument()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            return view('agent/manageDocument');
        }
    }

    public function managetask()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $task = addTask::where('agent_id', $id)->where('type', 'agent')->where('status', '0')->where('assign_id', '!=', '0')->get();
            $staff = addRole::where('agent_id', $id)->where('type', 'agent')->get();
            return view('agent/manageTask', compact('task', 'staff'));
        }
    }

    public function getSelfTask()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $task = addTask::where('agent_id', $id)->where('type', 'agent')->where('assign_id', '0')->where('status', '0')->get();
            $staff = addRole::where('agent_id', $id)->where('type', 'agent')->get();
            return view('agent/selfTaskManage', compact('task', 'staff'));
        }
    }

    public function canceltask()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $task = addTask::where('type', 'agent')->where('status', '1')->get();
            return view('agent/canceltask', compact('task'));
        }
    }

    public function completedtask()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $task = addTask::where('type', 'agent')->where('status', '2')->get();
            return view('agent/completeTask', compact('task'));
        }
    }

    public function selectPackage()
    {
        $packages = addPackage::where('package_id', '0')->where('type', '1')->get();
        $allcoupon = addCoupon::where('coupon_type', 'Signup')->where('status', '1')->get();

        return view('agent/selectPackage', compact('packages', 'allcoupon'));

    }

    public function payment(Request $request)
    {
       

      
        $validate = Validator::make($request->all(), [
            'package_id' => 'required',
        ], [
            'package_id.required' => 'Contact name is must required.',
        ]);

        if ($validate->fails()) {
            return back()->with('message', 'Please select your package');
        }

        $package_id = $request->package_id;
        $duration = $request->duration;
        $packages = addPackage::where('id', $package_id)->first();
        if ($packages->package_monthly == '0') {
            $duration = 'Monthly';
            $startdate = '';
            $enddate = '';

            if ($request->duration == "Yearly") {
                $duration = 'Yearly';
                $startdate = date('Y-m-d');
                $future_timestamp = strtotime("+12 month");
                $enddate = date('Y-m-d', $future_timestamp);

            } else {
                $duration = 'Monthly';
                $startdate = date('Y-m-d');
                $future_timestamp = strtotime("+1 month");
                $enddate = date('Y-m-d ', $future_timestamp);
            }

            $id = Session::get('agent_id');
            $agent_profile = AgentModel::where('id', $id)->first();
            $agent_profile->agent_package_id = $request->package_id;
            $agent_profile->package_duration = $duration;
            $agent_profile->package_start_date = $startdate;
            $agent_profile->package_end_date = $enddate;
            $agent_profile->package_status = '1';
            $agent_profile->payment_status = '1';
            $agent_profile->save();

            $course = agentSubscription::create(['agent_id' => $id, 'agent_package_id' => $request->package_id, 'amount' => '0', 'transcation_id' => '0',
                'payment_status' => '1']);
            $coupondiscount = addCoupon::where('coupon_code', $request->couponcode)->where('coupon_type', 'Academic')->first();

            return redirect()->route('/agent/login');
        } else {
            if ($request->couponcode) {
                $coupondiscount = addCoupon::where('coupon_code', $request->couponcode)->where('coupon_type', 'Signup')->first();
                return view('agent/payment', compact('duration', 'package_id', 'coupondiscount'));

            } else {
                return view('agent/payment', compact('duration', 'package_id'));

            }
        }
    }

    public function stripePost(Request $request)
    {

        $price = $request->price;
        $package_id = $request->package_id;
        $id = Session::get('agent_iddd');
        $id = Session::get('agent_id');

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify",
        ]);

        Session::flash('success', 'Payment successful!');

        $agent_profile = AgentModel::where('id', $id)->first();
        if ($agent_profile) {
            $agent_profile->payment_status = '1';
        }
        if ($agent_profile->save()) {
            $duration = 'Monthly';
            $startdate = '';
            $enddate = '';

            if ($request->duration == "Yearly") {
                $duration = 'Yearly';
                $startdate = date('Y-m-d H:i:s');
                $future_timestamp = strtotime("+12 month");
                $enddate = date('Y-m-d H:i:s', $future_timestamp);

            } else {
                $duration = 'Monthly';
                $startdate = date('Y-m-d');
                $future_timestamp = strtotime("+1 month");
                $enddate = date('Y-m-d ', $future_timestamp);
            }

            $id = Session::get('agent_iddd');
            $id = Session::get('agent_id');
            $agent_profile = AgentModel::where('id', $id)->first();
           
            if ($agent_profile->agent_package_id != '0') {
                $exitpackage = addPackage::where('id', $agent_profile->agent_package_id)->where('type', '1')->first();

                if ($exitpackage->package_monthly != '0') {
                    $datetime1 = date('Y-m-d H:i:s');
                    $datetime2 = $agent_profile->package_end_date;
                    $startDatesss = Carbon::parse($datetime1);
                    $endDatesss = Carbon::parse($datetime2);
                    $diffInDays = $startDatesss->diffInDays($endDatesss);
                    $enddatess = Carbon::parse($enddate)->addDays($diffInDays);
                    $enddatessformat = $enddatess->format('Y-m-d');
                    $enddate = $enddatessformat;
                }
            }

            $agent_profile->agent_package_id = $request->package_id;
            $agent_profile->package_duration = $duration;
            $agent_profile->package_start_date = $startdate;
            $agent_profile->package_end_date = $enddate;
            $agent_profile->package_status = '1';
            $agent_profile->save();
            $course = agentSubscription::create(['agent_id' => $id, 'package_id' => $request->package_id, 'amount' => $request->price, 'transcation_id' => $charge->id,
                'payment_status' => '1']);
            $packages = addPackage::where('id', $request->package_id)->first();
            $details = [
                'agent_name' => $agent_profile->first_name,
                'package_name' => $packages->package_name,
                'package_price' => $request->price,
                'type' => 'Agent Signup',

            ];
            Mail::to($agent_profile->email)->send(new packageSubscription($details));
            Mail::to('info@studify.au')->send(new packageSubscriptionSendAdmin($details));

            $user = AgentModel::where('id', $id)->first();
            Session::forget('login');
            Session::put('login', 'agent');

            Session::put('agent_id', $user->id);
            Session::put('company_name', $user->company_name);
            addAgentLogin::create(['agent_id' => $user->id]);

            $firstname = $user->first_name;
            $lastname = $user->last_name;
            $shortname = $firstname[0] . $lastname[0];

            $packagefeature = addPackage::where('package_id', $user->package_id)->where('type', '2')->get();

            Session::put('features', $packagefeature);
            Session::put('role', 'agent');
            Session::put('agentlogin', 'loginsuccess');
            Session::forget('student_id');
            Session::forget('shortname');
            Session::put('shortname', $shortname);

            return redirect()->route('/agent/member/add')->with('agentLogin', 'Login successfully');

        } else {
            return back();
        }
    }

    public function logout()
    {

        Session::flush();
        return redirect()->route('/agent/login');
    }

    public function fetchState(Request $request)
    {

        $data['states'] = DB::table('states')->where("country_id", $request->country_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchCourse(Request $request)
    {
        $data['states'] = DB::table('institution_courses')->where('institution_detail_id', '=', $request->country_id)->get(["c_name", "type", "id"]);
        return response()->json($data);
    }

    public function getCity(Request $request)
    {
        $data['cities'] = DB::table('cities')->where('state_id', '=', $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function insitutionList()
    {
        $allinsitution = addInstitution::all();
        return view('/agent/insitutionList', compact('allinsitution'));
    }

    public function packagestatus(Request $request)
    {
        $duration = 'Monthly';
        $startdate = '';
        $enddate = '';

        if ($request->duration == "Yearly") {
            $duration = 'Yearly';
            $startdate = date('Y-m-d H:i:s');
            $future_timestamp = strtotime("+12 month");
            $enddate = date('Y-m-d H:i:s', $future_timestamp);

        } else {
            $duration = 'Monthly';
            $startdate = date('Y-m-d');
            $future_timestamp = strtotime("+1 month");
            $enddate = date('Y-m-d ', $future_timestamp);
        }

        $id = Session::get('agent_id');
        $agent_profile = AgentModel::where('id', $id)->first();
        $agent_profile->package_id = $request->package_id;
        $agent_profile->package_duration = $duration;
        $agent_profile->package_start_date = $startdate;
        $agent_profile->package_end_date = $enddate;
        $agent_profile->package_status = '1';
        if ($agent_profile->save()) {

            return redirect()->route('agent/checkout');
        } else {
            return back();
        }
    }

    public function addrolePermission()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {

            $editRole = '';
            $country = DB::table('country')->get();
            return view('agent/addRole', compact('editRole', 'country'));
        }
    }

    public function addroleFeatures(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'role' => 'required',
            'country' => 'required',

        ], [
            'name.required' => 'Contact name is must required.',
            'email.required' => 'Relationship  is must required.',
            'phone.required' => 'Contact phone  is must required.',
            'password.required' => 'Contact email is must required.',
            'role.required' => 'Contact email is must required.',
            'country.required' => 'Contact email is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $userexit = InstitutionModel::where('email', $request->email)->first();
        $userexit = StudentModel::where('email', $request->email)->first();
        $userexit = AgentModel::where('email', $request->email)->first();
        $userexit = addRole::where('email', $request->email)->first();
        if ($userexit) {
            return back()->with('emailexit', 'Email Already Exit');
        }
        $id = Session::get('agent_id');
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $type = 'agent';
        $role_type = '1';
        $country = $request->country;

        $json = json_encode($request->rolefeatures);

        $createrole = addRole::create(['agent_id' => $id, 'name' => $name, 'country' => $country, 'email' => $email, 'phone' => $phone, 'role' => $role, 'type' => $type, 'password' => Hash::make($password), 'rolefeatures' => $json]);
        $id = Session::get('agent_id');
        $agentmail = AgentModel::where('id', $id)->first();

        if ($createrole) {
            $details = [
                'agentmail' => $agentmail->email,
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ];

            return redirect()->route('agent/role-permission')->with('emailsend', 'Please send login credtionals with your personal account');

        } else {

            return back();
        }
    }

    public function roledelete($id)
    {

        $roles = addRole::where('id', $id)->delete();

        return back();
    }

    public function editRole($id)
    {
        $editRole = addRole::where('id', $id)->first();

        $country = DB::table('country')->get();
        return view('agent/addRole', compact('editRole', 'country'));
    }

    public function updateroleFeatures(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'country' => 'required',
        ], [
            'name.required' => 'Contact name is must required.',
            'email.required' => 'Relationship  is must required.',
            'phone.required' => 'Contact phone  is must required.',
            'role.required' => 'Contact email is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $roleFeat = addRole::where('id', $request->id)->first();
        $roleFeat->name = $request->name;
        $roleFeat->phone = $request->phone;
        $roleFeat->email = $request->email;
        $roleFeat->role = $request->role;
        $type = 'admin';
        $json = json_encode($request->rolefeatures);
        $roleFeat->rolefeatures = $json;
        $roleFeat->country = $request->country;

        if ($roleFeat->save()) {
            return redirect()->route('agent/role-permission');

        } else {

            return back();
        }
    }

    public function addLead(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'last_name' => 'required',
            'source' => 'required',
            'comment' => 'required',

        ], [
            'first_name.required' => 'Contact name is must required.',
            'email.required' => 'Relationship  is must required.',
            'phone.required' => 'Contact phone  is must required.',
            'last_name.required' => 'Contact email is must required.',
            'comment.required' => 'Contact email is must required.',
            'source.required' => 'Contact email is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phone = $request->phone;
        $source = $request->source;
        $comment = $request->comment;
        $lead_ownwer = Session::get('agent_id');
        $type = 'agent';
        $lead_assign_id = $request->agent;

        $lead = addLead::create(['first_name' => $first_name, 'email' => $email, 'phone' => $phone, 'last_name' => $last_name, 'source' => $source, 'comment' => $comment, 'lead_ownwer' => $lead_ownwer, 'type' => $type, 'lead_assign_id' => $lead_assign_id]);
        if ($lead) {
            return redirect()->route('/agent/lead-manage');
        } else {
            return back();
        }
    }

    public function leaddelete(
        $id) {
        $lead = addLead::find($id);
        $lead->delete();
        return back()->with('delete', 'Lead delete successfully');
    }

    public function checkout()
    {
        $id = Session::get('agent_id');
        $agent = AgentModel::where('id', $id)->first();
        $package = addPackage::where('id', $agent->package_id)->where('type', '1')->first();
        return view('agent/checkout', compact('package', 'agent'));
    }

    public function leadmanage()
    {
        $id = Session::get('agent_id');
        $leads = addLead::where('lead_ownwer', $id)->where('status', '0')->get();
        $staff = addRole::where('type', 'agent')->where('agent_id', $id)->get();
        return view('agent/manageLead', compact('leads', 'staff'));
    }

    public function assignstaff(Request $request)
    {
        $assignlead = addLead::where('id', $request->assign_id)->first();
        $assignlead->staff_assign_id = $request->agent;
        if ($assignlead->save()) {
            return redirect()->route('/agent/lead-manage');
        } else {
            return redirect()->route('/agent/lead-manage');
        }
    }

    public function completeleadmanage()
    {
        $id = Session::get('agent_id');
        $leads = addLead::where('lead_ownwer', $id)->where('status', '1')->get();
        $staff = addRole::where('type', 'agent')->get();
        return view('agent/completemanageLead', compact('leads', 'staff'));
    }

    public function support()
    {
        $id = Session::get('agent_id');
        $support = addSupport::where('agent_id', $id)->where('type', 'agent')->get();
        return view('agent/support', compact('support'));
    }

    public function roleleadmanage()
    {
        $id = Session::get('roleidd');
        $leads = addLead::where('staff_assign_id', $id)->where('status', '0')->get();
        $staff = addRole::where('type', 'agent')->get();
        return view('agent/rolemanageLead', compact('leads', 'staff'));
    }
    public function changeStatus(Request $request)
    {
        $user = addLead::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function completeroleleadmanage()
    {
        $id = Session::get('roleidd');
        $leads = addLead::where('staff_assign_id', $id)->where('status', '1')->get();

        return view('agent/completerolemanageLead', compact('leads'));
    }

    public function addsupport()
    {
        return view('agent/addSupport');
    }

    public function addsupportdata(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'subject' => 'required',
            'comment' => 'required',
        ], [
            'subject.required' => 'Subject name is must required.',
            'comment.required' => 'Comment  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $subject = $request->subject;
        $comment = $request->comment;
        $type = 'agent';
        $agent__id = Session::get('agent_id');

        $support = addSupport::create(['subject' => $subject, 'comment' => $comment, 'type' => $type, 'agent_id' => $agent__id, 'insitution_id' => '0']);
        if ($support) {
            return redirect()->route('agent/support');
        } else {
            return back();
        }
    }

    public function addtask(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'task_title' => 'required',
            'staff' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            //  'comment' => 'required',

        ], [
            'task_title.required' => 'Title is must required.',
            'staff.required' => 'Title is must required.',
            'start_date.required' => 'Start date is must required.',
            'end_date.required' => 'End date  is must required.',
            //  'comment.required' => 'Question is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $task_title = $request->task_title;
        $staff = $request->staff;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $comment = $request->comment;
        $cancelMessage = '';
        $type = 'agent';
        $id = Session::get('agent_id');
        $task = addTask::create(['agent_id' => $id, 'task_name' => $task_title, 'priority' => $request->priority, 'cancelMessage' => $cancelMessage, 'type' => $type, 'assign_id' => $staff, 'start_date' => $start_date, 'end_date' => $end_date, 'task_description' => $comment]);
        if ($task) {
            return redirect()->route('agent/task-manage')->with('delete', 'Task Added successfully');
        } else {
            return redirect()->route('agent/task-manage')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function addAgenttask(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'task_title' => 'required',

            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            //  'comment' => 'required',

        ], [
            'task_title.required' => 'Title is must required.',

            'start_date.required' => 'Start date is must required.',
            'end_date.required' => 'End date  is must required.',
            //  'comment.required' => 'Question is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $task_title = $request->task_title;

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $comment = $request->comment;
        $cancelMessage = '';
        $type = 'agent';

        $id = Session::get('agent_id');
        $task = addTask::create(['agent_id' => $id, 'task_name' => $task_title, 'priority' => $request->priority, 'cancelMessage' => $cancelMessage, 'type' => $type, 'start_date' => $start_date, 'end_date' => $end_date, 'task_description' => $comment]);
        if ($task) {
            return redirect()->route('/agent/self-task-manage')->with('delete', 'Task Added successfully');
        } else {
            return redirect()->route('agent/self-task-manage')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function assignTask()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('agent/login');
        } else {
            $id = Session::get('roleidd');
            $task = addTask::where('assign_id', $id)->where('type', 'agent')->where('status', '0')->get();
            return view('agent/assignTask', compact('task'));
        }
    }

    public function completetask($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('agent/login');
        } else {
            $task = addTask::find($id);
            $task->status = '2';
            if ($task->save()) {
                return back()->with('complete', 'Change status successfully');
            } else {
                return back();
            }

        }
    }

    public function cancelChangeStatus(Request $request)
    {
        $task = addTask::find($request->user_id);
        $task->status = '1';
        $task->cancelMessage = $request->status;
        $task->save();

        return response()->json(['success' => 'Cancel task successfully.']);
    }

    public function sendEmail()
    {

        $id = Session::get('agent_id');
        $emailprofile = emailModel::where('agent_id', $id)->where('type', 'agent')->orderBy('id', 'desc')->take(5)->get();
        $group = addGroup::where('type', 'agent')->get();
        $template = addEmailTemplate::where('agent_id', $id)->where('add_type', 'agent')->get();
        return view('agent/sendEmailGroup', compact('group', 'emailprofile', 'template'));
    }

    public function sendSingleEmail(Request $request)
    {
        $id = Session::get('agent_id');
        $exit = EmailSubcription::where('agent_id', $id)->where('type', 'agent')->first();
        if ($exit) {
            if ($exit->remaining_email == '0') {
                return back()->with('message', 'You have no any more email');
            } else {
                $validate = Validator::make($request->all(), [
                    'senderEmail' => 'required',
                    'member' => 'required',
                    'subject' => 'required',
                    'message' => 'required',
                    'membertype' => 'required',

                ], [
                    'senderEmail.required' => 'Sender Email  is must required.',
                    'member.required' => 'Email  is must required.',
                    'subject.required' => 'Subject  is must required.',
                    'message.required' => 'Message is must required.',
                    'membertype.required' => 'Message is must required.',
                ]);

                if ($validate->fails()) {
                    return back()->withErrors($validate->errors())->withInput();
                }

                $senderEmail = $request->senderEmail;
                $email = $request->member;
                $subject = $request->subject;
                $message = $request->message;
                $id = Session::get('agent_id');
                $agent = AgentModel::where('id', $id)->first();

                $type = 'agent';
                $details = [

                    'subject' => $subject,
                    'email' => $request->member,
                    'message' => $message,
                ];
                $id = Session::get('agent_id');

                Mail::to($request->member)->send(new sendemailbyadmin($details));
                $email = emailModel::create(['agent_id' => $id, 'sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $request->membertype]);

                if ($email) {
                    $exit = EmailSubcription::where('agent_id', $id)->where('type', 'agent')->first();
                    if ($exit) {
                        $exit->remaining_email = $exit->remaining_email - 1;
                        $exit->save();
                    }

                    return back()->with('message', 'Email send successfully');
                } else {
                    return back();
                }
            }
        } else {
            return back()->with('message', 'First You Buy Email Package');
        }

    }

    public function sendGroupEmail(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'senderEmail' => 'required',
            'group' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ], [
            'senderEmail.required' => 'Sender Email  is must required.',
            'group.required' => 'Email  is must required.',
            'subject.required' => 'Subject  is must required.',
            'message.required' => 'Message is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $groupss = addGroupMember::where('group_id', $request->group)->get();
        $id = Session::get('agent_id');
        $exit = EmailSubcription::where('agent_id', $id)->where('type', 'agent')->first();

        if ($exit) {
            if ($exit->remaining_email == '0') {
                return back()->with('message', 'You have no any more email');
            } else {

                foreach ($groupss as $value) {

                    if ($value->type == "Agent") {
                        $agent = AgentModel::find($value->member_id);

                        $senderEmail = $request->senderEmail;
                        $email = $agent->email;
                        $subject = $request->subject;
                        $message = $request->message;
                        $type = 'agent';
                        $details = [
                            'subject' => $subject,
                            'email' => $request->email,
                            'message' => $message,
                        ];

                        Mail::to($request->email)->send(new sendemailbyadmin($details));
                        $email = emailModel::create(['agent_id' => $id, 'sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);
                        $id = Session::get('agent_id');
                        $exit = EmailSubcription::where('agent_id', $id)->where('type', 'agent')->first();
                        if ($exit) {
                            $exit->remaining_email = $exit->remaining_email - 1;
                            $exit->save();
                        }
                    } elseif ($value->type == "Insitution") {

                        $student = InstitutionModel::find($value->member_id);
                        $senderEmail = $request->senderEmail;
                        $email = $student->email;
                        $subject = $request->subject;
                        $message = $request->message;
                        $type = 'admin';
                        $details = [
                            'subject' => $subject,
                            'email' => $request->email,
                            'message' => $message,
                        ];

                        Mail::to($request->email)->send(new sendemailbyadmin($details));
                        $email = emailModel::create(['agent_id' => $id, 'sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

                        $id = Session::get('agent_id');
                        $exit = EmailSubcription::where('agent_id', $id)->where('type', 'agent')->first();
                        if ($exit) {
                            $exit->remaining_email = $exit->remaining_email - 1;
                            $exit->save();
                        }
                    } else {
                        $student = StudentModel::find($value->member_id);
                        $senderEmail = $request->senderEmail;
                        $email = $student->email;
                        $subject = $request->subject;
                        $message = $request->message;
                        $type = 'admin';
                        $details = [
                            'subject' => $subject,
                            'email' => $request->email,
                            'message' => $message,
                        ];

                        Mail::to($request->email)->send(new sendemailbyadmin($details));
                        $email = emailModel::create(['agent_id' => $id, 'sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

                        $id = Session::get('agent_id');
                        $exit = EmailSubcription::where('agent_id', $id)->where('type', 'agent')->first();
                        if ($exit) {
                            $exit->remaining_email = $exit->remaining_email - 1;
                            $exit->save();
                        }

                    }
                }
                return back()->with('message', 'Email send successfully');
            }
        } else {
            return back()->with('message', 'First You Buy Email Package');
        }

    }

    public function getgroup()
    {
        $id = Session::get('agent_id');
        $group = addGroup::where('agent_id', $id)->where('type', 'agent')->get();
        return view('agent/getgroup', compact('group'));
    }

    public function addGroupMember($id)
    {
        $groupmember = addGroupMember::where('group_id', $id)->get();
        return view('agent/addGroupMember', compact('id', 'groupmember'));
    }

    public function addMembers(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'membertype' => 'required',
            'member' => 'required',

        ], [
            'membertype.required' => 'Group name is must required.',
            'member.required' => 'Group description  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        foreach ($request->member as $value) {

            $type = $request->membertype;
            $member_id = $value;
            $group_id = $request->id;

            $group = addGroupMember::create(['group_id' => $group_id, 'member_id' => $value, 'type' => $type]);
        }

        return back()->with('message', 'Member added successfully');

    }

    public function getEmail()
    {
        $id = Session::get('agent_id');
        $email = emailModel::where('agent_id', $id)->get();
        return view('agent/getEmailLog', compact('email'));
    }

    public function addGroup(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'group_name' => 'required',
            'group_description' => 'required',
            'type' => 'required',
        ], [
            'group_name.required' => 'Group name is must required.',
            'group_description.required' => 'Group description  is must required.',
            'type.required' => 'Type  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $group_name = $request->group_name;
        $group_description = $request->group_description;
        $type = 'agent';
        $id = Session::get('agent_id');
        $group = addGroup::create(['agent_id' => $id, 'group_name' => $group_name, 'group_description' => $group_description, 'type' => $type]);
        if ($group) {
            return back()->with('message', 'Email send successfully');
        } else {
            return back();
        }
    }

    public function smsSend()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $agentprofile = AgentModel::where('id', $id)->first();
            $smsprofile = smsModel::where('agent_id', $id)->where('type', 'agent')->orderBy('id', 'desc')->take(5)->get();
            $group = addSmsGroup::where('type', 'agent')->get();
            $template = addSmsTemplate::where('agent_id', $id)->where('add_type', 'agent')->get();
            $id = Session::get('agent_id');
            $balance_check = SmsSubcription::where('agent_id', $id)->where('type', 'agent')->orderBy('id', 'DESC')->first();
            if ($balance_check) {
                if ($balance_check->remaining_sms > 0) {
                    $remaining = $balance_check->remaining_sms;
                } else {
                    $remaining = '0';
                }
            } else {
                $remaining = '0';
            }
            return view('agent/smsSend', compact('smsprofile', 'group', 'agentprofile', 'template', 'remaining'));
        }
    }

    public function sendSms(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'phone' => 'required',
            'member' => 'required',
            'message' => 'required',
            'membertype' => 'required',

        ], [
            'phone.required' => 'Sender Email  is must required.',
            'member.required' => 'Email  is must required.',
            'message.required' => 'Message is must required.',
            'membertype.required' => 'Message is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = Session::get('agent_id');
        $balance_check = SmsSubcription::where('agent_id', $id)->where('type', 'agent')->first();
        if ($balance_check) {
            if ($balance_check->remaining_sms > 0) {
                $senderphone = $request->phone;
                $sms = $request->member;
                $message = $request->message;
                $type = 'agent';

                if ($request->membertype == 'Agent') {
                    $exit = AgentModel::where('phone', $request->member)->first();
                    if ($exit->country == 'Australia') {
                        $text = strip_tags($request->message);

                        $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
                        $fields = array(
                            'sms_text' => $text, //here goes your SMS text
                            'numbers' => $request->member, // Your numbers array goes here
                        );
                        $headers = array(
                            'APPKEY: CELLCAST2edb4a4745d8822fae2788241d9d604a',
                            'Accept: application/json',
                            'Content-Type: application/json',
                        );

                        $ch = curl_init(); //open connection
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, count($fields));
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        if (!$result = curl_exec($ch)) {
                            $response_error = json_decode(curl_error($ch));
                            return back()->with('message', 'Sms Not Send successfully');
                        }
                        curl_close($ch);

                    } elseif ($exit->country == 'Nepal') {
                        $id = Session::get('agent_id');
                        $agentcompany = AgentModel::where('id', $id)->first();

                        $text = strip_tags($request->message);
                        $args = http_build_query(array(
                            'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                            'from' => 'studify',
                            'to' => $request->member,
                            'text' => $text));

                        $url = "http://api.sparrowsms.com/v2/sms/";

                        # Make the call using API.
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                        // Response
                        $response = curl_exec($ch);
                        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                    }

                } elseif ($request->membertype == 'Student') {
                    $exit = StudentModel::where('phone', $request->member)->first();
                    if ($exit->country == 'Australia') {

                        $text = strip_tags($request->message);

                        $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
                        $fields = array(
                            'sms_text' => $text, //here goes your SMS text
                            'numbers' => $request->member, // Your numbers array goes here
                        );
                        $headers = array(
                            'APPKEY: CELLCAST2edb4a4745d8822fae2788241d9d604a',
                            'Accept: application/json',
                            'Content-Type: application/json',
                        );

                        $ch = curl_init(); //open connection
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, count($fields));
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        if (!$result = curl_exec($ch)) {
                            $response_error = json_decode(curl_error($ch));
                            return back()->with('message', 'Sms Not Send successfully');
                        }
                        curl_close($ch);

                    } elseif ($exit->country == 'Nepal') {

                        $text = strip_tags($request->message);
                        $id = Session::get('agent_id');
                        $agentcompany = AgentModel::where('id', $id)->first();
                        $args = http_build_query(array(

                            'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                            'from' => 'studify',
                            'to' => $request->member,
                            'text' => $text));

                        $url = "http://api.sparrowsms.com/v2/sms/";

                        # Make the call using API.
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                        // Response
                        $response = curl_exec($ch);
                        print_r($response);
                        die;
                        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                    }

                } else {
                    $exit = addRole::where('phone', $request->member)->first();
                    if ($exit->country == 'Australia') {
                        $text = strip_tags($request->message);

                        $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
                        $fields = array(
                            'sms_text' => $text, //here goes your SMS text
                            'numbers' => $request->member, // Your numbers array goes here
                        );
                        $headers = array(
                            'APPKEY: CELLCAST2edb4a4745d8822fae2788241d9d604a',
                            'Accept: application/json',
                            'Content-Type: application/json',
                        );

                        $ch = curl_init(); //open connection
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_HEADER, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, count($fields));
                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        if (!$result = curl_exec($ch)) {
                            $response_error = json_decode(curl_error($ch));
                            return back()->with('message', 'Sms Not Send successfully');
                        }
                        curl_close($ch);
                    } elseif ($exit->country == 'Nepal') {
                        $text = strip_tags($request->message);
                        $id = Session::get('agent_id');
                        $agentcompany = AgentModel::where('id', $id)->first();
                        $args = http_build_query(array(
                            'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                            'from' => 'studify',
                            'to' => $request->member,
                            'text' => $text));

                        $url = "http://api.sparrowsms.com/v2/sms/";

                        # Make the call using API.
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                        // Response
                        $response = curl_exec($ch);
                        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                    }

                }

                $id = Session::get('agent_id');
                $sms = smsModel::create(['agent_id' => $id, 'sender' => $senderphone, 'reciever' => $sms, 'message' => $message, 'type' => $type, 'member_type' => $request->membertype]);

                if ($sms) {
                    $exit = SmsSubcription::where('agent_id', $id)->where('type', 'agent')->orderBy('id', 'DESC')->first();
                    if ($exit) {
                        $exit->remaining_sms = $exit->remaining_sms - 1;
                        $exit->save();
                    }

                    return back()->with('message', 'SMS send successfully');
                } else {
                    return back();
                }
            } else {
                return back()->with('message', 'Your SMS Limit is finish , Please Upgrade Your Plans');
            }
        } else {
            return back()->with('message', 'Please Select Your Sms Package');

        }
    }

    public function getsmsgroup()
    {
        $id = Session::get('agent_id');
        $smsgroup = addSmsGroup::where('agent_id', $id)->where('type', 'agent')->get();
        return view('agent/getSmsGroup', compact('smsgroup'));
    }

    public function addSmsGroup(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'group_name' => 'required',
            'group_description' => 'required',
            'type' => 'required',
        ], [
            'group_name.required' => 'Group name is must required.',
            'group_description.required' => 'Group description  is must required.',
            'type.required' => 'Type  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $group_name = $request->group_name;
        $group_description = $request->group_description;
        $type = 'agent';
        $id = Session::get('agent_id');
        $group = addSmsGroup::create(['agent_id' => $id, 'group_name' => $group_name, 'group_description' => $group_description, 'type' => $type]);
        if ($group) {
            return back()->with('message', 'Email send successfully');
        } else {
            return back();
        }
    }

    public function addSmsGroupMember($id)
    {
        $smsprofile = addSmsGroupMember::where('group_id', $id)->orderBy('id', 'desc')->take(5)->get();

        return view('agent/addSmsGroupMember', compact('id', 'smsprofile'));
    }

    public function addSmsMembers(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'membertype' => 'required',
            'member' => 'required',

        ], [
            'membertype.required' => 'Group name is must required.',
            'member.required' => 'Group description  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        foreach ($request->member as $value) {

            $type = $request->membertype;
            $member_id = $value;
            $group_id = $request->id;

            $group = addSmsGroupMember::create(['group_id' => $group_id, 'member_id' => $value, 'type' => $type]);
        }

        return back()->with('message', 'Member added successfully');

    }

    public function GroupSmsSend(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'phone' => 'required',
            'group' => 'required',
            'message' => 'required',
        ], [
            'phone.required' => 'Sender Email  is must required.',
            'group.required' => 'Email  is must required.',
            'message.required' => 'Message is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = Session::get('agent_id');
        $balance_check = SmsSubcription::where('agent_id', $id)->where('type', 'agent')->first();
        if ($balance_check) {
            if ($balance_check->remaining_sms > 0) {

                $groupss = addSmsGroupMember::where('group_id', $request->group)->get();

                foreach ($groupss as $value) {

                    if ($value->type == "Agent") {
                        $agent = AgentModel::find($value->member_id);
                        if ($agent->country == 'Australia') {
                            $text = strip_tags($request->message);

                            $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
                            $fields = array(
                                'sms_text' => $text, //here goes your SMS text
                                'numbers' => $agent->phone, // Your numbers array goes here
                            );
                            $headers = array(
                                'APPKEY: CELLCAST2edb4a4745d8822fae2788241d9d604a',
                                'Accept: application/json',
                                'Content-Type: application/json',
                            );

                            $ch = curl_init(); //open connection
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_HEADER, false);
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, count($fields));
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            if (!$result = curl_exec($ch)) {
                                $response_error = json_decode(curl_error($ch));
                                return back()->with('message', 'Sms Not Send successfully');
                            }
                            curl_close($ch);
                        } elseif ($agent->country == 'Nepal') {
                            $id = Session::get('agent_id');
                            $agentcompany = AgentModel::where('id', $id)->first();

                            $text = strip_tags($request->message);
                            $args = http_build_query(array(
                                'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                                'from' => 'studify',
                                'to' => $agent->phone,
                                'text' => $text));

                            $url = "http://api.sparrowsms.com/v2/sms/";

                            # Make the call using API.
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                            // Response
                            $response = curl_exec($ch);
                            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                            curl_close($ch);
                        }
                        $senderEmail = $request->phone;
                        $phone = $agent->phone;
                        $message = $request->message;
                        $type = 'agent';
                        $sms = smsModel::create(['sender' => $senderEmail, 'reciever' => $phone, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

                    } elseif ($value->type == "Insitution") {

                        $insitution = InstitutionModel::find($value->member_id);
                        if ($insitution->country == 'Australia') {
                            $text = strip_tags($request->message);

                            $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
                            $fields = array(
                                'sms_text' => $text, //here goes your SMS text
                                'numbers' => $insitution->phone, // Your numbers array goes here
                            );
                            $headers = array(
                                'APPKEY: CELLCAST2edb4a4745d8822fae2788241d9d604a',
                                'Accept: application/json',
                                'Content-Type: application/json',
                            );

                            $ch = curl_init(); //open connection
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_HEADER, false);
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, count($fields));
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            if (!$result = curl_exec($ch)) {
                                $response_error = json_decode(curl_error($ch));
                                return back()->with('message', 'Sms Not Send successfully');
                            }
                            curl_close($ch);
                        } elseif ($insitution->country == 'Nepal') {
                            $text = strip_tags($request->message);
                            $args = http_build_query(array(
                                'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                                'from' => 'studify',
                                'to' => $insitution->phone,
                                'text' => $text));

                            $url = "http://api.sparrowsms.com/v2/sms/";

                            # Make the call using API.
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                            // Response
                            $response = curl_exec($ch);
                            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                            curl_close($ch);
                        }

                        $senderEmail = $request->phone;
                        $email = $insitution->phone;
                        $message = $request->message;
                        $type = 'insitution';

                        $sms = smsModel::create(['sender' => $senderEmail, 'reciever' => $email, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

                    } else {
                        $student = StudentModel::find($value->member_id);
                        if ($student->country == 'Australia') {
                            $text = strip_tags($request->message);

                            $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
                            $fields = array(
                                'sms_text' => $text, //here goes your SMS text
                                'numbers' => $student->phone, // Your numbers array goes here
                            );
                            $headers = array(
                                'APPKEY: CELLCAST2edb4a4745d8822fae2788241d9d604a',
                                'Accept: application/json',
                                'Content-Type: application/json',
                            );

                            $ch = curl_init(); //open connection
                            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($ch, CURLOPT_HEADER, false);
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, count($fields));
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            if (!$result = curl_exec($ch)) {
                                $response_error = json_decode(curl_error($ch));
                                return back()->with('message', 'Sms Not Send successfully');
                            }
                            curl_close($ch);
                        } elseif ($student->country == 'Nepal') {
                            $text = strip_tags($request->message);
                            $args = http_build_query(array(
                                'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                                'from' => 'studify',
                                'to' => $student->phone,
                                'text' => $text));

                            $url = "http://api.sparrowsms.com/v2/sms/";

                            # Make the call using API.
                            $ch = curl_init();
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                            // Response
                            $response = curl_exec($ch);
                            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                            curl_close($ch);
                        }

                        $senderEmail = $request->phone;
                        $email = $student->phone;
                        $message = $request->message;
                        $type = 'agent';

                        $sms = smsModel::create(['sender' => $senderEmail, 'reciever' => $email, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

                    }
                    $id = Session::get('agent_id');
                    $exit = SmsSubcription::where('agent_id', $id)->where('type', 'agent')->orderBy('id', 'DESC')->first();
                    if ($exit) {
                        $exit->remaining_sms = $exit->remaining_sms - 1;
                        $exit->save();
                    }

                }
                return back()->with('message', 'Sms Send successfully');

            } else {
                return back()->with('message', 'Your SMS Limit is finish , Please Upgrade Your Plans');
            }
        } else {
            return back()->with('message', 'Please Select Your Sms Package');

        }
    }

    public function getSms()
    {
        $id = Session::get('agent_id');
        $sms = smsModel::where('agent_id', $id)->get();
        return view('agent/getSmsLog', compact('sms'));
    }

    public function workflow()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $workflow = workflow::all();
            $id = Session::get('agent_id');
            $students = StudentModel::where('agent_id', '=', $id)->get();
            return view('agent/workflow', compact('students', 'workflow'));

        }
    }

    public function workflowDetail($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $workflow = workflow::all();
            return view('agent/workflowDetail', compact('workflow', 'id'));

        }
    }

    public function workflowPending($workflow_id, $student_id)
    {
        $exit = studentWorkflow::where('student_id', $student_id)->where('workflow_id', $workflow_id)->first();
        if ($exit) {
            $exit->delete();
            $workflow = studentWorkflow::create(['student_id' => $student_id, 'workflow_id' => $workflow_id, 'status' => '0']);
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);
        } else {
            $workflow = studentWorkflow::create(['student_id' => $student_id, 'workflow_id' => $workflow_id, 'status' => '0']);
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);
        }

    }

    public function workflowReject($workflow_id, $student_id)
    {
        $exit = studentWorkflow::where('student_id', $student_id)->where('workflow_id', $workflow_id)->first();
        if ($exit) {
            $exit->delete();
            $workflow = studentWorkflow::create(['student_id' => $student_id, 'workflow_id' => $workflow_id, 'status' => '1']);
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);
        } else {
            $workflow = studentWorkflow::create(['student_id' => $student_id, 'workflow_id' => $workflow_id, 'status' => '1']);
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);
        }

    }

    public function workflowComplete($workflow_id, $student_id)
    {

        $exit = studentWorkflow::where('student_id', $student_id)->where('workflow_id', $workflow_id)->first();
        if ($exit) {
            $exit->delete();
            $workflow = studentWorkflow::create(['student_id' => $student_id, 'workflow_id' => $workflow_id, 'status' => '2']);
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);
        } else {
            $workflow = studentWorkflow::create(['student_id' => $student_id, 'workflow_id' => $workflow_id, 'status' => '2']);
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);
        }

    }

    public function account()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {

            return view('agent/account');

        }
    }

    public function studentInvoice()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $studentPayment = universityCoursePayment::where('status', '1')->where('agent_id', $id)->where('invoice_status', '0')->get();

            return view('agent/studentInvoice', compact('studentPayment'));

        }
    }

    public function fullcalender(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('roleidd');
            $tasks = addTask::where('assign_id', '=', $id)->where('type', '=', 'agent')->get();

            return view('agent/fullcalender', compact('tasks'));
        }
    }

    public function calender(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $tasks = addTask::where('agent_id', $id)->where('type', 'agent')->get();
            $agent = AgentModel::find($id);

            return view('agent/agentCalender', compact('tasks', 'agent'));
        }
    }

    public function getsmsPackage(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $package = smsPackage::where('country', 'Other')->get();
            $nepalpackage = smsPackage::where('country', 'Nepal')->get();

            return view('agent/getSmsPackage', compact('package', 'nepalpackage'));
        }
    }

    public function getemailPackage(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $package = email_package::where('country', 'Other')->get();
            $nepalpackage = email_package::where('country', 'Nepal')->get();

            return view('agent/getEmailPackage', compact('package', 'nepalpackage'));
        }
    }

    public function emailPackagePayment($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $package = email_package::where('id', $id)->first();
            return view('agent/getEmailPackagePayment', compact('package'));
        }
    }

    public function storagePackagePayment($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $package = addStoragePackage::where('id', $id)->first();
            return view('agent/getStoragePackagePayment', compact('package'));
        }
    }

    public function smsPackagePayment($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $package = smsPackage::where('id', $id)->first();

            return view('agent/getSmsPackagePayment', compact('package'));
        }
    }

    public function sampleDocument(Request $request)
    {

        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            if ($request->category) {
                $validate = Validator::make($request->all(), [
                    'category' => 'required',
                    'subcategory' => 'required',
                ], [
                    'category.required' => 'Email is must required.',
                    'subcategory.required' => 'Email is must required.',

                ]);

                if ($validate->fails()) {
                    return back()->withErrors($validate->errors())->withInput();
                }

                $category = addSampleDocument::where('type', 'category')->get();
                $subcategory = addSampleDocument::where('type', 'subcategory')->get();
                $document = addSampleDocument::where('category', $request->category)->where('sub_category', $request->subcategory)->get();
                $searchcategoryss = $request->category;
                $searchcategory = addSampleDocument::where('id', $request->category)->where('type', 'category')->first();

                $searchsubcategory = addSampleDocument::where('id', $request->subcategory)->where('type', 'subcategory')->first();

                $searchsubcategoryss = $searchsubcategory;
                return view('agent/getSampleDocument', compact('document', 'category', 'subcategory', 'searchcategory', 'searchsubcategoryss'));
            } else {
                $category = addSampleDocument::where('type', 'category')->get();
                $subcategory = addSampleDocument::where('type', 'subcategory')->get();
                $document = addSampleDocument::where('type', 'document')->get();
                $searchcategory = '';
                $searchsubcategoryss = '';
                return view('agent/getSampleDocument', compact('document', 'category', 'subcategory', 'searchcategory', 'searchsubcategoryss'));
            }
        }
    }

    public function downloadsample($id)
    {
        $document = addSampleDocument::where('id', $id)->first();
        $filepath = public_path('/SampleDocument/' . $document->document);
        return Response::download($filepath);

    }

    public function viewsample($id)
    {
        $document = addSampleDocument::where('id', $id)->first();
        $filepath = public_path('/SampleDocument/' . $document->document);

        return response()->file(public_path('/SampleDocument/' . $document->document), ['content-type' => 'application/pdf']);
    }

    public function getDocument(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $id = Session::get('agent_id');
            $folder = addDocument::where('p_id', '0')->where('agent_id', $id)->orderBy('id', 'DESC')->get();
            $getfile = addDocument::where('p_id', '0')->where('agent_id', $id)->orderBy('id', 'DESC')->limit(3)->get();
            return view('agent/getDocument', compact('folder', 'id', 'getfile'));
        }
    }

    public function createDocumentFolder(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $validate = Validator::make($request->all(), [
                'folder_name' => 'required',
            ], [
                'folder_name.required' => 'Email is must required.',
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }

            $id = Session::get('agent_id');
            $owner = agentModel::where('id', $id)->first();
            $folder = addDocument::create(['agent_id' => $id, 'insitution_id' => '0', 'level' => '1', 'foldername' => $request->folder_name]);
            if ($folder) {
                return back();
            } else {
                return back();
            }
        }
    }

    public function getDocumentFolder($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $folder_id = $id;
            $agent_id = Session::get('agent_id');
            $folder = addDocument::where('p_id', $id)->where('agent_id', $agent_id)->where('level', '2')->orderBy('id', 'DESC')->get();
            $getfile = addDocument::where('p_id', $id)->where('agent_id', $agent_id)->where('level', '2')->orderBy('id', 'DESC')->limit(3)->get();
            $id = Session::get('agent_id');
            return view('agent/getSubFolder', compact('folder', 'agent_id', 'folder_id', 'getfile', 'id'));
        }
    }

    public function createDocumentSubFolder(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $validate = Validator::make($request->all(), [
                'folder_name' => 'required',
            ], [
                'folder_name.required' => 'Email is must required.',
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $folder_id = $request->folder_id;
            $agent_id = Session::get('agent_id');
            $owner = agentModel::where('id', $agent_id)->first();
            $folder = addDocument::create(['agent_id' => $agent_id, 'insitution_id' => '0', 'p_id' => $folder_id, 'level' => '2', 'foldername' => $request->folder_name]);

            if ($folder) {
                return back();
            } else {
                return back();
            }
        }
    }

    public function getFiles($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $folder_id = $id;
            $agent_id = Session::get('agent_id');
            $folder = addDocument::where('p_id', $id)->where('agent_id', $agent_id)->where('level', '3')->orderBy('id', 'DESC')->get();
            $getfile = addDocument::where('p_id', $id)->where('agent_id', $agent_id)->where('level', '3')->orderBy('id', 'DESC')->limit(3)->get();
            $id = Session::get('agent_id');

            return view('agent/getFiles', compact('folder', 'agent_id', 'folder_id', 'getfile', 'id'));
        }
    }

    public function createFile(Request $request)
    {

        $agent_id = Session::get('agent_id');
        $checkpackageexit = StorageSubcription::where('agent_id', $agent_id)->first();
        if ($checkpackageexit) {
            $document = '';

            if (!empty($request->file)) {
                $files = $request->file('file');
                $fileName = $files->getClientOriginalName();
                // $extensions = $files->getClientOriginalExtension();
                // $filenames = time().rand(1,99).'.' . $extensions;
                $filePath = 'agent/agent_' . $agent_id;
                $path = $request->file('file')->storeAs(
                    $filePath,
                    $fileName,
                    's3'
                );
                $document = $fileName;
            }

            $folder = addDocument::create(['agent_id' => $agent_id, 'insitution_id' => '0', 'level' => '1', 'filename' => $document]);

            if ($folder) {
                return response()->json(['success' => 'File Upload successfully.']);
            } else {
                return response()->json(['success' => 'Status change successfully.']);
            }
        } else {
            return response()->json(['success' => 'First You Buy Storage Package']);

        }
    }

    public function createFolderFile(Request $request)
    {

        $agent_id = Session::get('agent_id');
        $checkpackageexit = StorageSubcription::where('agent_id', $agent_id)->first();
        if ($checkpackageexit) {
            $document = '';

            if (!empty($request->file)) {
                $files = $request->file('file');
                $fileName = $files->getClientOriginalName();
                // $extensions = $files->getClientOriginalExtension();
                // $filenames = time().rand(1,99).'.' . $extensions;
                $filePath = 'agent/agent_' . $agent_id;
                $path = $request->file('file')->storeAs(
                    $filePath,
                    $fileName,
                    's3'
                );
                $document = $fileName;
            }

            $folder = addDocument::create(['agent_id' => $agent_id, 'insitution_id' => '0', 'p_id' => $request->folder_id, 'level' => '3', 'filename' => $document]);

            if ($folder) {
                return response()->json(['success' => 'File Upload successfully.']);
            } else {
                return response()->json(['success' => 'Status change successfully.']);
            }
        } else {
            return response()->json(['success' => 'First You Buy Storage Package']);

        }
    }

    public function createSubFolderFile(Request $request)
    {

        $agent_id = Session::get('agent_id');
        $checkpackageexit = StorageSubcription::where('agent_id', $agent_id)->first();
        if ($checkpackageexit) {
            $document = '';

            if (!empty($request->file)) {
                $files = $request->file('file');
                $fileName = $files->getClientOriginalName();
                // $extensions = $files->getClientOriginalExtension();
                // $filenames = time().rand(1,99).'.' . $extensions;
                $filePath = 'agent/agent_' . $agent_id;
                $path = $request->file('file')->storeAs(
                    $filePath,
                    $fileName,
                    's3'
                );
                $document = $fileName;
            }

            $folder = addDocument::create(['agent_id' => $agent_id, 'insitution_id' => '0', 'p_id' => $request->folder_id, 'level' => '2', 'filename' => $document]);

            if ($folder) {
                return response()->json(['success' => 'File Upload successfully.']);
            } else {
                return response()->json(['success' => 'Status change successfully.']);
            }
        } else {
            return response()->json(['success' => 'First You Buy Storage Package']);

        }
    }

    public function getStoragePackage(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $storagepackage = addStoragePackage::all();
            return view('agent/getStoragePackage', compact('storagepackage'));
        }
    }

    public function smsPackagePaymentSend(Request $request)
    {
        $price = $request->package_price;
        $package_id = $request->package_id;
        $agent_id = Session::get('agent_id');

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->package_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify",
        ]);

        Session::flash('success', 'Payment successful!');

        $agent_profile = agentModel::where('id', $agent_id)->first();

        $details = [
            'agent_name' => $agent_profile->first_name,
            'package_name' => $request->package_name,
            'package_price' => $request->price,
            'type' => 'SMS Package',
        ];

        Mail::to($agent_profile->email)->send(new packageSubscription($details));
        Mail::to('info@studify.au')->send(new packageSubscriptionSendAdmin($details));

        $lastAgent = SmsSubcription::where('agent_id', $agent_id)->orderBy('id', 'DESC')->limit(1)->first();
        if ($lastAgent) {
            $counttt = $lastAgent->remaining_sms;
        } else {
            $counttt = '0';
        }
        $totalsms = intval($counttt) + intval($request->sms_limit);

        $smspackage = SmsSubcription::create(['agent_id' => $agent_id, "package_id" => $package_id, 'insitution_id' => '0', 'type' => 'agent', 'balance_sms' => $request->sms_limit, 'remaining_sms' => $totalsms, 'package_price' => $request->package_price,
            'transcation_id' => $charge->id]);
        if ($smspackage) {
            return redirect()->route('/agent/sms-send')->with(['msg' => 'Payemt Done Successfully']);
        } else {
            return redirect()->route('/agent/sms-send')->with(['msg' => 'Workflow Status Change Sucessfully']);

        }
    }

    public function emailPackagePaymentSend(Request $request)
    {
        $price = $request->package_price;
        $package_id = $request->package_id;
        $agent_id = Session::get('agent_id');

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->package_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify",
        ]);

        Session::flash('success', 'Payment successful!');

        $agent_profile = agentModel::where('id', $agent_id)->first();

        $details = [
            'agent_name' => $agent_profile->first_name,
            'package_name' => $request->package_name,
            'package_price' => $request->price,
            'type' => 'Email Package',
        ];

        Mail::to($agent_profile->email)->send(new packageSubscription($details));
        Mail::to('info@studify.au')->send(new packageSubscriptionSendAdmin($details));

        $lastAgent = EmailSubcription::where('agent_id', $agent_id)->orderBy('id', 'DESC')->limit(1)->first();
        if ($lastAgent) {
            $countss = $lastAgent->remaining_email;
        } else {
            $countss = 0;
        }
        $totalsms = intval($countss) + intval($request->email_limit);

        $smspackage = EmailSubcription::create(['agent_id' => $agent_id, "package_id" => $package_id, 'insitution_id' => '0', 'type' => 'agent', 'balance_email' => $request->email_limit, 'remaining_email' => $totalsms, 'package_price' => $request->package_price,
            'transcation_id' => $charge->id]);
        if ($smspackage) {
            return back()->with(['msg' => 'Payemt Done Successfully']);
        } else {
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);

        }
    }

    public function storagePackagePaymentSend(Request $request)
    {
        $price = $request->package_price;
        $package_id = $request->package_id;
        $agent_id = Session::get('agent_id');

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->package_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify",
        ]);

        Session::flash('success', 'Payment successful!');

        $agent_profile = agentModel::where('id', $agent_id)->first();

        $details = [
            'agent_name' => $agent_profile->first_name,
            'package_name' => $request->package_name,
            'package_price' => $request->price,
            'type' => 'Storage Package',
        ];

        Mail::to($agent_profile->email)->send(new packageSubscription($details));
        Mail::to('info@studify.au')->send(new packageSubscriptionSendAdmin($details));

        $lastAgent = StorageSubcription::where('agent_id', $agent_id)->orderBy('id', 'DESC')->limit(1)->first();

        $lastAgentStorage = '';
        if ($lastAgent) {
            if ($lastAgent->remaining_storage == '') {
                $lastAgentStorage = '0';
            } else {
                $lastAgentStorage = $lastAgent->remaining_storage;
            }
        } else {
            $lastAgentStorage = '0';
        }
        $totalsms = intval($lastAgentStorage) + intval($request->storage_limit);

        $smspackage = StorageSubcription::create(['agent_id' => $agent_id, 'insitution_id' => '0', 'type' => 'agent', 'balance_storage' => $request->storage_limit, 'remaining_storage' => $totalsms, 'package_price' => $request->package_price,
            'transcation_id' => $charge->id]);
        if ($smspackage) {
            return redirect()->route('/agent/get-document')->with(['msg' => 'Payemt Done Successfully']);
        } else {
            return redirect()->route('/agent/get-document')->with(['msg' => 'Workflow Status Change Sucessfully']);

        }
    }

    public function getSmsTemplate()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $agent_id = Session::get('agent_id');
            $addSmsTemplate = addSmsTemplate::where('agent_id', $agent_id)->where('add_type', 'agent')->get();
            return view('agent/getSmsTemplate', compact('addSmsTemplate'));
        }
    }

    public function addSmsTemplate(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $validate = Validator::make($request->all(), [
                'template_name' => 'required',
                'template_description' => 'required',
            ], [
                'template_name.required' => 'Select Topic is must required.',
                'template_description.required' => 'Image  is must required.',
            ]);
            $agent_id = Session::get('agent_id');
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $addSmsTemplate = addSmsTemplate::create(['agent_id' => $agent_id, 'add_type' => 'agent', 'name' => $request->template_name, 'description' => $request->template_description, 'type' => 'sms']);
            if ($addSmsTemplate) {
                return back()->with('package', 'Template added successfully');

            } else {
                return back();
            }

        }
    }
    public function deleteSmsTemplate($id)
    {

        $package = addSmsTemplate::where('id', $id)->delete();

        return back()->with('template', 'Template Delete Successfully');
    }

    public function getSmsTemplateData(Request $request)
    {

        $templateData = addSmsTemplate::find($request->product_id);
        return response()->json($templateData);

    }

    public function editSmsTemplate($id)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $addSmsTemplate = addSmsTemplate::where('id', $id)->first();
            return view('agent/editSmsTemplate', compact('addSmsTemplate'));
        }
    }

    public function updateSmsTemplate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'template_name' => 'required',
            'template_description' => 'required',
        ], [
            'template_name.required' => 'Select Topic is must required.',
            'template_description.required' => 'Image  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $template = addSmsTemplate::find($request->id);

        $template->name = $request->template_name;
        $template->description = $request->template_description;

        if ($template->save()) {
            return redirect()->route('/agent/get-sms-template')->with('template', 'Template Updated successfully');
        } else {
            return redirect()->route('/agent/get-sms-template')->with('delete', ' Not Updated successfully');
        }

    }

    public function editTask(Request $request)
    {
        $id = $request->id;
        $emp = addTask::find($id);
        return response()->json($emp);
    }

    public function editEmailTemplate(Request $request)
    {
        $id = $request->id;
        $emp = addEmailTemplate::find($id);
        return response()->json($emp);
    }

    public function updateTask(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'task_title' => 'required',
            'staff' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            'comment' => 'required',

        ], [
            'task_title.required' => 'Title is must required.',

            'start_date.required' => 'Start date is must required.',
            'end_date.required' => 'End date  is must required.',
            'comment.required' => 'Question is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $task = addTask::where('id', $request->id)->first();

        $task->task_name = $request->task_title;
        $task->assign_id = $request->staff;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->task_description = $request->comment;

        if ($task->save()) {
            return redirect()->route('agent/task-manage')->with('delete', 'Task Added successfully');
        } else {
            return redirect()->route('agent/task-manage')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function selfUpdateTask(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'task_title' => 'required',

            'start_date' => 'required',
            'end_date' => 'required',
            'priority' => 'required',
            //  'comment' => 'required',

        ], [
            'task_title.required' => 'Title is must required.',

            'start_date.required' => 'Start date is must required.',
            'end_date.required' => 'End date  is must required.',
            //  'comment.required' => 'Question is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $task = addTask::where('id', $request->id)->first();
        $task->task_name = $request->task_title;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->task_description = $request->comment;

        if ($task->save()) {
            return redirect()->route('/agent/self-task-manage')->with('delete', 'Task Added successfully');
        } else {
            return redirect()->route('/agent/self-task-manage')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function changeTaskStatus(Request $request)
    {
        $user = addTask::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function getemailtemplate()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $agent_id = Session::get('agent_id');
            $addEmailTemplate = addEmailTemplate::where('agent_id', $agent_id)->where('add_type', 'agent')->get();
            return view('agent/getEmailTemplate', compact('addEmailTemplate'));
        }
    }

    public function addEmailTemplate(Request $request)
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $validate = Validator::make($request->all(), [
                'template_name' => 'required',
                'template_description' => 'required',
            ], [
                'template_name.required' => 'Select Topic is must required.',
                'template_description.required' => 'Image  is must required.',
            ]);
            $agent_id = Session::get('agent_id');
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $addSmsTemplate = addEmailTemplate::create(['agent_id' => $agent_id, 'add_type' => 'agent', 'name' => $request->template_name, 'description' => $request->template_description, 'type' => 'sms']);
            if ($addSmsTemplate) {
                return back()->with('template', 'Template added successfully');

            } else {
                return back();
            }

        }
    }

    public function deleteEmailTemplate($id)
    {

        $package = addEmailTemplate::where('id', $id)->delete();

        return back()->with('template', 'Template Delete Successfully');
    }

    public function updateEmailTemplate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'template_name' => 'required',
            'template_description' => 'required',
        ], [
            'template_name.required' => 'Select Topic is must required.',
            'template_description.required' => 'Image  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $template = addEmailTemplate::find($request->id);

        $template->name = $request->template_name;
        $template->description = $request->template_description;

        if ($template->save()) {
            return redirect()->route('/agent/get-email-template')->with('template', 'Template Updated successfully');
        } else {
            return redirect()->route('/agent/get-email-template')->with('delete', ' Not Updated successfully');
        }

    }

    public function getEmailTemplateData(Request $request)
    {

        $templateData = addEmailTemplate::find($request->product_id);
        return response()->json($templateData);

    }

    public function deletepassport($id)
    {
        $passport = addStudentPassport::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('template', 'Template added successfully');

    }

    public function deletemarksheet($id)
    {
        $passport = addStudentMarksheet::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('template', 'Template added successfully');

    }

    public function deleteother($id)
    {
        $passport = addStudentOther::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('template', 'Template added successfully');

    }

    public function deleterecommand($id)
    {
        $passport = addStudentRecommand::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('template', 'Template added successfully');

    }

    public function deletefinanical($id)
    {
        $passport = addStudentFinancial::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('template', 'Template added successfully');

    }

    public function getPayment()
    {
        if (Session::get('agentlogin') != 'loginsuccess') {
            return redirect()->route('/agent/login');
        } else {
            $agent_id = Session::get('agent_id');
            $Emailtranscation = EmailSubcription::where('agent_id', $agent_id)->get();
            $Smstranscation = SmsSubcription::where('agent_id', $agent_id)->get();
            $allTranscation[] = $Emailtranscation;
            $allTranscation[] = $Smstranscation;
            //$allTranscation = $allTranscations;

            return view('agent/getPaymentTranscation', compact('allTranscation'));
        }
    }

    public function deletefile(Request $request)
    {
        $id = $request->id;
        $emp = addDocument::find($id);
        $insiti = Session::get('agent_id');

        $result = \Storage::disk('s3')->delete('agent/agent_' . $insiti . '/' . $emp->filename);

        $delete = $emp->delete();
        return response()->json([
            'delete' => 'File delete successfully',
        ]);
    }

    public function updateDocumentFolder(Request $request)
    {

        if ($request->type == 'file') {
            $addDocument = addDocument::find($request->id);

            $addDocument->filename = $request->folder_name;
            $addDocument->save();
            return back()->with('template', 'Template Delete Successfully');
        } else {
            $addDocument = addDocument::find($request->id);
            $addDocument->foldername = $request->folder_name;
            $addDocument->save();
            return back()->with('template', 'Template Delete Successfully');
        }

    }

    public function editFile(Request $request)
    {
        $id = $request->id;
        $emp = addDocument::find($id);
        return response()->json($emp);
    }

}

function RemoveSpecialChar($str)
{

    // Using str_ireplace() function
    // to replace the word
    $res = str_ireplace(array('\'', '"', '[', ']'), '', $str);

    // returning the result
    return $res;
}
