<?php

namespace App\Http\Controllers;

use App\Mail\adminMail;
use App\Mail\EmailVerify;
use App\Mail\studentSignup;
use App\Models\addAddressModel;
use App\Models\addCourseChapter;
use App\Models\addCourseTopic;
use App\Models\addShortCourse;
use App\Models\addStudentAcademic;
use App\Models\addStudentContact;
use App\Models\addStudentFinancial;
use App\Models\addStudentLogin;
use App\Models\addStudentMarksheet;
use App\Models\addStudentOther;
use App\Models\addStudentPassport;
use App\Models\addStudentRecommand;
use App\Models\AgentModel;
use App\Models\InstitutionModel;
use App\Models\studentCourse;
use App\Models\studentLanguageModel;
use App\Models\StudentModel;
use App\Models\studentWorkflow;
use App\Models\universityCoursePayment;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use Response;

class StudentController extends Controller
{
    //student login

    public function studentlogin(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email is must required.',
            'password.required' => 'Password is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $fields = $request->all();
        $user = StudentModel::where('email', $fields['email'])->first();
        if ($user) {
            if ($user->email_verify == 0) {
                return back()->with('approve', 'Please check your email for verification and log back in.');
            }

            if ($user->status == 0) {
                return back()->with('approve', 'Please wait to approve your account');
            } else {
                if (Hash::check($fields['password'], $user->password)) {
                    $firstname = $user->first_name;
                    $lastname = $user->last_name;
                    $shortname = $firstname[0] . $lastname[0];
                    Session::forget('shortname');
                    Session::forget('student_iddd');
                    Session::forget('login');
                    Session::put('login', 'student');
                    Session::put('student_iddd', $user->id);

                    Session::put('studentlogin', 'loginsuccess');
                    Session::put('shortname', $shortname);
                    Session::put('student_id', $user->id);
                    Session::put('student_first_name', $user->first_name);
                    Session::put('status', 'personal');
                    addStudentLogin::create(['student_id' => $user->id]);

                    return redirect()->route('/student/profile')->with('studentLogin', 'Login successfully');
                } else {
                    return back()->with('fail', 'Invalid credentitals!');
                }
            }
        } else {
            return back()->with('fail', 'Email not found');
        }
    }

