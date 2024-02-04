<?php

namespace App\Http\Controllers;

use App\Mail\BuyCourseSentAdmin;
use App\Mail\forgetPassword;
use App\Models\addAddressModel;
use App\Models\addBlogModel;
use App\Models\addCoupon;
use App\Models\addCoursesModel;
use App\Models\addCourseTopic;
use App\Models\addFees;
use App\Models\addGlance;
use App\Models\addInstitution;
use App\Models\addPackage;
use App\Models\addShortCourse;
use App\Models\addStudentAcademic;
use App\Models\addStudentContact;
use App\Models\addStudentFinancial;
use App\Models\addStudentMarksheet;
use App\Models\addStudentOther;
use App\Models\addStudentPassport;
use App\Models\addStudentRecommand;
use App\Models\add_multiple_image;
use App\Models\AgentModel;
use App\Models\FaqModel;
use App\Models\InstitutionModel;
use App\Models\studentCourse;
use App\Models\studentLanguageModel;
use App\Models\StudentModel;
use App\Models\universityCoursePayment;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use Stripe;

class HomeController extends Controller
{

    public function home(Request $request)
    {
        $student = StudentModel::all();
        $agent = AgentModel::all();
        $institution = InstitutionModel::all();
        $course = addCoursesModel::all();
        $blog = addBlogModel::all();
        return view('homepage', compact('student', 'agent', 'institution', 'course', 'blog'));
    }

    public function getPackagePrice()
    {
        $packages = addPackage::where('package_id', '0')->where('type', '1')->get();
        return view('getPackagePrice', compact('packages'));

    }

    public function findAgent(Request $request)
    {

        $allcountry = DB::table('country')->get();
        $country = DB::table('country')->where('id', $request->country)->first();
        $state = DB::table('states')->where('id', $request->state)->first();
        $city = DB::table('cities')->where('id', $request->city)->first();
        // $city = DB::table('city')->where('id',$request->city)->first();

        if ($request->agent_search) {
            $name = $request->agent_search;
            $agent = AgentModel::where('first_name', 'like', '%' . $request->agent_search . '%')->orwhere('company_name', 'like', '%' . $request->agent_search . '%')->orwhere('state', 'like', '%' . $request->agent_search . '%')->orwhere('city', 'like', '%' . $request->agent_search . '%')->paginate(6);
        } elseif ($request->country) {
            $name = $country->name;
            $agent = AgentModel::where('country', 'like', '%' . $country->name . '%')->paginate(6);
        } elseif ($request->country && $request->state && $request->city) {
            $name = $country->name;
            $agent = AgentModel::where('country', 'like', '%' . $country->name . '%')->orwhere('state', 'like', '%' . $state->name . '%')->orwhere('city', 'like', '%' . $city->name . '%')->paginate(6);
        } elseif ($request->country && $request->state && $request->city) {
            $name = $country->name;
            $agent = AgentModel::where('country', 'like', '%' . $country->name . '%')->orwhere('state', 'like', '%' . $state->name . '%')->orwhere('city', 'like', '%' . $city->name . '%')->paginate(6);
        } else {
            $agent = AgentModel::paginate(6);
            $name = '';
        }

        return view('findAgent', compact('agent', 'allcountry', 'name'));

    }

    public function student(Request $request)
    {
        return view('student');
    }

    public function agent(Request $request)
    {
        $agent = AgentModel::all();
        $country = DB::table('country')->get();
        $state = DB::table('states')->get();
        return view('agent', compact('agent', 'country', 'state'));
    }

    public function institution(Request $request)
    {
        return view('institution');
    }

    public function studentLogin(Request $request)
    {

        return view('studentLogin');
    }

    public function agentLogin(Request $request)
    {

        return view('agentLogin');
    }

    public function institutionLogin(Request $request)
    {

        return view('institutionLogin');
    }

    public function agentRegister(Request $request)
    {
        $country = DB::table('country')->get();
        $country_code = DB::table('country_code')->orderBy('id', 'DESC')->get();
        return view('agentRegister', compact('country', 'country_code'));
    }

    public function institutionRegister(Request $request)
    {
        $country = DB::table('country')->get();
        $country_code = DB::table('country_code')->orderBy('id', 'DESC')->get();
        return view('institutionRegister', compact('country', 'country_code'));
    }

