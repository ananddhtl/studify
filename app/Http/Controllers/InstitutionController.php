<?php

namespace App\Http\Controllers;

use App\Mail\adminMail;
use App\Mail\InsitutiontEmailVerify;
use App\Mail\institutionSignup;
use App\Mail\sendemailbyadmin;
use App\Models\addAddressModel;
use App\Models\addBranch;
use App\Models\addCommission;
use App\Models\addCoursesModel;
use App\Models\addDocument;
use App\Models\addEmailTemplate;
use App\Models\addFees;
use App\Models\addGlance;
use App\Models\addGroup;
use App\Models\addGroupMember;
use App\Models\addInstitution;
use App\Models\addInvoice;
use App\Models\addLead;
use App\Models\addRequirements;
use App\Models\addRole;
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
use App\Models\add_multiple_image;
use App\Models\AgentModel;
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
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use Stripe;

class InstitutionController extends Controller
{
    //

    public function institutiondashboard(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
            $idd = addInstitution::where('institution_id', $id)->first();
            if ($idd) {
                $studentcount = StudentModel::where('institution_id', $idd->id)->get();
                $countstudent = $studentcount->count();
            } else {
                $countstudent = '0';
            }
            $coursecount = addCoursesModel::where('institution_id', $id)->get();
            if ($coursecount) {
                $countcourse = $coursecount->count();
            } else {
                $countcourse = '0';
            }
            if ($idd) {
                $agentcount = StudentModel::where('institution_id', $idd->id)->get();
                $listImages = array();
                foreach ($agentcount as $value) {
                    array_push($listImages, $value->agent_id);
                }
                $filteredList = array_unique($listImages);
                $countagent = '0';
            } else {
                $countagent = '0';
            }
            return view('/institution/dashboard', compact('countstudent', 'countagent', 'countcourse'));
        }
    }

    public function institutionlogin(Request $request)
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
        $user = InstitutionModel::where('email', $fields['email'])->first();
        if ($user) {
            if ($user->status == 0) {

                return back()->with('approve', 'Please wait to approve your account');
            } else {

                //Check Password
                if (!$user || Hash::check($fields['password'], $user->password)) {
                    Session::forget('login');
                    Session::put('login', 'insitution');
                    $firstname = $user->first_name;
                    $lastname = $user->last_name;
                    $shortname = $firstname[0] . $lastname[0];
                    Session::put('insitutionlogin', 'loginsuccess');
                    Session::put('role', 'institution');
                    Session::forget('shortname');
                    Session::put('shortname', $shortname);
                    Session::put('status', 'personal');
                    Session::put('institution_name', $user->institution_name);
                    Session::put('institution_id', $user->id);
                    $institution = addInstitution::where('institution_id', $user->id)->first();
                    if ($institution) {
                        Session::put('institution_detail_id', $institution->id);
                    }
                    return redirect()->route('/institution/dashboard');
                } else {
                    return back()->with('fail', 'Invalid credentitals!');
                }

            }

        } else {
            $otherrole = addRole::where('email', $fields['email'])->first();
            if ($otherrole) {

                $str = $otherrole->rolefeatures;
                $str1 = RemoveSpecialChar($str);
                $str2 = explode(",", $str1);

                if (!$otherrole || Hash::check($fields['password'], $otherrole->password)) {
                    $shortname = $otherrole->name[0];
                    Session::put('roleidd', $otherrole->id);
                    Session::put('role', 'other');
                    Session::put('rolefeature', $str2);
                    Session::put('insitutionlogin', 'loginsuccess');
                    Session::forget('shortname');
                    Session::put('shortname', $shortname);
                    Session::put('status', 'personal');
                    Session::put('institution_name', $otherrole->name);
                    Session::put('institution_id', $otherrole->insitutionid);

                    return redirect()->route('/institution/dashboard');
                } else {
                    return back()->with('fail', 'Invalid credentitals!');

                }

            } else {
                return back()->with('fail', 'Invalid credentitals!');
            }

        }
    }

    public function institutionregister(Request $request)
    {
        if ($request->password != $request->confirm_password) {
            return back()->with('password', 'Password not match');
        } else {
            // dd($request->all());
            $validate = Validator::make($request->all(), [
                'institution_name' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'phone' => 'required|min:8',
                'email' => 'required',
                'country' => 'required',
                'password' => 'required|min:8',
                'confirm_password' => 'required',
            ], [
                'institution_name.required' => 'Institutionname is must required.',
                'first_name.required' => 'Firstname is must required.',
                'last_name.required' => 'Lastname is must required.',
                'phone.required' => 'Phone is must required.',
                'email.required' => 'Email is must required.',
                'country.required' => 'Country is must required.',
                'password.required' => 'Password should be atleast 8 characters.',
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

            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $phone = $request->countrycode . $request->phone;
            $email = $request->email;
            $country = $request->country;
            $institution_name = $request->institution_name;
            $password = $request->password;
            $user = InstitutionModel::create(['first_name' => $first_name, 'last_name' => $last_name, 'phone' => $phone, 'email' => $email, 'country' => $country, 'institution_name' => $institution_name, 'password' => Hash::make($password)]);
            if ($user) {
                $details = [
                    'name' => $first_name,
                    'email' => $email,
                    'id' => $user->id,
                ];

                Mail::to($email)->send(new InsitutiontEmailVerify($details));
                return redirect()->route('/institution/login')->with('approve', 'Please verify your account on your email');
            } else {
                return redirect()->route('/institution/register');
            }
        }
    }

    public function EmailVerify($id)
    {

        $email_verify = InstitutionModel::find($id);
        $email_verify->email_verify = '1';
        if ($email_verify->save()) {
            $insitution = InstitutionModel::where('id', $id)->first();
            $details = [
                'name' => $insitution->first_name,
                'email' => $insitution->email,
                'type' => 'Institution',
            ];
            Mail::to($insitution->email)->send(new institutionSignup($details));
            Mail::to('info@studify.au')->send(new adminMail($details));
            return redirect()->route('/institution/login')->with('approve', 'Thank you for the verification. Our team will soon approve your account.');
        } else {
            return redirect()->route('/institution/login');

        }

    }

    ////index////
    public function institutionindex(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            $id = Session::get('institution_id');
            $info = InstitutionModel::where('id', $id)->first();
            $institution_detail_id = Session::get('institution_detail_id');
            // $allinstitution = addInstitution::all();
            $glance = addGlance::where('institution_detail_id', $institution_detail_id)->get();
            $country = DB::table('country')->get();
            $institution = addInstitution::where('institution_id', $id)->first();
            $images = add_multiple_image::where('institution_detail_id', $institution_detail_id)->get();
            if ($institution) {
                Session::put('institution_detail_id', $institution->id);
            }
            return view('institution/index', compact('institution', 'info', 'glance', 'images', 'country'));
        }
    }

    public function coursestable(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            $id = Session::get('institution_id');
            
            $institution = addInstitution::where('institution_id', $id)->first();
            if ($institution) {
                $institution_detail_id = $institution->id;
            } else {
                $institution_detail_id = '0';
            }
            
            $branch = addBranch::where('institution_detail_id', $institution_detail_id)->get();
            $fees = DB::table('course_fees')
                ->join('institution_detail', 'institution_detail.id', '=', 'course_fees.institution_detail_id')
                ->select('course_fees.*', 'institution_detail.universirty_name')->where('institution_detail_id', $institution_detail_id)
                ->get();

            $requirement = DB::table('course_requirement')
                ->join('institution_detail', 'institution_detail.id', '=', 'course_requirement.institution_detail_id')
                ->select('course_requirement.*', 'institution_detail.universirty_name')->where('institution_detail_id', $institution_detail_id)
                ->get();

            $course = addCoursesModel::where('institution_detail_id', $institution_detail_id)->get();
            $sesssion = Session::get('state');
            if ($sesssion == '') {
                Session::put('state', 'branch');
            }

            return view('institution/manageCoureses', compact('course', 'fees', 'requirement', 'branch'));
        }
    }

    public function addCourses(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
            $course = "";
            $branch = addBranch::where('institution_id', $id)->get();
            $str2 = '';
            return view('institution/addCourses', compact('course', 'branch', 'str2'));
        }
    }

    public function addCourse(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'c_name' => 'required',
            'aos' => 'required',
            'type' => 'required',

        ], [
            'c_name.required' => 'Course name is must required.',
            'aos.required' => 'Area of study is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $id = Session::get('institution_id');
        //  $courseexit= addCoursesModel::where('c_name', $request->c_name)->where('institution_id',$id)->where('type', $request->type)->first();
        //     if($courseexit){
        //      return back()->with('courseexit', 'Course Already Exit');
        //     }
        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        $id = Session::get('institution_id');
        $institution = addInstitution::where('institution_id', $id)->first();
        $intakes = '';
        $institution_id = Session::get('institution_id');
        $institution_detail_id = $institution->id;
        $branch_id = $request->branch_id;
        $course_name = $request->c_name;
        $aos = $request->aos;
        $type = $request->type;

        $json = json_encode($request->intakes);

        $duration = $request->duration;


        $user = addCoursesModel::create(['institution_id' => $institution_id, 'institution_detail_id' => $institution_detail_id, 'branch_id' => $branch_id, 'type' => $type, 'c_name' => $course_name, 'AOS' => $aos, 'intake' => $json, 'duration' => $duration]);
        if ($user) {
            Session::forget('state');
            Session::put('state', 'coursessss');
            return redirect()->route('institution/manage-courses');
        } else {
            return redirect()->route('/institution/add-courses');
        }

    }

    ///update course status/////
    public function updateCourseStatus(Request $request)
    {
        $course = addCoursesModel::find($request->course_id);
        $course->status = $request->status;
        $course->save();
        $course = addCoursesModel::find($request->course_id);
        if ($course->status == 0) {
            return response()->json(['success' => 'Deactive Course successfully.']);
        } else {
            return response()->json(['success' => 'Active Course successfully.']);

        }
    }

    public function coursedelete($id)
    {
        $course = addCoursesModel::find($id);
        $course->delete();
        Session::forget('state');
        Session::put('state', 'coursessss');
        return back()->with('delete', 'Student delete successfully');
    }

    public function courseedit($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $course = addCoursesModel::find($id);
            $str = $course->intake;
            $str1 = RemoveSpecialChar($str);
            $str2 = explode(",", $str1);
            $branch = addBranch::all();
            return view('institution/addCourses', compact('course', 'branch', 'str2'));
        }
    }

    public function courseupdate(Request $request)
    {

        $course = addCoursesModel::find($request->id);

        $json = json_encode($request->intakes);

        $course->intake = $json;
        $course->branch_id = $request->branch_id;
        $course->c_name = $request->c_name;
        $course->type = $request->type;
        $course->AOS = $request->aos;
        $course->duration = $request->duration;
        $course->save();
        if ($course->save()) {
            Session::forget('state');
            Session::put('state', 'coursessss');
            return redirect()->route('institution/manage-courses');
        } else {
            return redirect()->route('institution/addCourses');
        }
    }

    ///add university

    public function adduniversity(Request $request)
    {

        $thumbnail = '';
        $image = '';
        $id = Session::get('institution_id');
        //  if($request->file('univ_img')){
        //     $file= $request->file('univ_img');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //      $image_path = "/uploads/institutionImages/" . $file;
        //     $image = $filename;
        // }

        if (!empty($request->univ_img)) {
            $file = $request->file('univ_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('InstitutionImage/'), $filename);

            $image = $filename;
        }

        if (!empty($request->thumbnail)) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('InstitutionImage/'), $filename);

            $thumbnail = $filename;
        }

        $institution_id = $id;
        $universirty_name = $request->universirty_name;
        $univ_img = $image;
        $location = $request->location;
        $country = $request->country;
        $thumbnail = $thumbnail;
        $univ_type = $request->univ_type;
        $founded = $request->founded;
        $international_student = $request->international_student;
        $type = $request->type;

        $user = addInstitution::create(['institution_id' => $id, 'universirty_name' => $universirty_name, 'univ_img' => $univ_img, 'thumbnail' => $thumbnail, 'country' => $country, 'location' => $location, 'univ_type' => $univ_type, 'founded' => $founded, 'international_student' => $international_student, 'type' => $type]);

        if ($user) {
            Session::put('institution_detail_id', $user->id);
            Session::forget('status');
            Session::put('status', 'about');
            return redirect()->route('/institution/index');
        } else {
            return redirect()->route('/institution/index');
        }

    }

    ///update personal info
    public function updateinstitutioninfo(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'universirty_name' => 'required',
            'location' => 'required',
            'country' => 'required',
            'univ_type' => 'required',
            'founded' => 'required',
            'international_student' => 'required',
            'type' => 'required',

        ], [
            'universirty_name.required' => 'Institutionname is must required.',
            'location.required' => 'Firstname is must required.',
            'country.required' => 'Lastname is must required.',
            'univ_type.required' => 'Phone is must required.',
            'founded.required' => 'Email is must required.',
            'international_student.required' => 'Country is must required.',
            'type.required' => 'Password should be atleast 8 characters.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = $request->id;
        $image = '';
        $thumbnail = '';
        if (!empty($request->thumbnail)) {
            $files = $request->file('thumbnail');
            $extensions = $files->getClientOriginalExtension();
            $filenames = time() . rand(1, 99) . '.' . $extensions;
            $files->move(public_path('InstitutionImage/'), $filenames);

            $thumbnail = $filenames;
        }

        if (!empty($request->univ_img)) {
            $file = $request->file('univ_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('InstitutionImage/'), $filename);

            $image = $filename;
        }

        if ($request->univ_img) {
            $institutionInfo = addInstitution::find($id);
            $institutionInfo->universirty_name = $request->universirty_name;
            $institutionInfo->univ_img = $image;
            // $institutionInfo->thumbnail = $thumbnail;
            $institutionInfo->location = $request->location;
            $institutionInfo->country = $request->country;
            $institutionInfo->univ_type = $request->univ_type;
            $institutionInfo->founded = $request->founded;
            $institutionInfo->international_student = $request->international_student;
            $institutionInfo->type = $request->type;
            if ($institutionInfo->save()) {
                Session::forget('status');
                Session::put('status', 'about');
                return redirect()->route('/institution/index');
            } else {
                return redirect()->route('/institution/index');

            }
        } elseif ($request->thumbnail) {
            $institutionInfo = addInstitution::find($id);
            $institutionInfo->universirty_name = $request->universirty_name;
            // $institutionInfo->univ_img = $image;
            $institutionInfo->thumbnail = $thumbnail;
            $institutionInfo->location = $request->location;
            $institutionInfo->country = $request->country;
            $institutionInfo->univ_type = $request->univ_type;
            $institutionInfo->founded = $request->founded;
            $institutionInfo->international_student = $request->international_student;
            $institutionInfo->type = $request->type;
            if ($institutionInfo->save()) {
                Session::forget('status');
                Session::put('status', 'about');
                return redirect()->route('/institution/index');
            } else {
                return redirect()->route('/institution/index');

            }

        } else {

            $institutionInfo = addInstitution::find($id);
            $institutionInfo->universirty_name = $request->universirty_name;

            $institutionInfo->location = $request->location;
            $institutionInfo->country = $request->country;
            $institutionInfo->univ_type = $request->univ_type;
            $institutionInfo->founded = $request->founded;
            $institutionInfo->international_student = $request->international_student;
            $institutionInfo->type = $request->type;
            if ($institutionInfo->save()) {
                Session::forget('status');
                Session::put('status', 'about');

                return redirect()->route('/institution/index');
            } else {
                return redirect()->route('/institution/index');

            }

        }

    }

    ///update about info ////
    public function updateaboutInfo(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'aboutheading' => 'required',
            'aboutparagraph' => 'required',

        ], [
            'aboutheading.required' => 'Institutionname is must required.',
            'aboutparagraph.required' => 'Firstname is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = $request->id;
        $about = addInstitution::find($id);
        $about->about_heading = $request->aboutheading;
        $about->about_paragraph = $request->aboutparagraph;
        if ($about->save()) {
            Session::forget('status');
            Session::put('status', 'glance');
            return redirect()->route('/institution/index');
        } else {
            return redirect()->route('/institution/index');

        }
    }

    /// /update video
    public function updatevideo(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'univ_video' => 'required',
        ], [
            'univ_video.required' => 'Institutionname is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = Session::get('institution_detail_id');

        $video = addInstitution::find($id);
        $video->video = $request->univ_video;
        if ($video->save()) {
            Session::forget('status');
            Session::put('status', 'gallery');
            return redirect()->route('/institution/index');
        } else {
            return redirect()->route('/institution/index');
        }
    }

    ///manage fees
    public function manageFees(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            if (Session::get('institution_detail_id') == '') {
                return redirect()->route('/institution/login');
            }
            $institution_detail_id = Session::get('institution_detail_id');
            $fees = DB::table('course_fees')
                ->join('institution_detail', 'institution_detail.id', '=', 'course_fees.institution_detail_id')
                ->select('course_fees.*', 'institution_detail.universirty_name')->where('institution_detail_id', $institution_detail_id)
                ->get();
            return view('institution/manageFees', compact('fees'));
        }
    }

    //add fees
    public function add_fees(Request $request)
    {

        $courseexit = addFees::where('course_id', $request->category)->first();
        if ($courseexit) {
            return back()->with('courseexit', 'course already exit');
        }

        $validate = Validator::make($request->all(), [
            'tutionfee' => 'required',
            'other' => 'required',
        ], [
            'tutionfee.required' => 'Tutionfee is must required.',
            'other.required' => 'Others Fees is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if ($request->application) {
            $app = $request->application;
        } else {
            $app = '0';
        }
        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        $institution_id = Session::get('institution_id');
        $institution = addInstitution::where('institution_id', $institution_id)->first();
        $institution_detail_id = $institution->id;

        $course_id = $request->category;
        $tution_fees = $request->tutionfee;
        $acc_other_fees = $request->other;
        $application = $app;
        $user = addFees::create(['institution_id' => $institution_id, 'institution_detail_id' => $institution_detail_id, 'course_id' => $course_id, 'application_fees' => $application, 'tution_fees' => $tution_fees, 'acc_other_fees' => $acc_other_fees]);
        if ($user) {
            Session::forget('state');
            Session::put('state', 'fees');
            return redirect()->route('institution/manage-courses');
        } else {
            return redirect()->route('/institution/add-fees');
        }

    }
    ////add requirements///
    public function add_requirements(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            $id = Session::get('institution_id');
            $institution_detail_id = addInstitution::where('institution_id', $id)->first();

            $course = addCoursesModel::where('institution_detail_id', $institution_detail_id->id)->get();
            $requirement = '';
            return view('institution/addRequirements', compact('course', 'requirement'));
        }
    }

    public function addrequirements(Request $request)
    {
        $courseexit = addRequirements::where('course_id', $request->category)->first();
        if ($courseexit) {
            return back();
        }
        $validate = Validator::make($request->all(), [
            'mini_gpa' => 'required',
            'education' => 'required',
            'toefl' => 'required',
            'ielts' => 'required',
            'pearson' => 'required',
            'duolingo' => 'required',

        ], [
            'mini_gpa.required' => 'Minimum GPA is must required.',
            'education.required' => 'Education field is must required.',
            'toefl.required' => 'TOEFL is must required.',
            'ielts.required' => 'IELTS is must required.',
            'pearson.required' => 'Pearson is must required.',
            'duolingo.required' => 'Duolingo  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        $institution_id = Session::get('institution_id');
        $institution = addInstitution::where('institution_id', $institution_id)->first();
        $institution_detail_id = $institution->id;
        $course_id = $request->category;
        $type = $request->type;
        $min_gpa = $request->mini_gpa;
        $education = $request->education;
        $TOEFL = $request->toefl;
        $IELTS = $request->ielts;
        $Pearson = $request->pearson;
        $Duolingo = $request->duolingo;
        $user = addRequirements::create(['institution_id' => $institution_id, 'institution_detail_id' => $institution_detail_id, 'course_id' => $course_id, 'min_gpa' => $min_gpa, 'type' => $type, 'education' => $education, 'TOEFL' => $TOEFL, 'IELTS' => $IELTS, 'Pearson' => $Pearson, 'Duolingo' => $Duolingo]);
        if ($user) {
            Session::forget('state');
            Session::put('state', 'requirements');
            return redirect()->route('/institution/manage-requirements');
        } else {
            return redirect()->route('/institution/add-requirements');
        }

    }

    //manage requirements
    public function manageRequirements(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            $institution_id = Session::get('institution_id');
            $institution = addInstitution::where('institution_id', $institution_id)->first();
            $institution_detail_id = $institution->id;
            $course = addRequirements::where('institution_detail_id', $institution_detail_id)->get();
            $institution_detail_id = Session::get('institution_detail_id');
            $requirement = DB::table('course_requirement')
                ->join('institution_detail', 'institution_detail.id', '=', 'course_requirement.institution_detail_id')
                ->select('course_requirement.*', 'institution_detail.universirty_name')->where('institution_detail_id', $institution_detail_id)
                ->get();

            return view('institution/manageRequirements', compact('requirement'));
        }
    }
    ///delete requirement
    public function requirementdelete($id)
    {
        $course = addRequirements::find($id);
        $course->delete();
        Session::forget('state');
        Session::put('state', 'requirements');
        return back()->with('requirementdelete', 'Requirement delete successfully');
    }

    public function requirementedit($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $requirement = addRequirements::find($id);
            $course = addCoursesModel::all();
            return view('institution/addRequirements', compact('requirement', 'course'));
        }
    }

    //update requirement

    public function requirementupdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required',
            'type' => 'required',
            'mini_gpa' => 'required',
            'education' => 'required',
            'toefl' => 'required',
            'ielts' => 'required',
            'pearson' => 'required',
            'duolingo' => 'required',

        ], [
            'category.required' => 'Minimum GPA is must required.',
            'type.required' => 'Education field is must required.',
            'mini_gpa.required' => 'TOEFL is must required.',
            'education.required' => 'IELTS is must required.',
            'toefl.required' => 'Pearson is must required.',
            'ielts.required' => 'Duolingo  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $requirement = addRequirements::find($request->id);
        $requirement->course_id = $request->category;
        $requirement->type = $request->type;
        $requirement->min_gpa = $request->mini_gpa;
        $requirement->education = $request->education;
        $requirement->TOEFL = $request->toefl;
        $requirement->IELTS = $request->ielts;
        $requirement->Pearson = $request->pearson;
        $requirement->Duolingo = $request->duolingo;

        if ($requirement->save()) {
            Session::forget('state');
            Session::put('state', 'requirements');
            return redirect()->route('/institution/manage-courses');
        } else {
            return redirect()->route('/institution/manage-courses');
        }
    }

    ///add fees
    public function addFees(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            $id = Session::get('institution_id');
            $institution_detail_id = addInstitution::where('institution_id', $id)->first();
            $fees = "";
            $course = addCoursesModel::where('institution_detail_id', $institution_detail_id->id)->get();

            return view('institution/addFees', compact('fees', 'course'));
        }

    }

    ///edit fees
    public function feesedit($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            $institution_id = Session::get('institution_id');
            $institution = addInstitution::where('institution_id', $institution_id)->first();
            $institution_detail_id = $institution->id;
            $fees = addFees::find($id);
            $course = addCoursesModel::where('institution_detail_id', $institution_detail_id)->get();
            return view('institution/addFees', compact('fees', 'course'));
        }
    }

    ///update fees
    public function feesupdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required',
            'tutionfee' => 'required',
            'other' => 'required',
            'application' => 'required',

        ], [
            'category.required' => 'Minimum GPA is must required.',
            'tutionfee.required' => 'Education field is must required.',
            'other.required' => 'TOEFL is must required.',
            'application.required' => 'IELTS is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $fees = addFees::find($request->id);

        $fees->course_id = $request->category;
        $fees->tution_fees = $request->tutionfee;
        $fees->acc_other_fees = $request->other;
        $fees->application_fees = $request->application;
        if ($fees->save()) {
            Session::forget('state');
            Session::put('state', 'fees');
            return redirect()->route('institution/manage-courses');
        } else {
            return redirect()->route('institution/manage-courses');
        }
    }

    ///delete fees
    public function feesdelete($id)
    {
        $course = addFees::find($id);
        $course->delete();
        Session::forget('state');
        Session::put('state', 'fees');
        return back()->with('feesdelete', 'Fees delete successfully');
    }

    ///upload multiple institution images

    public function uploadmultipleimage(Request $request)
    {
        //validate the files

        Session::forget('status');
        Session::put('status', 'personal');

        $this->validate($request, [
            'multipleimages' => 'required',
            'multipleimages.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('multipleimages')) {
            $image = $request->file('multipleimages');
            $i = 0;
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            if (Session::get('institution_detail_id') == '') {
                return redirect()->route('/institution/login');
            }
            $institution_id = Session::get('institution_id');
            $institution_detail_id = Session::get('institution_detail_id');

            if ($request->hasfile('multipleimages')) {
                foreach ($request->file('multipleimages') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path() . '/InstitutionImage/', $name);
                    $imgData = $name;

                    $fileModal = new add_multiple_image();
                    $fileModal->image = $imgData;
                    $fileModal->institution_id = $institution_id;
                    $fileModal->institution_detail_id = $institution_detail_id;
                    $fileModal->save();
                }

                return redirect()->route('/institution/index')->with('success', 'File has successfully uploaded!');
            }
        }

    }
    ///manage branch
    public function managebranch(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $branch = addBranch::all();
            return view('institution/manageBranch', compact('branch'));
        }
    }

    ///add branch
    public function addBranch(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $branch = "";

            return view('institution/addBranch', compact('branch'));
        }
    }

    public function add_branch(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'branch_name' => 'required',
            'location' => 'required',
        ], [
            'branch_name.required' => 'branch_name is must required.',
            'location.required' => 'location is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        $institution_id = Session::get('institution_id');
        $idid =
        $institution_detail_id = Session::get('institution_detail_id');
        $branchname = $request->branch_name;
        $location = $request->location;
        $user = addBranch::create(['institution_id' => $institution_id, 'institution_detail_id' => $institution_detail_id, 'branch_name' => $branchname, 'location' => $location]);
        if ($user) {
            return redirect()->route('institution/manage-courses');
        } else {
            return redirect()->route('institution/manage-courses');
        }

    }
    public function branchedit($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $branch = addBranch::find($id);
            $course = addCoursesModel::all();
            return view('institution/addBranch', compact('branch'));
        }
    }

    ///update fees
    public function branchupdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'branch_name' => 'required',
            'location' => 'required',
        ], [
            'branch_name.required' => 'branch_name is must required.',
            'location.required' => 'location is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $branch = addBranch::find($request->id);

        $branch->branch_name = $request->branch_name;
        $branch->location = $request->location;
        if ($branch->save()) {
            return redirect()->route('institution/manage-courses');
        } else {
            return redirect()->route('institution/manage-courses');
        }
    }

    public function updateGlance(Request $request)
    {
        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        if (Session::get('institution_detail_id') == '') {
            return redirect()->route('/institution/login');
        }
        $institution_id = Session::get('institution_id');
        $institution_detail_id = Session::get('institution_detail_id');
        $exit = addGlance::where('institution_detail_id', $institution_detail_id)->get();
        if ($exit) {

            $institution_id = Session::get('institution_id');
            $institution_detail_id = Session::get('institution_detail_id');
            $course = addGlance::where('institution_detail_id', $institution_detail_id)->delete();

            foreach ($request->moreFields as $key => $value) {
                if (!$value) {
                    return back()->with('fail', 'All Glance field must required');
                }

                $glance = new addGlance();
                $glance->glance = $value;
                $glance->institution_id = $institution_id;
                $glance->institution_detail_id = $institution_detail_id;
                $glance->save();
            }

            Session::forget('status');
            Session::put('status', 'video');

            return back()->with('success', 'New subject has been added.');
        } else {
            if (Session::get('institution_detail_id') == '') {
                return redirect()->route('/institution/login');
            }
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            $institution_id = Session::get('institution_id');
            $institution_detail_id = Session::get('institution_detail_id');

            foreach ($request->moreFields as $key => $value) {
                if (!$value) {
                    return back()->with('fail', 'All Glance field must required');
                }
                $institution_id = Session::get('institution_id');
                $institution_detail_id = Session::get('institution_detail_id');

                $glance = new addGlance();
                $glance->institution_id = $institution_id;
                $glance->institution_detail_id = $institution_detail_id;
                $glance->glance = $value;
                $glance->save();

            }

            Session::forget('status');
            Session::put('status', 'video');
            return back()->with('success', 'New subject has been added.');
        }

    }

    public function glancedelete($id)
    {
        $glance = addGlance::where('id', $id)->delete();
        return back()->with('glancedelete', 'Student delete successfully');
    }

    public function rolePermission()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {

            $allrole = addRole::where('type', 'insitution')->get();
            return view('institution/rolePermission', compact('allrole'));
        }
    }

    public function managedocument()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            return view('institution/manageDocument');
        }
    }

    public function managecommission()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $allcommission = addCommission::all();
            $editcommission = '';
            return view('institution/manageCommission', compact('allcommission', 'editcommission'));
        }
    }

    public function addCommission(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('institution/login');
        } else {

            $commissionexit = addCommission::where('degree', $request->degree)->first();
            if ($commissionexit) {
                return back()->with('delete', 'Commission  Already Exit');
            }

            if ($request->commission_percentage) {
                if (Session::get('institution_id') == '') {
                    return redirect()->route('/institution/login');
                }
                $idd = Session::get('institution_id');
                $institution = addInstitution::where('institution_id', $idd)->first();
                Session::put('institution_detail_id', $institution->id);
                $id = Session::get('institution_detail_id');
                $degree = $request->degree;
                $commission_type = $request->commission_type;
                $commission = $request->commission_percentage;
                $createCommission = addCommission::create(['institution_id' => $id, 'degree' => $degree, 'commission_type' => $commission_type, 'commission' => $commission]);
                if ($createCommission) {
                    return redirect()->route('/institution/manage-commission');
                } else {
                    return redirect()->route('/institution/manage-commission');
                }

            } else {
                if (Session::get('institution_id') == '') {
                    return redirect()->route('/institution/login');
                }
                $idd = Session::get('institution_id');
                $institution = addInstitution::where('institution_id', $idd)->first();
                Session::put('institution_detail_id', $institution->id);
                $id = Session::get('institution_detail_id');
                $degree = $request->degree;
                $commission_type = $request->commission_type;
                $commission = $request->commission_flat;
                $createCommission = addCommission::create(['institution_id' => $id, 'degree' => $degree, 'commission_type' => $commission_type, 'commission' => $commission]);
                if ($createCommission) {
                    return redirect()->route('/institution/manage-commission');
                } else {
                    return redirect()->route('/institution/manage-commission');
                }

            }

        }

    }

    public function deleteCommission($id)
    {
        $commission = addCommission::find($id);
        $commission->delete();
        return back()->with('delete', 'commission delete successfully');
    }

    public function editCommission($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('institution/login');
        } else {
            $editcommission = addCommission::where('id', $id)->first();
            return view('institution/manageCommission', compact('editcommission'));

        }

    }

    public function addRole(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('institution/login');
        } else {
            $editRole = '';
            $country = DB::table('country')->get();
            return view('institution/addRole', compact('editRole', 'country'));
        }

    }

    public function logout()
    {

        Session::flush();
        return redirect()->route('/institution/login');

    }

    public function addroleFeatures(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'role' => 'required',

        ], [
            'name.required' => 'Contact name is must required.',
            'email.required' => 'Relationship  is must required.',
            'phone.required' => 'Contact phone  is must required.',
            'password.required' => 'Contact email is must required.',
            'role.required' => 'Contact email is must required.',

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

        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $type = 'insitution';
        $role_type = '1';
        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        $insitutionid = Session::get('institution_id');
        $json = json_encode($request->rolefeatures);

        $createrole = addRole::create(['name' => $name, 'email' => $email, 'insitution_id' => $insitutionid, 'phone' => $phone, 'role' => $role, 'type' => $type, 'password' => Hash::make($password), 'rolefeatures' => $json]);
        $id = Session::get('institution_id');
        $agentmail = InstitutionModel::where('id', $id)->first();
        if ($createrole) {

            return redirect()->route('/institution/role-permission')->with('emailsend', 'Please send email with your pesonal account');

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
        return view('institution/addRole', compact('editRole', 'country'));
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
        $roleFeat->country = $request->country;
        $json = json_encode($request->rolefeatures);
        $roleFeat->rolefeatures = $json;
        if ($roleFeat->save()) {
            return redirect()->route('/institution/role-permission');
        } else {

            return back();
        }
    }

    public function leadmanage()
    {
        $idd = Session::get('institution_id');
       
        $institution = addInstitution::where('institution_id', $idd)->first();

        $leads = addLead::where('type', 'insitution')->where('lead_assign_id', $institution->id)->where('status', '0')->get();
        $staff = addRole::where('type', 'insitution')->where('insitution_id', $idd)->get();
        return view('institution/manageLead', compact('leads', 'staff'));
    }

    public function assignstaff(Request $request)
    {
        $assignlead = addLead::where('id', $request->assign_id)->first();
        $assignlead->staff_assign_id = $request->agent;
        if ($assignlead->save()) {
            return redirect()->route('/institution/lead-manage');
        } else {
            return redirect()->route('/institution/lead-manage');
        }
    }

    public function roleleadmanage()
    {
        $id = Session::get('roleidd');
        $leads = addLead::where('staff_assign_id', $id)->where('type', 'insitution')->where('status', '0')->get();

        return view('institution/rolemanageLead', compact('leads'));
    }

    public function completeleadmanage()
    {

        $leads = addLead::where('type', 'insitution')->where('status', '1')->get();
        $staff = addRole::where('type', 'insitution')->get();
        return view('institution/completemanageLead', compact('leads', 'staff'));
    }

    public function rolecompleteleadmanage()
    {

        $leads = addLead::where('type', 'insitution')->where('status', '1')->get();

        return view('institution/rolecompletemanageLead', compact('leads'));
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
            'insitution_staff_id' => 'required',

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
        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        $idd = Session::get('institution_id');
        $institution = addInstitution::where('institution_id', $idd)->first();
        $lead_ownwer = $institution->id;
        $type = 'insitution';
        $lead_assign_id = $institution->id;
        $staff_assign_id = $request->insitution_staff_id;

        $lead = addLead::create(['first_name' => $first_name, 'email' => $email, 'staff_assign_id' => $staff_assign_id, 'phone' => $phone, 'last_name' => $last_name, 'source' => $source, 'comment' => $comment, 'lead_ownwer' => $lead_ownwer, 'type' => $type, 'lead_assign_id' => $lead_assign_id]);
        if ($lead) {
            return redirect()->route('/institution/lead-manage');
        } else {
            return back();
        }
    }

    public function changeStatus(Request $request)
    {
        $user = addLead::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function leadchangeStatus(Request $request)
    {
        $user = addLead::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function leaddelete($id)
    {
        $lead = addLead::find($id);
        $lead->delete();
        return back()->with('delete', 'Lead delete successfully');
    }

    public function support()
    {
        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        $id = Session::get('institution_id');
        $institution = addInstitution::where('institution_id', $id)->first();
        $support = addSupport::where('institution_id', $institution->id)->where('type', 'institution')->get();
        return view('institution/support', compact('support'));
    }

    public function addsupport()
    {

        return view('institution/addSupport');
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
        if (Session::get('institution_id') == '') {
            return redirect()->route('/institution/login');
        }
        $id = Session::get('institution_id');
        $institution = addInstitution::where('institution_id', $id)->first();

        $subject = $request->subject;
        $comment = $request->comment;
        $type = 'institution';
        $agent_id = '0';
        $institution_id = $institution->id;

        $support = addSupport::create(['subject' => $subject, 'comment' => $comment, 'type' => $type, 'agent_id' => '0', 'insitution_id' => $institution_id]);
        if ($support) {
            return redirect()->route('/institution/support');
        } else {
            return back();
        }
    }

    public function studentlist()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
           
            $institution = addInstitution::where('institution_id', $id)->first();
            
            if ($institution) {
                $student = StudentModel::where('institution_id', $institution->id)->get();
            } else {
                $student = array();
            }
            $idd = $institution->id;
            return view('institution/studentlist', compact('student', 'idd'));
        }
    }

    public function editTask(Request $request)
    {
        $id = $request->id;
        $emp = addTask::find($id);
        return response()->json($emp);
    }

    public function changeTaskStatus(Request $request)
    {
        $user = addTask::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
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
        $task->priority = $request->priority;

        $task->task_name = $request->task_title;
        $task->assign_id = $request->staff;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->task_description = $request->comment;

        if ($task->save()) {
            return redirect()->route('/institution/task-manage')->with('delete', 'Task Updated successfully');
        } else {
            return redirect()->route('/institution/task-manage')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function applicationlist()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            if (Session::get('institution_id') == '') {
                return redirect()->route('/institution/login');
            }
            $id = Session::get('institution_id');
            $institution = addInstitution::where('institution_id', $id)->first();
            
            if ($institution) {
                $student = StudentModel::where('institution_id', $institution->id)->where('student_status', '3')->get();
            } else {
                $student = array();
            }
            return view('institution/applicationlist', compact('student'));
        }
    }

    public function checkapplication($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
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

            return view('institution/checkApplication', compact('student', 'address', 'language', 'contact', 'countries', 'academics', 'passportimage', 'marksheet', 'other', 'recommendation', 'financial'));

        }
    }

    public function recheckapplicationStatus($id)
    {
        $application = StudentModel::where('id', $id)->first();
        $application->student_status = '2';
        if ($application->save()) {

            return redirect()->back()->with('delete', 'Send application rechecking successfully');
        } else {
            return redirect()->back();
        }
    }

    public function completeapplicationStatus($id)
    {
        $application = StudentModel::where('id', $id)->first();
        $application->student_status = '4';
        if ($application->save()) {

            return redirect()->back()->with('delete', 'Application submit successfully');
        } else {
            return redirect()->back();
        }
    }

    public function managetask()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
            $task = addTask::where('institution_id', $id)->where('type', 'insitution')->where('assign_id', '!=', '0')->where('status', '0')->get();
            $staff = addRole::where('institution_id', $id)->where('type', 'insitution')->get();
            return view('institution/manageTask', compact('task', 'staff'));
        }
    }

    public function getSelfTask()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
            $task = addTask::where('insitution_id', $id)->where('type', 'insitution')->where('assign_id', '0')->where('status', '0')->get();

            $staff = addRole::where('insitution_id', $id)->where('type', 'insitution')->get();
            return view('institution/getSelfTask', compact('task', 'staff'));
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
        ], [
            'task_title.required' => 'Title is must required.',
            'staff.required' => 'staff is must required.',
            'start_date.required' => 'Start date is must required.',
            'end_date.required' => 'End date  is must required.',
            //  'comment.required' => 'Question is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $priority = $request->priority;
        $task_title = $request->task_title;
        $staff = $request->staff;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $comment = $request->comment;
        $cancelMessage = '';
        $type = 'insitution';
        $id = Session::get('institution_id');
        $task = addTask::create(['insitution_id' => $id, 'priority' => $priority, 'task_name' => $task_title, 'cancelMessage' => $cancelMessage, 'type' => $type, 'assign_id' => $staff, 'start_date' => $start_date, 'end_date' => $end_date, 'task_description' => $comment]);
        if ($task) {
            return redirect()->route('/institution/task-manage')->with('delete', 'Task Added successfully');
        } else {
            return redirect()->route('/institution/task-manage')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function addselftask(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'task_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
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
        $type = 'insitution';
        $id = Session::get('institution_id');
        $task = addTask::create(['insitution_id' => $id, 'task_name' => $task_title, 'cancelMessage' => $cancelMessage, 'type' => $type, 'start_date' => $start_date, 'end_date' => $end_date, 'task_description' => $comment]);
        if ($task) {
            return redirect()->route('/institution/self-task-manage')->with('delete', 'Task Added successfully');
        } else {
            return redirect()->route('/institution/self-task-manage')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function canceltask()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $task = addTask::where('type', 'insitution')->where('status', '1')->get();
            return view('institution/canceltask', compact('task'));
        }
    }

    public function completedtask()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $task = addTask::where('type', 'insitution')->where('status', '2')->get();
            return view('institution/completeTask', compact('task'));
        }
    }

    public function assignTask()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('roleidd');
            $task = addTask::where('assign_id', $id)->where('type', 'insitution')->where('status', '0')->get();
            return view('institution/assignTask', compact('task'));
        }
    }

    public function completetask($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
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
        $id = Session::get('institution_id');
        $idd = addInstitution::where('institution_id', $id)->first();
        $emailprofile = emailModel::where('insitution_id', $id)->where('type', 'insitution')->orderBy('id', 'desc')->take(5)->get();
        $group = addGroup::where('type', 'insitution')->get();
        $template = addEmailTemplate::where('insitution_id', $idd->id)->where('add_type', 'insitution')->get();

        return view('institution/sendEmailGroup', compact('group', 'emailprofile', 'template'));
    }

    public function sendSingleEmail(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'senderEmail' => 'required',
            'member' => 'required',
            'subject' => 'required',
            'message' => 'required',

        ], [
            'senderEmail.required' => 'Sender Email  is must required.',
            'member.required' => 'Email  is must required.',
            'subject.required' => 'Subject  is must required.',
            'message.required' => 'Message is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $senderEmail = $request->senderEmail;
        $email = $request->member;
        $subject = $request->subject;
        $message = $request->message;
        $type = 'insitution';
        $details = [
            'subject' => $subject,
            'email' => $request->member,
            'message' => $message,
        ];
        $id = Session::get('institution_id');
        Mail::to($request->member)->send(new sendemailbyadmin($details));
        $email = emailModel::create(['insitution_id' => $id, 'sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $request->membertype]);
        if ($email) {
            $id = Session::get('institution_id');
            $exit = EmailSubcription::where('insitution_id', $id)->where('type', 'insitution')->first();
            if ($exit) {
                $exit->remaining_email = $exit->remaining_email - 1;
                $exit->save();
            }
            return back()->with('message', 'Email send successfully');
        } else {
            return back();
        }

    }

    public function getList(Request $request)
    {
        if ($request->type == 'Staff') {
            $id = Session::get('agent_id');
            $data['members'] = addRole::where('agent_id', '=', $id)->where('type', '=', 'agent')->get();
        } else if ($request->type == 'Agent') {
            $id = Session::get('institution_id');
            $info = addInstitution::where('institution_id', $id)->first();
            $agent = StudentModel::where('insitution_id', $info->id)->get();
            $data['members'] = StudentModel::where('insitution_id', $info->id)->get();
        } else {
            $id = Session::get('institution_id');
            $info = addInstitution::where('institution_id', $id)->first();
            $data['members'] = StudentModel::where('insitution_id', $info->id)->get();
        }
        return response()->json($data);
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
        $id = Session::get('institution_id');
        foreach ($groupss as $value) {

            if ($value->type == "Agent") {
                $agent = AgentModel::find($value->member_id);
                $senderEmail = $request->senderEmail;
                $email = $agent->email;
                $subject = $request->subject;
                $message = $request->message;
                $type = 'insitution';
                $details = [
                    'subject' => $subject,
                    'email' => $request->email,
                    'message' => $message,
                ];

                Mail::to($request->email)->send(new sendemailbyadmin($details));
                $email = emailModel::create(['insitution_id' => $id, 'sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

                $id = Session::get('institution_id');

                $exit = EmailSubcription::where('insitution_id', $id)->where('type', 'insitution')->first();
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
                $type = 'insitution';
                $details = [
                    'subject' => $subject,
                    'email' => $request->email,
                    'message' => $message,
                ];

                Mail::to($request->email)->send(new sendemailbyadmin($details));
                $email = emailModel::create(['insitution_id' => $id, 'sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);
                $id = Session::get('institution_id');
                $exit = EmailSubcription::where('insitution_id', $id)->where('type', 'insitution')->first();
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
                $type = 'insitution';
                $details = [
                    'subject' => $subject,
                    'email' => $request->email,
                    'message' => $message,
                ];

                Mail::to($request->email)->send(new sendemailbyadmin($details));
                $email = emailModel::create(['insitution_id' => $id, 'sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

                $id = Session::get('institution_id');
                $exit = EmailSubcription::where('insitution_id', $id)->where('type', 'insitution')->first();
                if ($exit) {
                    $exit->remaining_email = $exit->remaining_email - 1;
                    $exit->save();
                }
            }
        }
        return back()->with('message', 'Email send successfully');

    }

    public function getgroup()
    {
        $id = Session::get('institution_id');
        $group = addGroup::where('insitution_id', $id)->where('type', 'insitution')->get();
        return view('institution/getgroup', compact('group'));
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
        $type = 'insitution';
        $id = Session::get('institution_id');
        $group = addGroup::create(['insitution_id' => $id, 'group_name' => $group_name, 'group_description' => $group_description, 'type' => $type]);
        if ($group) {
            return back()->with('message', 'Email send successfully');
        } else {
            return back();
        }
    }

    public function addGroupMember($id)
    {
        $groupmember = addGroupMember::where('group_id', $id)->get();

        return view('institution/addGroupMember', compact('id', 'groupmember'));
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
        $id = Session::get('institution_id');
        $email = emailModel::where('insitution_id', $id)->get();
        return view('institution/getEmailLog', compact('email'));
    }

    public function smsSend()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
            $insitutionProfile = InstitutionModel::where('id', $id)->first();
            $smsprofile = smsModel::where('institution_id', $id)->where('type', 'insitution')->orderBy('id', 'desc')->take(5)->get();
            $group = addSmsGroup::where('type', 'instiution')->get();
            $template = addSmsTemplate::where('institution_id', $id)->where('add_type', 'insitution')->get();

            return view('institution/smsSend', compact('smsprofile', 'group', 'insitutionProfile', 'template'));
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

        $senderphone = $request->phone;
        $sms = $request->member;
        $message = $request->message;
        $type = 'insitution';

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

            } elseif ($agent->country == 'Nepal') {
                $text = strip_tags($request->message);
                $args = http_build_query(array(
                    'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                    'from' => 'Studify',
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
                $args = http_build_query(array(
                    'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                    'from' => 'Studify',
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

        } else {
            $exit = InstitutionModel::where('phone', $request->member)->first();
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
                $args = http_build_query(array(
                    'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                    'from' => 'Studify',
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

        $id = Session::get('institution_id');
        $email = smsModel::create(['insitution_id' => $id, 'sender' => $senderphone, 'reciever' => $sms, 'message' => $message, 'type' => $type, 'member_type' => $request->membertype]);

        if ($email) {
            $exit = SmsSubcription::where('insitution_id', $id)->where('type', 'insitution')->first();
            if ($exit) {
                $exit->remaining_sms = $exit->remaining_sms - 1;
                $exit->save();
            }

            return back()->with('message', 'SMS send successfully');
        } else {
            return back();
        }
    }

    public function getsmsgroup()
    {
        $id = Session::get('institution_id');
        $smsgroup = addSmsGroup::where('insitution_id', $id)->where('type', 'insitution')->get();
        return view('institution/getSmsGroup', compact('smsgroup'));
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
        $type = 'insitution';
        $id = Session::get('institution_id');

        $group = addSmsGroup::create(['insitution_id' => $id, 'group_name' => $group_name, 'group_description' => $group_description, 'type' => $type]);
        if ($group) {
            return back()->with('message', 'Email send successfully');
        } else {
            return back();
        }
    }

    public function addSmsGroupMember($id)
    {
        $member = addSmsGroupMember::where('group_id', $id)->get();
        return view('institution/addSmsGroupMember', compact('id', 'member'));
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
                    $text = strip_tags($request->message);
                    $args = http_build_query(array(
                        'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                        'from' => 'Demo',
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
                        'from' => 'Demo',
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
                        'from' => 'Demo',
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

                $sms = smsModel::create(['sender' => $senderEmail, 'reciever' => $email, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

            }
            $id = Session::get('institution_id');
            $exit = SmsSubcription::where('insitution_id', $id)->where('type', 'insitution')->first();
            if ($exit) {
                $exit->remaining_sms = $exit->remaining_sms - 1;
                $exit->save();
            }
        }
        return back()->with('message', 'Sms Send successfully');

    }

    public function getSms()
    {
        $id = Session::get('institution_id');
        $sms = smsModel::where('insitution_id', $id)->get();
        return view('institution/getSmsLog', compact('sms'));
    }

    public function workflow()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            return view('institution/workflow');

        }
    }

    public function invoice()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
            $info = addInstitution::where('institution_id', $id)->first();
            if ($info) {
                $invoice = addInvoice::where('insitution_id', $info->id)->get();
            } else {
                $invoice = array();
            }
            return view('institution/invoice', compact('invoice'));

        }
    }

    public function account(Request $request)
    {

        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
           
            $info = addInstitution::where('id', $id)->first();
            $invoice = addInvoice::where('insitution_id', $info->id)->where('status', '1')->get();
            return view('institution/account', compact('invoice'));

        }
    }

    public function calender(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
            $tasks = addTask::where('insitution_id', '=', $id)->where('type', '=', 'insitution')->get(['id', 'task_name', 'start_date', 'end_date']);

            return view('institution/calender', compact('tasks'));
        }
    }

    public function fullcalender(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('roleidd');
            $tasks = addTask::where('assign_id', '=', $id)->where('type', '=', 'insitution')->get(['id', 'task_name', 'start_date', 'end_date']);

            return view('institution/fullcalender', compact('tasks'));
        }
    }

    public function getsmsPackage(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $package = smsPackage::where('country', 'Other')->get();
            $nepalpackage = smsPackage::where('country', 'Nepal')->get();

            return view('institution/getSmsPackage', compact('package', 'nepalpackage'));
        }
    }

    public function getemailPackage(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $package = email_package::where('country', 'Other')->get();
            $nepalpackage = email_package::where('country', 'Nepal')->get();
            return view('institution/getEmailPackage', compact('package', 'nepalpackage'));
        }
    }

    public function emailPackagePayment($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $package = email_package::where('id', $id)->first();
            return view('institution/getEmailPackagePayment', compact('package'));
        }
    }

    public function smsPackagePayment($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $package = smsPackage::where('id', $id)->first();
            return view('institution/getSmsPackagePayment', compact('package'));
        }
    }

    public function smsPackagePaymentSend(Request $request)
    {
        $price = $request->package_price;
        $package_id = $request->package_id;
        $insitution_id = Session::get('institution_id');

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->package_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify",
        ]);

        Session::flash('success', 'Payment successful!');

        $agent_profile = addInstitution::where('id', $insitution_id)->first();

        $lastAgent = SmsSubcription::where('insitution_id', $insitution_id)->orderBy('id', 'DESC')->limit(1)->first();

        $totalsms = intval($lastAgent->remaining_sms) + intval($request->sms_limit);

        $smspackage = SmsSubcription::create(['agent_id' => '0', 'insitution_id' => $insitution_id, 'type' => 'insitution', 'balance_sms' => $request->sms_limit, 'remaining_sms' => $totalsms, 'package_price' => $request->package_price,
            'transcation_id' => $charge->id]);
        if ($smspackage) {
            return back()->with(['msg' => 'Payemt Done Successfully']);
        } else {
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);

        }
    }

    public function emailPackagePaymentSend(Request $request)
    {
        $price = $request->package_price;
        $package_id = $request->package_id;
        $insitution_id = Session::get('institution_id');

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->package_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify",
        ]);

        Session::flash('success', 'Payment successful!');

        $agent_profile = addInstitution::where('id', $insitution_id)->first();

        $lastAgent = EmailSubcription::where('insitution_id', $insitution_id)->orderBy('id', 'DESC')->limit(1)->first();

        $totalsms = intval($lastAgent->remaining_email) + intval($request->email_limit);

        $smspackage = EmailSubcription::create(['agent_id' => '0', 'insitution_id' => $insitution_id, 'type' => 'insitution', 'balance_email' => $request->email_limit, 'remaining_email' => $totalsms, 'package_price' => $request->package_price,
            'transcation_id' => $charge->id]);
        if ($smspackage) {
            return back()->with(['msg' => 'Payemt Done Successfully']);
        } else {
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);

        }
    }

    public function getStoragePackage(Request $request)
    {
        {
            if (Session::get('insitutionlogin') != 'loginsuccess') {
                return redirect()->route('/institution/login');
            } else {
                $package = addStoragePackage::where('country', 'Other')->get();
                $nepalpackage = addStoragePackage::where('country', 'Nepal')->get();
                return view('institution/getStoragePackage', compact('package', 'nepalpackage'));
            }
        }
    }

    public function storagePackagePayment($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $package = addStoragePackage::where('id', $id)->first();
            return view('institution/getStoragePackagePayment', compact('package'));
        }
    }

    public function storagePackagePaymentSend(Request $request)
    {
        $price = $request->package_price;
        $package_id = $request->package_id;
        $insitution_id = Session::get('institution_id');

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->package_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify",
        ]);

        Session::flash('success', 'Payment successful!');

        $agent_profile = addInstitution::where('id', $insitution_id)->first();

        $lastAgent = StorageSubcription::where('insitution_id', $insitution_id)->orderBy('id', 'DESC')->limit(1)->first();

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

        $smspackage = StorageSubcription::create(['agent_id' => '0', 'insitution_id' => $insitution_id, 'type' => 'insitution', 'balance_storage' => $request->storage_limit, 'remaining_storage' => $totalsms, 'package_price' => $request->package_price,
            'transcation_id' => $charge->id]);
        if ($smspackage) {
            return back()->with(['msg' => 'Payemt Done Successfully']);
        } else {
            return back()->with(['msg' => 'Workflow Status Change Sucessfully']);

        }
    }

    public function getDocument(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $id = Session::get('institution_id');
            $folder = addDocument::where('p_id', '0')->where('insitution_id', $id)->orderBy('id', 'DESC')->get();
            $getfile = addDocument::where('p_id', '0')->where('insitution_id', $id)->orderBy('id', 'DESC')->limit(3)->get();
            return view('institution/getDocument', compact('folder', 'id', 'getfile'));
        }
    }

    public function createFile(Request $request)
    {

        $id = Session::get('institution_id');
        $checkpackageexit = StorageSubcription::where('insitution_id', $id)->first();
        if ($checkpackageexit) {
            $document = '';

            if (!empty($request->file)) {
                $files = $request->file('file');
                $fileName = $files->getClientOriginalName();
                // $extensions = $files->getClientOriginalExtension();
                // $filenames = time().rand(1,99).'.' . $extensions;
                $filePath = 'institution/institution_' . $id;
                $path = $request->file('file')->storeAs(
                    $filePath,
                    $fileName,
                    's3'
                );
                $document = $fileName;
            }

            $folder = addDocument::create(['agent_id' => '0', 'insitution_id' => $id, 'level' => '1', 'filename' => $document]);

            if ($folder) {
                return response()->json(['success' => 'File Upload successfully.']);
            } else {
                return response()->json(['success' => 'Status change successfully.']);
            }
        } else {
            return response()->json(['success' => 'Please purchase the storage package to be able to upload the files. Thank you']);
        }
    }

    public function createDocumentFolder(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $validate = Validator::make($request->all(), [
                'folder_name' => 'required',
            ], [
                'folder_name.required' => 'Email is must required.',
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }

            $id = Session::get('institution_id');
            $folder = addDocument::create(['agent_id' => '0', 'insitution_id' => $id, 'level' => '1', 'foldername' => $request->folder_name]);
            if ($folder) {
                return back();
            } else {
                return back();
            }
        }
    }

    public function getDocumentFolder($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $folder_id = $id;
            $institution_id = Session::get('institution_id');
            $folder = addDocument::where('p_id', $id)->where('insitution_id', $institution_id)->where('level', '2')->orderBy('id', 'DESC')->get();
            $getfile = addDocument::where('p_id', $id)->where('insitution_id', $institution_id)->where('level', '2')->orderBy('id', 'DESC')->limit(3)->get();

            return view('institution/getSubFolder', compact('folder', 'institution_id', 'folder_id', 'getfile'));
        }
    }

    public function createSubFolderFile(Request $request)
    {

        $institution_id = Session::get('institution_id');
        $checkpackageexit = StorageSubcription::where('insitution_id', $institution_id)->first();
        if ($checkpackageexit) {
            $document = '';
            if (!empty($request->file)) {
                $files = $request->file('file');
                $fileName = $files->getClientOriginalName();
                // $extensions = $files->getClientOriginalExtension();
                // $filenames = time().rand(1,99).'.' . $extensions;
                $filePath = 'institution/institution_' . $institution_id;
                $path = $request->file('file')->storeAs(
                    $filePath,
                    $fileName,
                    's3'
                );
                $document = $fileName;
            }

            $folder = addDocument::create(['agent_id' => '0', 'insitution_id' => $institution_id, 'p_id' => $request->folder_id, 'level' => '2', 'filename' => $document]);

            if ($folder) {
                return response()->json(['success' => 'File Upload successfully.']);
            } else {
                return response()->json(['success' => 'Status change successfully.']);
            }
        } else {
            return response()->json(['success' => 'Please purchase the storage package to be able to upload the files. Thank you']);
        }
    }

    public function createDocumentSubFolder(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
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
            $institution_id = Session::get('institution_id');
            $folder = addDocument::create(['agent_id' => '0', 'insitution_id' => $institution_id, 'p_id' => $folder_id, 'level' => '2', 'foldername' => $request->folder_name]);

            if ($folder) {
                return back();
            } else {
                return back();
            }
        }
    }

    public function getFiles($id)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $folder_id = $id;
            $institution_id = Session::get('institution_id');
            $folder = addDocument::where('p_id', $id)->where('insitution_id', $institution_id)->where('level', '3')->orderBy('id', 'DESC')->get();
            $getfile = addDocument::where('p_id', $id)->where('insitution_id', $institution_id)->where('level', '3')->orderBy('id', 'DESC')->limit(3)->get();

            return view('institution/getFiles', compact('folder', 'institution_id', 'folder_id', 'getfile'));
        }
    }

    public function createFolderFile(Request $request)
    {

        $institution_id = Session::get('institution_id');
        $checkpackageexit = StorageSubcription::where('insitution_id', $institution_id)->first();
        if ($checkpackageexit) {
            $document = '';

            if (!empty($request->file)) {
                $files = $request->file('file');
                $fileName = $files->getClientOriginalName();
                // $extensions = $files->getClientOriginalExtension();
                // $filenames = time().rand(1,99).'.' . $extensions;
                $filePath = 'institution/institution_' . $institution_id;
                $path = $request->file('file')->storeAs(
                    $filePath,
                    $fileName,
                    's3'
                );
                $document = $fileName;
            }

            $folder = addDocument::create(['agent_id' => '0', 'insitution_id' => $institution_id, 'p_id' => $request->folder_id, 'level' => '3', 'filename' => $document]);

            if ($folder) {
                return response()->json(['success' => 'File Upload successfully.']);
            } else {
                return response()->json(['success' => 'Status change successfully.']);
            }
        } else {
            return response()->json(['success' => 'Please purchase the storage package to be able to upload the files. Thank you']);
        }
    }

    public function getSmsTemplate()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $institution_id = Session::get('institution_id');
            $addSmsTemplate = addSmsTemplate::where('institution_id', $institution_id)->where('add_type', 'insitution')->get();
            return view('institution/getSmsTemplate', compact('addSmsTemplate'));
        }
    }

    public function addSmsTemplate(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {

            $validate = Validator::make($request->all(), [
                'template_name' => 'required',
                'template_description' => 'required',
            ], [
                'template_name.required' => 'Select Topic is must required.',
                'template_description.required' => 'Image  is must required.',
            ]);
            $institution_id = Session::get('institution_id');
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $addSmsTemplate = addSmsTemplate::create(['insitution_id' => $institution_id, 'add_type' => 'insitution', 'name' => $request->template_name, 'description' => $request->template_description, 'type' => 'sms']);
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
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $addSmsTemplate = addSmsTemplate::where('id', $id)->first();
            return view('institution/editSmsTemplate', compact('addSmsTemplate'));
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
            return redirect()->route('/institution/get-sms-template')->with('template', 'Template Updated successfully');
        } else {
            return redirect()->route('/institution/get-sms-template')->with('delete', ' Not Updated successfully');
        }

    }

    public function changeInvoiceStatus(Request $request)
    {

        $user = addInvoice::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function getemailtemplate()
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $institution_detail_id = Session::get('institution_detail_id');
            $addEmailTemplate = addEmailTemplate::where('insitution_id', $institution_detail_id)->where('add_type', 'insitution')->get();
            return view('institution/getEmailTemplate', compact('addEmailTemplate'));
        }
    }

    public function addEmailTemplate(Request $request)
    {
        if (Session::get('insitutionlogin') != 'loginsuccess') {
            return redirect()->route('/institution/login');
        } else {
            $validate = Validator::make($request->all(), [
                'template_name' => 'required',
                'template_description' => 'required',
            ], [
                'template_name.required' => 'Select Topic is must required.',
                'template_description.required' => 'Image  is must required.',
            ]);
            $institution_detail_id = Session::get('institution_detail_id');
            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $addSmsTemplate = addEmailTemplate::create(['insitution_id' => $institution_detail_id, 'add_type' => 'insitution', 'name' => $request->template_name, 'description' => $request->template_description, 'type' => 'email']);
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
            return redirect()->route('/institution/get-email-template')->with('template', 'Template Updated successfully');
        } else {
            return redirect()->route('/institution/get-email-template')->with('delete', ' Not Updated successfully');
        }

    }

    public function getEmailTemplateData(Request $request)
    {

        $templateData = addEmailTemplate::find($request->product_id);
        return response()->json($templateData);

    }

    public function editEmailTemplate(Request $request)
    {
        $id = $request->id;
        $emp = addEmailTemplate::find($id);
        return response()->json($emp);
    }

    public function deletefile(Request $request)
    {
        $id = $request->id;
        $emp = addDocument::find($id);
        $insiti = Session::get('institution_id');

        $result = \Storage::disk('s3')->delete('institution/institution_' . $insiti . '/' . $emp->filename);

        $delete = $emp->delete();
        return response()->json([
            'delete' => 'File delete successfully',
        ]);
    }

    public function editFile(Request $request)
    {
        $id = $request->id;
        $emp = addDocument::find($id);
        return response()->json($emp);
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

    public function deletebranch($id)
    {

        $package = addBranch::where('id', $id)->delete();

        return back()->with('template', 'Branch Delete Successfully');
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