    ///////////register///////////////
    public function register(Request $request)
    {
        if ($request->password != $request->confirm_password) {
            return back()->with('password', 'Password not match');
        } else {
           
            $validate = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required|min:10',
                'email' => 'required',
                'password' => 'required|min:8',
                'confirm_password' => 'required',
            ], [
                'first_name.required' => 'Firstname is must required.',
                'last_name.required' => 'Lastname is must required.',
                'phone.required' => 'Phone is must required.',
                'email.required' => 'Email is must required.',
                'password.required' => 'Password is must required.',
                'confirm_password.required' => 'Confirm password is must required.',
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
                return back()->with('emailexit', 'Phone number already Exist');
            }

            $agentexit = AgentModel::where('phone', $request->countrycode . $request->phone)->first();
            if ($agentexit) {
                return back()->with('emailexit', 'Phone number already Exist');
            }

            $institutionexit = InstitutionModel::where('phone', $request->countrycode . $request->phone)->first();
            if ($institutionexit) {
                return back()->with('emailexit', 'Phone number already Exist');
            }

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $phone = $request->countrycode . $request->phone;
            $email = $request->email;
            $password = $request->password;
            $user = StudentModel::create(['first_name' => $first_name, 'last_name' => $last_name, 'phone' => $phone, 'email' => $email, 'password' => Hash::make($password)]);
            if ($user) {
                $details = [
                    'name' => $first_name,
                    'email' => $email,
                    'id' => $user->id,
                ];
                Mail::to($email)->send(new EmailVerify($details));
                return redirect()->route('/member/login')->with('approve', 'Please Confirm your email account');
            } else {
                return redirect()->route('/member/register');
            }
        }
    }

    public function studentEmailVerify($id)
    {
        $email_verify = StudentModel::find($id);
        $email_verify->email_verify = '1';
        $email_verify->status = '1';
        if ($email_verify->save()) {
            $student = StudentModel::where('id', $id)->first();
            $details = [
                'name' => $student->first_name,
                'email' => $student->email,
                'type' => 'Student',
            ];
            Mail::to($student->email)->send(new studentSignup($details));
            Mail::to('info@studify.au')->send(new adminMail($details));

            return redirect()->route('/member/login')->with('approve', 'Thank you for your email verification. Please login.');
        } else {
            return redirect()->route('/member/login');

        }

    }

    public function index()
    {
        if (Session::get('studentlogin') != 'loginsuccess') {
            return redirect()->route('/member/login');
        } else {
            $id = Session::get('student_id');
            $contact = addStudentContact::where('student_id', $id)->first();
            $student = StudentModel::where('id', $id)->first();
            $address = addAddressModel::where('student_id', $id)->first();
            $language = studentLanguageModel::where('student_id', $id)->first();
            $academics = addStudentAcademic::where('student_id', $id)->get();
            $countries = DB::table('country')->get();
            $country = DB::table('country')->get();
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
            return view('student/index', compact('student', 'address', 'language', 'contact', 'countries', 'country', 'academics', 'passportimage', 'marksheet', 'other', 'recommendation', 'financial'));
        }
    }

    public function updatestudent(Request $request)
    {

        $id = $request->id;
        $studentimage = '';

        if (!empty($request->student_img)) {
            $files = $request->file('student_img');
            $extensions = $files->getClientOriginalExtension();
            $filenames = time() . rand(1, 99) . '.' . $extensions;
            $files->move(public_path('StudentImage/'), $filenames);

            $studentimage = $filenames;

        }

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

        if ($request->student_img) {
            $studentinfo = StudentModel::find($id);
            $studentinfo->first_name = $request->first_name;
            $studentinfo->last_name = $request->last_name;
            $studentinfo->phone = $request->phone;
            $studentinfo->email = $request->email;
            $studentinfo->gender = $request->gender;
            $studentinfo->dob = $request->dob;
            $studentinfo->country = $request->country;
            $studentinfo->student_img = $studentimage;
            if ($studentinfo->save()) {
                Session::forget('status');
                Session::put('status', 'address');

                return redirect()->route('/student/profile');
            } else {
                return redirect()->route('/student/profile');

            }
        } else {
            $studentinfo = StudentModel::find($id);
            $studentinfo->first_name = $request->first_name;
            $studentinfo->last_name = $request->last_name;
            $studentinfo->phone = $request->phone;
            $studentinfo->email = $request->email;
            $studentinfo->gender = $request->gender;
            $studentinfo->dob = $request->dob;
            $studentinfo->country = $request->country;

            if ($studentinfo->save()) {
                Session::forget('status');
                Session::put('status', 'address');

                return redirect()->route('/student/profile');
            } else {
                return redirect()->route('/student/profile');

            }

        }

    }

    //add student address info
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
            'countries_id.required' => 'Please select country',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $student_id = $request->id;
        $street_name = $request->street_name;
        $city_name = $request->city_name;
        $province_state = $request->province_state;
        $zip_code = $request->zip_code;
        $countries_id = $request->countries_id;

        $address = addAddressModel::create(['student_id' => $student_id, 'country' => $countries_id, 'street_name' => $street_name, 'city' => $city_name, 'state' => $province_state, 'zipcode' => $zip_code]);
        if ($address) {
            Session::forget('status');
            Session::put('status', 'language');
            return redirect()->route('/student/profile');

        } else {
            return redirect()->route('/student/profile');
        }
    }

    //update student address
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
            'countries_id.required' => 'Please select country',

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
            return redirect()->route('/student/profile');
            return redirect()->route('/student/profile');
        } else {
            return redirect()->route('/student/profile');
        }
    }

    // add language score
    public function addLanguageScore(Request $request)
    {
        $id = Session::get('student_id');
        $validate = Validator::make($request->all(), [
            'exam_type' => 'required',
            'speaking_score' => 'required',
            'reading_score' => 'required',
            'writing_score' => 'required',
            'listening_score' => 'required',
            'average_score' => 'required',
            'exam_date' => 'required',
        ], [
            'exam_type.required' => 'Exam type is must required.',
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
            return redirect()->route('/student/profile');
        } else {
            return redirect()->route('/student/profile');
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
            'exam_type.required' => 'Exam type is must required.',
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
            return redirect()->route('/student/profile');

        } else {
            return redirect()->route('/student/profile');
        }
    }

    ///
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
            return redirect()->route('/student/profile');

        } else {
            return redirect()->route('/student/profile');
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
            'relationship.required' => 'Relationship  is must required.',
            'contact_phone.required' => 'Contact phone  is must required.',
            'contact_email.required' => 'Contact email is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $student_id = $id;
        $contact_name = $request->contact_name;
        $relationship = $request->relationship;
        $contact_phone = $request->contact_phone;
        $contact_email = $request->contact_email;

        $contact = addStudentContact::create(['student_id' => $student_id, 'contact_name' => $contact_name, 'relationship' => $relationship, 'phone_number' => $contact_phone, 'email' => $contact_email]);

        if ($contact) {
            Session::forget('status');
            Session::put('status', 'document');
            return redirect()->route('/student/profile');
        } else {
            return redirect()->route('/student/profile');
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
            'relationship.required' => 'Relationship  is must required.',
            'contact_phone.required' => 'Contact phone  is must required.',
            'contact_email.required' => 'Contact email is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = $request->id;
        $contact = addStudentContact::where('student_id', $request->id)->first();
        $contact->contact_name = $request->contact_name;
        $contact->relationship = $request->relationship;
        $contact->phone_number = $request->contact_phone;
        $contact->email = $request->contact_email;
        if ($contact->save()) {
            Session::forget('status');
            Session::put('status', 'document');

            return redirect()->route('/student/profile');
        } else {
            return redirect()->route('/student/profile');
        }
    }

    public function dashboard()
    {
        $id = Session::get('student_id');
        $appliedCourse = universityCoursePayment::where('student_id', $id)->get();
        return view('student.dashboard', compact('appliedCourse'));
    }

    public function profileView()
    {
        if (Session::get('studentlogin') != 'loginsuccess') {
            return redirect()->route('/member/login');
        } else {
            $id = Session::get('student_id');
            $student = StudentModel::where('id', $id)->first();
            $address = addAddressModel::where('student_id', $id)->first();
            return view('student.profileView', compact('student', 'address'));
        }
    }

    public function documents()
    {
        if (Session::get('studentlogin') != 'loginsuccess') {
            return redirect()->route('/member/login');
        } else {
            $id = Session::get('student_id');
            $student = StudentModel::where('id', $id)->first();
            $passportimage = addStudentPassport::where('student_id', $id)->get();
            $marksheet = addStudentMarksheet::where('student_id', $id)->get();
            $other = addStudentOther::where('student_id', $id)->get();
            $recommendation = addStudentRecommand::where('student_id', $id)->get();
            $financial = addStudentFinancial::where('student_id', $id)->get();
            return view('student.document', compact('passportimage', 'marksheet', 'other', 'recommendation', 'financial', 'student'));
        }
    }

    public function activity()
    {
        if (Session::get('studentlogin') != 'loginsuccess') {
            return redirect()->route('/member/login');
        } else {
            $id = Session::get('student_id');
            $login = addStudentLogin::where('student_id', $id)->orderBy('id', 'DESC')->take(10)->get();
            return view('student.activity', compact('login'));
        }
    }

    public function updateSignature(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'consent_signature' => 'required',
        ], [
            'consent_signature.required' => 'Please verify.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $id = Session::get('student_id');
        $sign = StudentModel::where('id', $id)->first();
        $sign->signature_status = $request->consent_signature;

        if ($sign->save()) {
            Session::forget('status');
            Session::put('status', 'personal');
            $workflow = studentWorkflow::create(['student_id' => $id, 'workflow_id' => '5', 'status' => '2']);
            $workflow = studentWorkflow::create(['student_id' => $id, 'workflow_id' => '6', 'status' => '0']);
            $workflow = studentWorkflow::create(['student_id' => $id, 'workflow_id' => '7', 'status' => '2']);

            return redirect()->back()->with('studentsave', 'Update student successfully');
        } else {
            return redirect()->route('/student/profile');
        }
    }

    public function uploadmultipleimage(Request $request)
    {
        $resume = '';
        $certificate = '';

        if ($request->hasFile('passport')) {
            $image = $request->file('passport');
            $i = 0;

            $student_id = Session::get('student_id');
            if ($request->hasfile('passport')) {
                foreach ($request->file('passport') as $file) {

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

        return redirect()->route('/student/profile');

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
            return redirect()->route('/student/profile');
        } else {
            return redirect()->route('/student/profile');
        }
    }

    public function studentUnivCourseDelete($id)
    {

        $course = universityCoursePayment::where('id', $id)->delete();
        return redirect()->route('/student/dashboard');
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
            return redirect()->route('/student/profile');
        } else {
            return redirect()->route('/student/profile');
        }

    }

    public function deletepassport($id)
    {
        $passport = addStudentPassport::where('id', $id)->delete();
        Session::put('status', 'document');
        return redirect()->route('/student/profile');

    }

    public function deletemarksheet($id)
    {
        $passport = addStudentMarksheet::where('id', $id)->delete();
        Session::put('status', 'document');
        return redirect()->route('/student/profile');

    }

    public function deleteother($id)
    {
        $passport = addStudentOther::where('id', $id)->delete();
        Session::put('status', 'document');
        return redirect()->route('/student/profile');

    }

    public function deleterecommand($id)
    {
        $passport = addStudentRecommand::where('id', $id)->delete();
        Session::put('status', 'document');
        return redirect()->route('/student/profile');

    }

    public function deletefinanical($id)
    {
        $passport = addStudentFinancial::where('id', $id)->delete();
        Session::put('status', 'document');
        return redirect()->route('/student/profile');

    }

    public function getCourse()
    {
        if (Session::get('studentlogin') != 'loginsuccess') {
            return redirect()->route('/member/login');
        } else {
            $id = Session::get('student_id');
            $course = studentCourse::where('member_id', $id)->where('payment_status', '1')->get();
            return view('student.getCourse', compact('course'));
        }
    }

    public function getCourseTopic($id)
    {
        if (Session::get('studentlogin') != 'loginsuccess') {
            return redirect()->route('/member/login');
        } else {

            $course = addShortCourse::where('id', $id)->first();
            $topic = addCourseTopic::where('course_id', $id)->get();
            return view('student/getCourseTopic', compact('id', 'topic', 'course'));
        }
    }

    public function getChapter($id)
    {
        if (Session::get('studentlogin') != 'loginsuccess') {
            return redirect()->route('/member/login');
        } else {

            $chapter = addCourseChapter::where('topic_id', $id)->get();
            return view('student/getChapter', compact('id', 'chapter'));
        }
    }

    public function getChapterDetailPdf($id)
    {
        $chapter = addCourseChapter::where('id', $id)->first();
        return Response::make(file_get_contents('/var/www/html/public/ChapterPDF/' . $chapter->pdf), 200, [
            'content-type' => 'application/pdf',
        ]);

    }

    public function getChapterDetail($id)
    {

        $chapter = addCourseChapter::where('id', $id)->first();
        $coursename = Session::get('coursename');
        $topic = addCourseTopic::where('id', $chapter->topic_id)->first();
        $course = addShortCourse::where('id', $chapter->course_id)->first();

        if ($chapter->chapter_description == '') {
            $chapter = addCourseChapter::where('id', $id)->first();
            return Response::make(file_get_contents('/var/www/html/public/ChapterPDF/' . $chapter->pdf), 200, [
                'content-type' => 'application/pdf',
            ]);
        } else {
            return view('student/getChapterDetail', compact('chapter', 'topic', 'course'));
        }

    }
    public function logout()
    {

        Session::flush();
        return redirect()->route('/member/login');
    }

}