    public function studentRegister(Request $request)
    {
        $country_code = DB::table('country_code')->orderBy('id', 'DESC')->get();
        return view('studentRegister', compact('country_code'));
    }

    public function about(Request $request)
    {

        return view('about');
    }

    public function contact(Request $request)
    {

        return view('contact');
    }

    public function termsConditions(Request $request)
    {

        return view('termCondition');
    }

    public function disclaimer(Request $request)
    {

        return view('disclaimer');
    }

    public function privacyPolicy(Request $request)
    {

        return view('privacyPolicy');
    }

    public function FindExplorebestuniversitiesss(Request $request, $value)
    {

        if ($value == "asc") {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->university_name;
            $levelofstudy = '';
            $allinstitution = addInstitution::orderBy("universirty_name", "asc")->paginate(12);
            $sort = 'asc';
            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
        } else {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->university_name;
            $sort = 'desc';
            $levelofstudy = '';
            $allinstitution = addInstitution::orderBy("universirty_name", "desc")->paginate(12);

            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
        }

    }

    public function FindExplorebestuniversitiesByCountry($country)
    {
        $allcourse = addCoursesModel::all();
        $course = $allcourse->unique('c_name');
        $intake = '';

        $aof = '';
        $search = '';
        $sort = '';
        $levelofstudy = '';
        $allinstitution = addInstitution::where('country', 'like', '%' . $country . '%')->paginate(12);

        return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));

    }

    public function FindExplorebestuniversities(Request $request)
    {

        if ($request->level_of_study) {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->university_name;
            $sort = '';
            $levelofstudy = $request->level_of_study;
            $coursesearch = addCoursesModel::where('type', 'like', '%' . $request->post_sec_discipline_sub_cat_id . '%')->get();
            $coursesearchuni = $coursesearch->unique('institution_detail_id');
            $allinstitution = array();

            foreach ($coursesearchuni as $courses) {
                $allinstitutions = addInstitution::where('id', $courses->institution_detail_id)->first();
                array_push($allinstitution, $allinstitutions);
            }

            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));

        } elseif ($request->university_name) {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->university_name;
            $sort = '';
            $levelofstudy = '';
            $allinstitution = addInstitution::where('universirty_name', 'like', '%' . $request->university_name . '%')->paginate(12);
            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
        } elseif ($request->country_id) {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->university_name;
            $sort = '';
            $levelofstudy = '';
            $allinstitution = addInstitution::where('country', 'like', '%' . $request->country_id . '%')->paginate(12);
            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
        } elseif ($request->post_sec_discipline_id && $request->intakes_id) {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->university_name;
            $sort = '';
            $levelofstudy = '';
            $coursesearch = addCoursesModel::where('AOS', 'like', '%' . $request->post_sec_discipline_id . '%')->where('intake', 'like', '%' . $request->intakes_id . '%')->get();
            $coursesearchuni = $coursesearch->unique('institution_detail_id');
            $allinstitution = array();

            foreach ($coursesearchuni as $courses) {
                $allinstitutions = addInstitution::where('id', $courses->institution_detail_id)->first();
                array_push($allinstitution, $allinstitutions);
            }

            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));

        } elseif ($request->post_sec_discipline_id) {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->university_name;
            $sort = '';
            $levelofstudy = '';
            $coursesearch = addCoursesModel::where('AOS', 'like', '%' . $request->post_sec_discipline_id . '%')->get();
            $coursesearchuni = $coursesearch->unique('institution_detail_id');
            $allinstitution = array();

            foreach ($coursesearchuni as $courses) {
                $allinstitutions = addInstitution::where('id', $courses->institution_detail_id)->first();
                array_push($allinstitution, $allinstitutions);
            }

            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
        } elseif ($request->intakes_id) {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->university_name;
            $sort = '';
            $levelofstudy = '';
            $coursesearch = addCoursesModel::where('intake', 'like', '%' . $request->intakes_id . '%')->get();
            $coursesearchuni = $coursesearch->unique('institution_detail_id');
            $allinstitution = array();

            foreach ($coursesearchuni as $courses) {
                $allinstitutions = addInstitution::where('id', $courses->institution_detail_id)->first();
                array_push($allinstitution, $allinstitutions);
            }

            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
        } elseif ($request->key) {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $intake = $request->intakes_id;
            $country = $request->country_id;
            $aof = $request->post_sec_discipline_id;
            $search = $request->key;
            $sort = '';
            $levelofstudy = '';
            $coursesearch = addCoursesModel::where('c_name', 'like', '%' . $request->key . '%')->get();

            $coursesearchuni = $coursesearch->unique('institution_detail_id');
            $allinstitution = array();

            foreach ($coursesearchuni as $courses) {
                $allinstitutions = addInstitution::where('id', $courses->institution_detail_id)->first();
                array_push($allinstitution, $allinstitutions);
            }

            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
        } else {
            $allcourse = addCoursesModel::all();
            $course = $allcourse->unique('c_name');
            $search = '';
            $intake = '';
            $country = '';
            $aof = '';
            $sort = '';
            $levelofstudy = '';
            $allinstitution = addInstitution::paginate(12);
            return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
        }

    }

    public function PayingCollege(Request $request)
    {

        return view('PayingforCollege');
    }

    public function FAQ(Request $request)
    {
        $student = FaqModel::where('type', 'student')->get();
        $agent = FaqModel::where('type', 'agent')->get();
        $insitution = FaqModel::where('type', 'insitution')->get();
        return view('faq', compact('student', 'agent', 'insitution'));
    }

    public function ExpertAdvice(Request $request)
    {

        return view('ExpertAdvice');
    }

    public function Blog(Request $request)
    {
        $blog = addBlogModel::all();
        return view('Blog', compact('blog'));
    }

    public function singleBlog(Request $request, $value)
    {
        $title = str_replace('-', ' ', $value);
        $blogDetail = addBlogModel::where('blog_heading', $title)->first();
        $allblog = addBlogModel::where('blog_heading', '!=', $title)->take(3)->get();
        return view('singleBlog', compact('blogDetail', 'allblog'));
    }

    public function universitiesdetails($id)
    {

        $glance = addGlance::where('institution_detail_id', $id)->get();

        $institution = addInstitution::find($id);
        $course = addCoursesModel::where('institution_detail_id', $id)->where('type', 'Bachelor')->get();

        $feesbachelor = DB::table('course_fees')
            ->join('institution_courses', 'course_fees.course_id', '=', 'institution_courses.id')->select('course_fees.*', 'institution_courses.c_name')->where('course_fees.institution_detail_id', $id)
            ->get();

        $master = addCoursesModel::where('institution_detail_id', $id)->where('type', 'Master')->get();
        $diploma = addCoursesModel::where('institution_detail_id', $id)->where('type', 'Diploma')->get();
        $phd = addCoursesModel::where('institution_detail_id', $id)->where('type', 'Phd')->get();
        $certificates = addCoursesModel::where('institution_detail_id', $id)->where('type', 'Certificates')->get();

        $images = add_multiple_image::where('institution_detail_id', $id)->get();

        $reqbachelor = DB::table('course_requirement')
            ->join('institution_courses', 'course_requirement.course_id', '=', 'institution_courses.id')->select('course_requirement.*', 'institution_courses.c_name')->where('course_requirement.institution_detail_id', $id)
            ->get();

        $allinstitution = addInstitution::where('universirty_name', 'like', '%' . $institution->universirty_name . '%')->paginate(12);

        return view('universitiesdetails', compact('id', 'institution', 'course', 'master', 'images', 'feesbachelor', 'reqbachelor', 'glance', 'allinstitution', 'diploma', 'phd', 'certificates'));
    }

    public function searchUniverByCourse(Request $request)
    {
        $key = $request->key;
        $search = $request->key;
        $intake = '';
        $country = '';
        $aof = '';
        $sort = '';
        $levelofstudy = '';
        $allcourse = addCoursesModel::all();
        $course = $allcourse->unique('c_name');
        $coursesearch = addCoursesModel::where('c_name', 'like', '%' . $key . '%')->get();

        $coursesearchuni = $coursesearch->unique('institution_detail_id');
        $allinstitution = array();

        foreach ($coursesearchuni as $courses) {
            $allinstitutions = addInstitution::where('id', $courses->institution_detail_id)->first();
            array_push($allinstitution, $allinstitutions);
        }

        return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
    }

    public function searchUniverByName(Request $request)
    {
        $key = $request->universityName;
        $search = '';
        $intake = '';
        $country = '';
        $aof = '';
        $sort = '';
        $levelofstudy = '';
        $course = addCoursesModel::all();
        $allinstitution = addInstitution::where('universirty_name', 'like', '%' . $request->universityName . '%')->paginate(12);

        return view('FindExplorebestuniversities', compact('allinstitution', 'search', 'intake', 'country', 'aof', 'sort', 'course', 'levelofstudy'));
    }

    public function WhyCollegeMatters(Request $request)
    {

        return view('WhyCollegeMatters');
    }

    public function memberforgotpassword(Request $request)
    {

        return view('studentForgetPassword');
    }

    public function agentforgotpassword(Request $request)
    {

        return view('agentForgetPassword');
    }

    public function insitutionforgotpassword(Request $request)
    {
        return view('insitutionForgetPassword');
    }

    public function memberpasswordupdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
        ], [
            'email.required' => 'Email is must required.',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $user = StudentModel::where('email', $request->email)->first();
        if ($user) {
            $token = generateRandomString();
            $user->token = $token;
            $user->save();

            $details = [
                'url' => 'https://studify.au/member',
                'email' => $request->email,
                'token' => $token,
            ];

            Mail::to($request->email)->send(new forgetPassword($details));
            return redirect()->route('/member/login');
        } else {
            return back()->with('fail', 'Email not found');
        }
    }

    public function memberpasswordchange($email, $token)
    {

        return view('student/passwordUpdate', compact('email', 'token'));
    }

    public function updatepassword(Request $request)
    { 
        $validate = Validator::make($request->all(), [
            'password' => 'required',
            'confirmpassword' => 'required',
        ], [
            'password.required' => 'Password is must required.',
            'confirmpassword.required' => 'Confirm password is must required.',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $user = StudentModel::where('email', $request->email)->where('token', $request->token)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                return redirect()->route('/member/login');
            } else {
                return back()->with('fail', 'Password not updated');
            }
        } else {
            return back()->with('fail', 'Email not found');
        }
    } 

    

    public function agentpasswordupdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
        ], [
            'email.required' => 'Email is must required.',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $user = AgentModel::where('email', $request->email)->first();
        if ($user) {
            $token = generateRandomString();
            $user->token = $token;
            $user->save();

            $details = [
                'url' => 'https://studify.au/agents',
                'email' => $request->email,
                'token' => $token,
            ];

            Mail::to($request->email)->send(new forgetPassword($details));
            return redirect()->route('/agent/login');
        } else {
            return back()->with('fail', 'Email not found');
        }
    }

    public function agentpasswordchange($email, $token)
    {

        return view('agentpasswordUpdate', compact('email', 'token'));
    }

// public function agentupdatepassword (Request $request){
//     $validate = Validator::make($request->all(), [
//         'password' => 'required',
//         'confirmpassword' => 'required',
//       ],[
//           'password.required' => 'Password is must required.',
//           'confirmpassword.required' => 'Confirm password is must required.',
//       ]);
//    if($validate->fails()){
//       return back()->withErrors($validate->errors())->withInput();
//       }
//       $user= AgentModel::where('email', $request->email)->where('token', $request->token)->first();
//       if($user){
//             $user->password = Hash::make($request->password);
//             if($user->save()){
//             return redirect()->route('/agent/login');
//             }else{
//                 return back()->with('fail', 'Password not updated');
//             }
//     }else{
//         return back()->with('fail', 'Email not found');
//      }

// }

    public function insitutionpasswordupdate(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
        ], [
            'email.required' => 'Email is must required.',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $user = InstitutionModel::where('email', $request->email)->first();
        if ($user) {
            $token = generateRandomString();
            $user->token = $token;
            $user->save();

            $details = [
                'url' => 'https://studify.au/insitution',
                'email' => $request->email,
                'token' => $token,
            ];

            Mail::to($request->email)->send(new forgetPassword($details));
            return redirect()->route('/institution/login');
        } else {
            return back()->with('fail', 'Email not found');
        }
    }

    public function insitutionpasswordchange($email, $token)
    {

        return view('insitution/passwordUpdate', compact('email', 'token'));
    }

    public function insitutionupdatepassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'password' => 'required',
            'confirmpassword' => 'required',
        ], [
            'password.required' => 'Password is must required.',
            'confirmpassword.required' => 'Confirm password is must required.',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $user = InstitutionModel::where('email', $request->email)->where('token', $request->token)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                return redirect()->route('/institution/login');
            } else {
                return back()->with('fail', 'Password not updated');
            }
        } else {
            return back()->with('fail', 'Email not found');
        }

    }

    public function course()
    {
        $course = addShortCourse::where('status', '1')->get();
        return view('course', compact('course'));
    }

    public function univeristyApply($insitutionid, $courseid)
    {

        $student_id = Session::get('student_iddd');

        $exit = addStudentContact::where('student_id', $student_id)->first();
        $exit1 = StudentModel::where('id', $student_id)->first();
        $exit2 = addAddressModel::where('student_id', $student_id)->first();
        $exit3 = studentLanguageModel::where('student_id', $student_id)->first();
        $exit4 = addStudentAcademic::where('student_id', $student_id)->first();
        $exit5 = addStudentPassport::where('student_id', $student_id)->first();
        $exit6 = addStudentMarksheet::where('student_id', $student_id)->first();
        $exit7 = addStudentOther::where('student_id', $student_id)->first();
        $exit8 = addStudentRecommand::where('student_id', $student_id)->first();
        $exit9 = addStudentFinancial::where('student_id', $student_id)->first();

        if ($exit && $exit1 && $exit2 && $exit3 && $exit4 && $exit5 && $exit6 && $exit7 && $exit8 && $exit9) {
            $student = StudentModel::where('id', $student_id)->first();
            $type = addCoursesModel::where('id', $courseid)->first();

            $fees = addFees::where(['institution_detail_id' => $insitutionid])->where(['course_id' => $courseid])->first();

            if ($fees) {

                if ($fees->application_fees == '0') {
                    $course = universityCoursePayment::create(['agent_id' => $student->agent_id, 'insitution_id' => $insitutionid, 'course_id' => $courseid, 'student_id' => $student_id, 'transcation_id' => '0',
                        'payment_status' => '1', 'fees_type' => 'application', 'fees_amount' => '0']);

                    $user = StudentModel::where('id', $student_id)->first();
                    $user->insitution_id = $insitutionid;
                    if ($user->save()) {
                        return redirect()->route('/student/dashboard');
                    }
                } else {
                    $fees = $fees->application_fees;
                    return view('univeristyApplyCoursePayment', compact('courseid', 'student_id', 'insitutionid', 'fees'));
                }
            } else {
                $fees = '';
                return view('univeristyApplyCoursePayment', compact('courseid', 'student_id', 'insitutionid', 'fees'));
            }
        } else {
            return back()->with('message', 'First you complete your profile');
        }
    }

    public function coursePayment(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'couponcode' => 'required',
        ], [
            'couponcode.required' => 'Please Enter Coupon Code',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $coupondiscount = addCoupon::where('coupon_code', $request->couponcode)->where('coupon_type', 'Academic')->first();
        $course_id = $id;
        $student_id = Session::get('student_iddd');
        $user = StudentModel::where('id', $student_id)->first();
        // if($user->country == 'Nepal'){
        // $country= 'Nepal';
        // }else{
        //     $country= 'Other';
        // }
        $country = 'Other';
        return view('payment', compact('coupondiscount', 'course_id', 'student_id', 'country'));
    }

    public function universityCourseFees($insitutionid, $course_id)
    {
        $type = addCoursesModel::where('id', $course_id)->first();
        $student_id = Session::get('student_iddd');
        $feess = addFees::where(['institution_detail_id' => $insitutionid])->where(['course_id' => $course_id])->first();
        if ($feess) {
            $fees = $feess->application_fees;

        } else {
            $fees = '';
        }
        return view('universityCourseFees', compact('course_id', 'insitutionid', 'student_id', 'fees'));
    }

    public function stripePost(Request $request)
    {

        $course_id = $request->course_id;
        $student_id = $request->student_id;
        $discount_prize = $request->discount_prize;

        $course = studentCourse::where('member_id', $student_id)->where('course_id', $course_id)->where('payment_status', '1')->first();
        if ($course) {
            return redirect()->route('/student/get-course');
        }

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->discount_prize,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify.",
        ]);

        Session::flash('success', 'Payment successful!');

        $course = studentCourse::create(['member_id' => $student_id, 'course_id' => $course_id, 'amount' => $discount_prize, 'transcation_id' => $charge->id,
            'payment_status' => '1']);
        if ($course) {

            return redirect()->route('/student/get-course')->with('course', 'Buy Course Successfully');
        } else {
            return back();
        }
    }

    public function universityStripePost(Request $request)
    {

        $student_id = Session::get('student_iddd');
        $student = StudentModel::where('id', $student_id)->first();
        $course_id = $request->course_id;
        $student_id = $request->student_id;
        $insitutionid = $request->insitution_id;
        $type = addCoursesModel::where('id', $course_id)->first();

        Stripe\Stripe::setApiKey('sk_test_51MfxwqICtr57ZGkocpIN45YU5nOnY23s9S229o3qEVC8UqqBf4njUvq4FYoscQICQXac6fQbvbqp7Q0JlAlM1ogN00ekfzwP6n');
        $charge = Stripe\Charge::create([
            "amount" => $request->price,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Studify.",
        ]);

        Session::flash('success', 'Payment successful!');

        $course = universityCoursePayment::create(['agent_id' => $student->agent_id, 'insitution_id' => $insitutionid, 'course_id' => $course_id, 'student_id' => $student_id, 'transcation_id' => $charge->id,
            'payment_status' => '1', 'fees_type' => 'application', 'fees_amount' => $request->price]);
        $user = StudentModel::where('id', $student_id)->first();
        $user->insitution_id = $insitutionid;
        $user->save;
        if ($course) {
            $details = [
                'name' => $user->first_name,
                'email' => $user->email,
                'coursename' => $type->c_name,
                'type' => $type->type,
            ];

            Mail::to('info@studify.au')->send(new BuyCourseSentAdmin($details));
            return redirect()->route('/student/dashboard');
        } else {
            return back();
        }
    }

    public function offlineUniveristyFees(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'price' => 'required',
            'myfile' => 'required',
        ], [
            'price.required' => 'Password is must required.',
            'myfile.required' => 'Please select file.',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $payment = '';

        if (!empty($request->myfile)) {
            $files = $request->file('myfile');
            $extensions = $files->getClientOriginalExtension();
            $filenames = time() . rand(1, 99) . '.' . $extensions;
            $files->move(public_path('OfflineUniversityPayment/'), $filenames);

            $payment = $filenames;

        }

        $student_id = Session::get('student_iddd');
        $student = StudentModel::where('id', $student_id)->first();
        $course_id = $request->courseid;
        $insitutionid = $request->insitutionid;
        $price = $request->price;
        $type = addCoursesModel::where('id', $course_id)->first();

        $course = universityCoursePayment::create(['agent_id' => $student->agent_id, 'insitution_id' => $insitutionid, 'course_id' => $course_id, 'student_id' => $student_id, 'transcation_id' => '',
            'payment_status' => '0', 'mode' => 'Offline', 'fees_type' => 'application', 'fees_amount' => $request->price, 'image' => $payment]);
        $user = StudentModel::where('id', $student_id)->first();
        $user->insitution_id = $insitutionid;
        $user->save;
        if ($course) {
            return redirect()->route('/student/dashboard');
        } else {
            return back();
        }
    }

    public function getTopic($id)
    {
        $course = addShortCourse::where('id', $id)->first();
        $topic = addCourseTopic::where('course_id', $id)->get();
        $allcoupon = addCoupon::where('coupon_type', 'Academic')->where('status', '1')->get();
        return view('topic', compact('id', 'topic', 'course', 'allcoupon'));
    }

    public function verifyPayment(Request $request)
    {
        $token = $request->token;

        $args = http_build_query(array(
            'token' => $token,
            'amount' => 1200,
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $secret_key = 'test_secret_key_38547f2545a84858899929ae78b7d446';

        $headers = ["Authorization: Key live_secret_key_c000b0d7dd4944928ff322904bbc8c4d"];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $response;
    }

    public function storePayment(Request $request)
    {
        // $response = $request->response;
        // store the data to database here
        return response()->noContent();
    }

}

function generateRandomString($length = 6)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
