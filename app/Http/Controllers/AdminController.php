<?php

namespace App\Http\Controllers;

use App\Mail\sendemailbyadmin;
use App\Mail\sendrolecreditionals;
use App\Models\addAddressModel;
use App\Models\addBlogModel;
use App\Models\addCoupon;
use App\Models\addCourseChapter;
use App\Models\addCourseTopic;
use App\Models\addEmailTemplate;
use App\Models\addGlance;
use App\Models\addGroup;
use App\Models\addGroupMember;
use App\Models\addInstitution;
use App\Models\addInvoice;
use App\Models\addLead;
use App\Models\addPackage;
use App\Models\addRole;
use App\Models\addSampleDocument;
use App\Models\addShortCourse;
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
use App\Models\AdminModel;
use App\Models\AgentModel;
use App\Models\emailModel;
use App\Models\EmailSubcription;
use App\Models\email_package;
use App\Models\FaqModel;
use App\Models\InstitutionModel;
use App\Models\smsModel;
use App\Models\smsPackage;
use App\Models\SmsSubcription;
use App\Models\StorageSubcription;
use App\Models\studentCourse;
use App\Models\studentLanguageModel;
use App\Models\StudentModel;
use App\Models\universityCoursePayment;
use App\Models\workflow;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mail;
use PDF;

class AdminController extends Controller
{

    //login page
    public function login()
    {
        return view('admin/login');
    }
    public function register()
    {
        return view('admin/register');
    }


    public function adminprofile()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $adminprofile = AdminModel::all();
            Session::put('adminimage', $adminprofile[0]->admin_image);
            return view('admin/adminProfile', compact('adminprofile'));
        }
    }

    public function getStorageSubscription()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $transcation = StorageSubcription::where('agent_id', '!=', '0')->where('type', 'agent')->get();
            return view('admin.storageTranscation', compact('transcation'));

        }
    }
    
    public function postAdminRegister(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
           
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ]);

     
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

       
        $admin = new AdminModel();
        $admin->admin_name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

    
        Session::put('role', 'admin');
        Session::put('adminlogin', 'loginsuccess');
        Session::put('adminimage', $admin->admin_image);

     
        return redirect()->route('admin/dashboard');
    }
    public function logincheck(Request $request)
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
        $user = AdminModel::where('email', $fields['email'])->first();

        if ($user) {
            if (!$user || Hash::check($fields['password'], $user->password)) {
                Session::put('role', 'admin');
                Session::put('adminlogin', 'loginsuccess');
                Session::put('adminimage', $user->admin_image);
                return redirect()->route('admin/dashboard');
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
                    Session::put('role', 'other');
                    Session::put('roleidd', $otherrole->id);
                    Session::put('rolefeature', $str2);
                    Session::put('adminlogin', 'loginsuccess');

                    return redirect()->route('admin/dashboard');
                } else {

                    return back()->with('fail', 'Invalid credentitals!');

                }
            } else {

                return back()->with('fail', 'Invalid credentitals!');

            }
        }

    }
    ///return view homepage
    public function index()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $student = StudentModel::all();
            $agent = AgentModel::all();
            $institution = InstitutionModel::all();

            return view('admin.index', compact('student', 'agent', 'institution'));
        }
    }

    public function studenttable()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $student = StudentModel::orderBy('id', 'desc')->get();
            return view('admin.studentmanage', compact('student'));
        }
    }

    public function addStudent()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            return view('admin/addStudent');
        }
    }
    public function agenttable()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $agent = AgentModel::orderBy('id', 'desc')->get();
            return view('admin.agentmanage', compact('agent'));
        }
    }

    public function addAgent()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            
            return view('admin/addAgent');
        }
    }

    public function institutiontable()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $institution = InstitutionModel::orderBy('id', 'desc')->get();
            return view('admin.institutionmanage', compact('institution'));
        }
    }

    ///student delete //
    public function studentdelete($id)
    {
        $product = StudentModel::find($id);
        $product->delete();
        return back()->with('deletestudent', 'Student delete successfully');
    }

    public function addInstitution()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            return view('admin/addInstitution');
        }
    }

    //update status
    public function updateStudentStatus(Request $request)
    {

        $product = StudentModel::find($request->product_id);
        $product->status = $request->status;
        $product->save();
        $product = StudentModel::find($request->product_id);
        if ($product->status == 0) {
            return response()->json(['success' => 'Deactive Student successfully.']);
        } else {
            return response()->json(['success' => 'Active Student successfully.']);

        }
    }

    public function updateShortCourseStatus(Request $request)
    {

        $product = addShortCourse::find($request->product_id);
        $product->status = $request->status;
        $product->save();
        $product = addShortCourse::find($request->product_id);
        if ($product->status == 0) {
            return response()->json(['success' => 'Deactive Student successfully.']);
        } else {
            return response()->json(['success' => 'Active Student successfully.']);

        }
    }

    public function agentdelete($id)
    {
        $product = AgentModel::find($id);
        $product->delete();
        return back()->with('deleteagent', 'Agent delete successfully');
    }

    //update status
    public function updateAgentStatus(Request $request)
    {

        $agent = AgentModel::find($request->product_id);
        $agent->status = $request->status;
        $agent->save();
        if ($agent->status == 0) {
            return response()->json(['success' => 'Deactive Agent successfully.']);
        } else {
            $exitagent = SmsSubcription::where('agent_id', $request->product_id)->first();
            if (!$exitagent) {
                $user = SmsSubcription::create(['agent_id' => $request->product_id, 'type' => 'agent', 'balance_sms' => '0', 'remaining_sms' => '0']);
            }

            $exit = EmailSubcription::where('agent_id', $request->product_id)->first();
            if (!$exit) {
                $user = EmailSubcription::create(['agent_id' => $request->product_id, 'type' => 'agent', 'balance_email' => '0', 'remaining_email' => '0']);
            }
            return response()->json(['success' => 'Active Agent successfully.']);

        }
    }

    public function institutiondelete($id)
    {
        $product = InstitutionModel::find($id);
        $product->delete();
        return back()->with('deletestudent', 'Insitution Deleted Successfully');
    }

    //update status
    public function updateInstitutionStatus(Request $request)
    {

        $agent = InstitutionModel::find($request->product_id);
        $agent->status = $request->status;
        $agent->save();
        if ($agent->status == 0) {
            return response()->json(['success' => 'Deactive Institution successfully.']);
        } else {
            $exitagent = SmsSubcription::where('insitution_id', $request->product_id)->first();
            if (!$exitagent) {
                $user = SmsSubcription::create(['insitution_id' => $request->product_id, 'type' => 'insitution', 'balance_sms' => '0', 'remaining_sms' => '0']);
            }
            $exit = EmailSubcription::where('insitution_id', $request->product_id)->first();
            if (!$exit) {
                $user = EmailSubcription::create(['insitution_id' => $request->product_id, 'type' => 'insitution', 'balance_email' => '0', 'remaining_email' => '0']);
            }
            return response()->json(['success' => 'Active Institution successfully.']);

        }
    }

    public function studentDetail($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {

            $studentDetail = StudentModel::find($id);
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

            return view('admin/studentDetail', compact('studentDetail', 'student', 'address', 'language', 'contact', 'countries', 'academics', 'passportimage', 'marksheet', 'other', 'recommendation', 'financial'));
        }
    }

    public function agentDetail($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $agentDetail = AgentModel::find($id);
            return view('admin/agentDetail', compact('agentDetail'));
        }
    }

    public function logout()
    {

        Session::flush();
        return redirect()->route('admin');
    }

    public function applicationlist()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $application = StudentModel::where('agent_id', '0')->where('student_status', '0')->get();
            $staff = AgentModel::all();
            return view('admin.applicationList', compact('application', 'staff'));
        }
    }

    public function assignapplicationlist()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $application = StudentModel::where('agent_id', '!=', '0')->where('student_status', '1')->get();
            $staff = AgentModel::all();
            return view('admin.assignapplicationList', compact('application', 'staff'));
        }
    }

    public function pendingapplication()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $application = StudentModel::where('agent_id', '!=', '0')->where('institution_id', '!=', '0')->where('student_status', '2')->get();
            return view('admin.pendingApplicationList', compact('application'));
        }
    }

    public function completeapplication()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $application = StudentModel::where('agent_id', '!=', '0')->where('student_status', '4')->get();
            return view('admin.completeApplicationList', compact('application'));
        }
    }

    public function sendToInsitution($id)
    {
        $user = StudentModel::find($id);
        $user->student_status = '3';
        $user->save();
        return redirect()->back()->with('deletestudent', 'Send to insitution successfully');
    }

    public function recheckapplicationStatus($id)
    {
        $application = StudentModel::where('id', $id)->first();
        $application->student_status = '1';
        if ($application->save()) {

            return redirect()->back()->with('deletestudent', 'Send to agent rechecking successfully');
        } else {
            return redirect()->back();
        }
    }

    public function assignstaff(Request $request)
    {

        $assignlead = StudentModel::where('id', $request->assign_id)->first();
        $assignlead->agent_id = $request->agent;
        $assignlead->student_status = '1';
        if ($assignlead->save()) {
            return redirect()->back()->with('deletestudent', 'Assign to agent successfully');
        } else {
            return redirect()->route('admin/application-list');
        }
    }

    public function manageblog()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $blog = addBlogModel::all();
            return view('admin/blogmanage', compact('blog'));
        }
    }

    public function addblog()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            return view('admin/addBlog');
        }
    }

    public function addblogs(Request $request)
    {

        {
            try {
    
                $request->validate([
                    'title' => ['required', 'string', 'max:50', 'min:5'],
                    'description' => ['required', 'string'],
                    'sub_title' => ['required', 'string','max:300','min:10'],
                    'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
                ]);
    
                $blog = new Blog();
                $blog->blog_title = $request->title;
                $blog->sub_title = $request->sub_title;
                $blog->description = $request->description;
                if ($request->hasFile('thumbnail')) {
                    $thumbnail = $request->file('thumbnail');
                    $img_name = hexdec(uniqid()) . '.' . $thumbnail->getClientOriginalExtension();
                    $thumbnail->move('uploads/blog/thumbnail/', $img_name);
                    $save_url = '/uploads/blog/thumbnail/' . $img_name;
                   
                    $blog->thumbnail = $save_url;
                }
                $blog->save();
                return redirect('/admin-listblogs')->with('message', 'Your data has been saved successfully');
            } catch (ValidationException $e) {
                $errors = $e->validator->errors();
                return redirect()->back()->withErrors($errors)->withInput();
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }
    

        $blog_image = '';

        if (!empty($request->blog_image)) {
            $files = $request->file('blog_image');
            $extensions = $files->getClientOriginalExtension();
            $filenames = time() . rand(1, 99) . '.' . $extensions;
            $files->move(public_path('BlogImage/'), $filenames);

            $blog_image = $filenames;

        }

        $validate = Validator::make($request->all(), [
            'blog_heading' => 'required',
            'blog_description' => 'required',
        ], [
            'blog_heading.required' => 'blog heading is must required.',
            'blog_description.required' => 'blog description is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $blog_heading = $request->blog_heading;
        $blog_description = $request->blog_description;
        $blog_images = $blog_image;

        $user = addBlogModel::create(['blog_heading' => $blog_heading, 'blog_description' => $blog_description, 'blog_image' => $blog_image]);

        if ($user) {

            return redirect()->route('admin/manage-blog');
        } else {

            return redirect()->route('admin/add-blog');
        }
    }

    public function editBlog($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('/admin');
        } else {
            $blogDetail = addBlogModel::find($id);
            return view('admin/editBlog', compact('blogDetail'));
        }
    }

    public function updateBlog(Request $request, $id)
    {

        $blog_image = '';

        if (!empty($request->blog_image)) {
            $files = $request->file('blog_image');
            $extensions = $files->getClientOriginalExtension();
            $filenames = time() . rand(1, 99) . '.' . $extensions;
            $files->move(public_path('BlogImage/'), $filenames);

            $blog_image = $filenames;

        }

        $validate = Validator::make($request->all(), [
            'blog_heading' => 'required',
            'blog_description' => 'required',
        ], [
            'blog_heading.required' => 'blog heading is must required.',
            'blog_description.required' => 'blog description is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if ($request->blog_image) {
            $blog = addBlogModel::where('id', $id)->first();
            $blog->blog_heading = $request->blog_heading;
            $blog->blog_description = $request->blog_description;
            $blog->blog_image = $blog_image;
            if ($blog->save()) {
                return redirect()->route('admin/manage-blog');
            } else {
                return redirect()->route('admin/manage-blog');
            }
        } else {
            $blog = addBlogModel::where('id', $id)->first();
            $blog->blog_heading = $request->blog_heading;
            $blog->blog_description = $request->blog_description;
            if ($blog->save()) {
                return redirect()->route('admin/manage-blog');
            } else {
                return redirect()->route('admin/manage-blog');
            }
        }
    }

    public function blogDelete($id)
    {

        $blog = addBlogModel::find($id);
        $blog->delete();
        return back()->with('blog', 'Blog Deleted Successfully');
    }

    public function viewBlog($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $blogDetail = addBlogModel::find($id);
            return view('admin/viewBlog', compact('blogDetail'));
        }

         

        
    }

    public function studentEdit($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            Session::put('student_id', $id);
            $statuss = Session::get('status');
            if ($statuss == '') {
                Session::put('status', 'personal');
            }
            $studentDetail = StudentModel::find($id);
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
            return view('admin/editStudent', compact('studentDetail', 'student', 'address', 'language', 'contact', 'countries', 'academics', 'passportimage', 'marksheet', 'other', 'recommendation', 'financial'));
        }

    }

    public function studentUpdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ], [
            'first_name.required' => 'first name heading is must required.',
            'last_name.required' => 'last name is must required.',
            'email.required' => 'email is must required.',
            'phone.required' => 'phone is must required.',
            'gender.required' => 'gender is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if ($request->student_img) {
            $imagee = '';
            if (!empty($request->student_img)) {
                $files = $request->file('student_img');
                $extensions = $files->getClientOriginalExtension();
                $filenames = time() . rand(1, 99) . '.' . $extensions;
                $files->move(public_path('StudentImage/'), $filenames);
                $imagee = $filenames;
            }
            $student = StudentModel::find($id);
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->gender = $request->gender;
            $student->student_img = $imagee;
            if ($student->save()) {
                return redirect()->route('admin/manage-student');
            } else {
                return redirect()->route('admin/manage-student');
            }
        } else {
            $student = StudentModel::find($id);
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->gender = $request->gender;

            if ($student->save()) {
                return redirect()->route('admin/manage-student');
            } else {
                return redirect()->route('admin/manage-student');
            }

        }
    }

    public function agentEdit($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $agentDetail = AgentModel::find($id);
            return view('admin/editAgent', compact('agentDetail'));
        }
    }

    public function agentUpdate(Request $request, $id)
    {

        $validate = Validator::make($request->all(), [
            'company_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
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

            $agent_profile = AgentModel::where('id', $id)->first();
            $agent_profile->company_name = $request->company_name;
            $agent_profile->first_name = $request->first_name;
            $agent_profile->last_name = $request->last_name;
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

            if ($agent_profile->save()) {
                return redirect()->route('admin/manage-agent')->with('updateagent', 'Agent Updated successfully');
            } else {
                return redirect()->route('admin/manage-agent');
            }

        } else {

            $agent_profile = AgentModel::where('id', $id)->first();
            $agent_profile->company_name = $request->company_name;
            $agent_profile->first_name = $request->first_name;
            $agent_profile->last_name = $request->last_name;
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
            if ($agent_profile->save()) {
                return redirect()->route('admin/manage-agent')->with('updateagent', 'Agent Updated successfully');
            } else {
                return redirect()->route('admin/manage-agent');
            }

        }

    }

    public function institutionupdate(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'insitution_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ], [
            'insitution_name.required' => 'insitution name heading is must required.',
            'first_name.required' => 'first name heading is must required.',
            'last_name.required' => 'last name is must required.',
            'email.required' => 'email is must required.',
            'phone.required' => 'phone is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $institution = InstitutionModel::find($id);
        $institution->institution_name = $request->insitution_name;
        $institution->first_name = $request->first_name;
        $institution->last_name = $request->last_name;
        $institution->email = $request->email;
        $institution->phone = $request->phone;

        if ($institution->save()) {
            return redirect()->route('admin/manage-institution')->with('updateagent', 'Institution Updated successfully');
        } else {
            return redirect()->route('admin/manage-institution');
        }
    }

    public function adminprofileupdate(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'admin_img' => 'required',

        ], [
            'insitution_name.required' => 'insitution name heading is must required.',
            'first_name.required' => 'first name heading is must required.',
            'last_name.required' => 'last name is must required.',
            'email.required' => 'email is must required.',
            'phone.required' => 'phone is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if ($request->admin_img) {

            $imagee = '';
            if (!empty($request->admin_img)) {
                $files = $request->file('admin_img');
                $extensions = $files->getClientOriginalExtension();
                $filenames = time() . rand(1, 99) . '.' . $extensions;
                $files->move(public_path('AdminImage/'), $filenames);

                $imagee = $filenames;

            }

            $id = $request->id;
            $adminprofile = AdminModel::find($id);
            $adminprofile->admin_name = $request->name;
            $adminprofile->email = $request->email;
            $adminprofile->admin_phone = $request->phone;
            $adminprofile->admin_image = $imagee;
            Session::forget('adminimage');
            Session::put('adminimage', $imagee);

            if ($adminprofile->save()) {
                return redirect()->route('admin/admin-profile')->with('updateadmin', 'Admin Updated successfully');
            } else {
                return redirect()->route('admin/admin-profile');
            }
        } else {

            $id = $request->id;
            $adminprofile = AdminModel::find($id);
            $adminprofile->admin_name = $request->admin_name;
            $adminprofile->email = $request->email;
            $adminprofile->admin_phone = $request->admin_phone;

            if ($adminprofile->save()) {
                return redirect()->route('admin/admin-profile')->with('updateadmin', 'Admin Updated successfully');
            } else {
                return redirect()->route('admin/admin-profile');
            }

        }
    }

    public function institutionEdit($id)
    {

        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            Session::forget('status');
            Session::put('status', 'personal');
            $info = InstitutionModel::where('id', $id)->first();
            $institution = addInstitution::where('institution_id', $id)->first();
            if ($institution != '') {

                $institution_detail_id = $institution->id;
                $glance = addGlance::where('institution_detail_id', $institution_detail_id)->get();
                $images = add_multiple_image::where('institution_detail_id', $institution_detail_id)->get();
                return view('admin/editInstitution', compact('institution', 'info', 'glance', 'images', 'id'));
            } else {

                return redirect()->route('admin/manage-institution')->with('deletestudent', 'Insitution profile not fully completed');
            }

        }
    }

    public function addFaq(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ], [
            'question.required' => 'Question is must required.',
            'answer.required' => 'Answer is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $question = $request->question;
        $answer = $request->answer;
        $type = $request->type;

        $faq = FaqModel::create(['question' => $question, 'answer' => $answer, 'type' => $type]);

        if ($request->type == 'student') {
            return redirect()->route('/admin/manage-student-faq')->with('updatefaq', 'FAQ Added successfully');
        } else if ($request->type == 'agent') {
            return redirect()->route('/admin/manage-agent-faq')->with('updatefaq', 'FAQ Added successfully');
        } else {
            return redirect()->route('/admin/manage-institution-faq')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function managestudentfaq()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $faq = FaqModel::where('type', 'student')->get();
            return view('admin/faqmanage', compact('faq'));
        }
    }

    public function manageAgentfaq()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $faq = FaqModel::where('type', 'agent')->get();
            return view('admin/FaqAgentManage', compact('faq'));
        }
    }

    public function manageInstutionfaq()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $faq = FaqModel::where('type', 'insitution')->get();
            return view('admin/FaqInstitutionManage', compact('faq'));
        }
    }

    public function addStudentFaq()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            return view('admin/addStudentFaq');
        }
    }

    public function addInsitutionFaq()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            return view('admin/addInstutionFaq');
        }
    }

    public function addAgentFaq()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            return view('admin/addAgentFaq');
        }
    }

    
    

    public function deleteAgentFaq($id)
    {
        $faq = FaqModel::find($id);
        $faq->delete();
        return back()->with('deletefaq', 'FAQ delete successfully');
    }
    public function deleteStudentFaq($id)
    {
        $faq = FaqModel::find($id);
        $faq->delete();
        return back()->with('deletefaq', 'FAQ delete successfully');
    }

    public function deleteInsitutionFaq($id)
    {
        $faq = FaqModel::find($id);
        $faq->delete();
        return back()->with('deletefaq', 'FAQ delete successfully');
    }

    public function editStudentFaq($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $faq = FaqModel::find($id);
            return view('admin/editStudentFaq', compact('faq'));
        }

    }

    public function editAgentFaq($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $faq = FaqModel::find($id);
            return view('admin/editAgentFaq', compact('faq'));
        }

    }

    public function editInsitutionFaq($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $faq = FaqModel::find($id);
            return view('admin/editInsitutionFaq', compact('faq'));
        }

    }

    public function updateStudentFaq($id, Request $request)
    {

        $validate = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ], [
            'question.required' => 'Question is must required.',
            'answer.required' => 'Answer is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $faq = FaqModel::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        if ($faq->save()) {
            return redirect()->route('/admin/manage-student-faq')->with('updatefaq', 'FAQ Updated successfully');
        } else {
            return redirect()->route('admin/faqmanage')->with('updatefaq', 'FAQ Updated successfully');
        }
    }

    public function updateAgentFaq($id, Request $request)
    {

        $validate = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ], [
            'question.required' => 'Question is must required.',
            'answer.required' => 'Answer is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $faq = FaqModel::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        if ($faq->save()) {
            return redirect()->route('/admin/manage-agent-faq')->with('updatefaq', 'FAQ Updated successfully');
        } else {
            return redirect()->route('/admin/manage-agent-faq')->with('updatefaq', 'FAQ Updated successfully');
        }
    }

    public function updateInsitutionFaq($id, Request $request)
    {

        $validate = Validator::make($request->all(), [
            'question' => 'required',
            'answer' => 'required',
        ], [
            'question.required' => 'Question is must required.',
            'answer.required' => 'Answer is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $faq = FaqModel::find($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        if ($faq->save()) {
            return redirect()->route('/admin/manage-institution-faq')->with('updatefaq', 'FAQ Updated successfully');
        } else {
            return redirect()->route('/admin/manage-institution-faq')->with('updatefaq', 'FAQ Updated successfully');
        }
    }

    public function smsList()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $smspackage = smsPackage::all();
            return view('admin/smsList', compact('smspackage'));
        }

    }

    public function editSmsPackage(Request $request)
    {
        $id = $request->id;
        $emp = smsPackage::find($id);
        return response()->json($emp);
    }

    public function sendSms()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {

            $smsprofile = smsModel::where('type', 'admin')->orderBy('id', 'desc')->take(5)->get();
            $group = addSmsGroup::where('type', 'admin')->get();
            $template = addSmsTemplate::where('type', 'sms')->where('add_type', 'admin')->get();
            return view('admin/smsSend', compact('smsprofile', 'group', 'template'));
        }
    }

    public function rolePermission()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $allrole = addRole::where('type', 'admin')->get();
            return view('admin/rolePermission', compact('allrole'));
        }
    }

    public function managedocument()
    {if (Session::get('adminlogin') != 'loginsuccess') {
        return redirect()->route('admin');
    } else {
        return view('admin/manageDocument');
    }
    }

    public function managetask()
    {if (Session::get('adminlogin') != 'loginsuccess') {
        return redirect()->route('admin');
    } else {
        $task = addTask::where('type', 'admin')->get();
        $staff = addRole::where('type', 'admin')->get();
        return view('admin/manageTask', compact('task', 'staff'));
    }
    }

    public function completedtask()
    {if (Session::get('adminlogin') != 'loginsuccess') {
        return redirect()->route('admin');
    } else {
        $task = addTask::where('status', '2')->get();
        return view('admin/completeTask', compact('task'));
    }
    }

    public function canceltask()
    {if (Session::get('adminlogin') != 'loginsuccess') {
        return redirect()->route('admin');
    } else {
        $task = addTask::where('status', '1')->get();
        return view('admin/cancelTask', compact('task'));
    }
    }

    public function assignTask()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $id = Session::get('roleidd');
            $task = addTask::where('assign_id', $id)->where('status', '0')->get();
            return view('admin/assignTask', compact('task'));
        }
    }

    public function completetask($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
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

    public function managerole()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $editRole = '';
            $country = DB::table('country')->get();
            return view('admin/addRole', compact('editRole', 'country'));
        }
    }

    public function managepackage()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $package = addPackage::where('type', '1')->get();
            return view('admin/managePackage', compact('package'));
        }
    }

    public function addpackage()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $package = '';
            return view('admin/addPackage', compact('package'));
        }
    }

    public function insitutionDetail($id)
    {
        $info = InstitutionModel::where('id', $id)->first();
        $institution = addInstitution::where('institution_id', $id)->first();
        $institution_detail_id = $institution->id;
        // $allinstitution = addInstitution::all();
        $glance = addGlance::where('institution_detail_id', $institution_detail_id)->get();
        $images = add_multiple_image::where('institution_detail_id', $institution_detail_id)->get();
        return view('admin/insitutionDetail', compact('institution', 'info', 'glance', 'images'));
    }

    public function updateinstitutioninfo(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'universirty_name' => 'required',
            'location' => 'required',
            'univ_type' => 'required',
            'founded' => 'required',
            'international_student' => 'required',
            'type' => 'required',
        ], [
            'universirty_name.required' => 'Question is must required.',
            'location.required' => 'Answer is must required.',
            'univ_type.required' => 'Question is must required.',
            'founded.required' => 'Answer is must required.',
            'international_student.required' => 'Question is must required.',
            'type.required' => 'Answer is must required.',
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
            $institutionInfo->univ_type = $request->univ_type;
            $institutionInfo->founded = $request->founded;
            $institutionInfo->international_student = $request->international_student;
            $institutionInfo->type = $request->type;
            if ($institutionInfo->save()) {
                Session::forget('status');
                Session::put('status', 'about');
                return back();
            } else {
                return back();

            }
        } elseif ($request->thumbnail) {
            $institutionInfo = addInstitution::find($id);
            $institutionInfo->universirty_name = $request->universirty_name;
            // $institutionInfo->univ_img = $image;
            $institutionInfo->thumbnail = $thumbnail;
            $institutionInfo->location = $request->location;
            $institutionInfo->univ_type = $request->univ_type;
            $institutionInfo->founded = $request->founded;
            $institutionInfo->international_student = $request->international_student;
            $institutionInfo->type = $request->type;
            if ($institutionInfo->save()) {
                Session::forget('status');
                Session::put('status', 'about');
                return back();
            } else {
                return back();

            }

        } else {

            $institutionInfo = addInstitution::find($id);
            $institutionInfo->universirty_name = $request->universirty_name;

            $institutionInfo->location = $request->location;
            $institutionInfo->univ_type = $request->univ_type;
            $institutionInfo->founded = $request->founded;
            $institutionInfo->international_student = $request->international_student;
            $institutionInfo->type = $request->type;
            if ($institutionInfo->save()) {
                Session::forget('status');
                Session::put('status', 'about');

                return back();
            } else {
                return back();
            }
        }
    }

    public function updateaboutInfo(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'aboutheading' => 'required',
            'aboutparagraph' => 'required',
        ], [
            'aboutheading.required' => 'Question is must required.',
            'aboutparagraph.required' => 'Answer is must required.',
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
            return back();
        } else {
            return back();

        }
    }

    public function updateGlance(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'moreFields' => 'required',

        ], [
            'moreFields.required' => 'Question is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $institution_id = $request->id;
        $institution_detail_ids = addInstitution::where('institution_id', $request->id)->first();
        $institution_detail_id = $institution_detail_ids->id;

        $exit = addGlance::where('institution_detail_id', $institution_detail_id)->get();
        if ($exit) {
            $institution_id = $request->id;
            $institution_detail_ids = addInstitution::where('institution_id', $request->id)->first();
            $institution_detail_id = $institution_detail_ids->id;
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

            $institution_id = $request->id;
            $institution_detail_ids = addInstitution::where('institution_id', $request->id)->first();
            $institution_detail_id = $institution_detail_ids->id;

            foreach ($request->moreFields as $key => $value) {
                if (!$value) {
                    return back()->with('fail', 'All Glance field must required');
                }
                $institution_id = $request->id;
                $institution_detail_ids = addInstitution::where('institution_id', $request->id)->first();
                $institution_detail_id = $institution_detail_ids->id;

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

    public function updatevideo(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'univ_video' => 'required',

        ], [
            'univ_video.required' => 'Question is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $id = $request->id;
        $video = addInstitution::find($id);
        $video->video = $request->univ_video;
        if ($video->save()) {
            Session::forget('status');
            Session::put('status', 'gallery');
            return back();
        } else {
            return back();
        }
    }

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

                return back();
            }
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

                return back();
            } else {
                return back();

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

                return back();
            } else {
                return back();

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
            return back();

        } else {
            return back();
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
            return back();
        } else {
            return back();
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
            return back();

        } else {
            return back();
        }
    }

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
            return back();
        } else {
            return back();
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
            return back();

        } else {
            return back();
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
            return back();
        } else {
            return back();
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

            return back();
        } else {
            return back();
        }
    }

    public function uploadmultipleimagess(Request $request)
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

        return back();

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
        $id = $request->id;
        $sign = StudentModel::where('id', $id)->first();
        $sign->signature_status = $request->consent_signature;

        if ($sign->save()) {
            Session::forget('status');
            Session::put('status', 'personal');

            return back();
        } else {
            return back();
        }
    }

    public function addpackageFeatures(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'features' => 'required',
        ], [
            'features.required' => 'Please verify.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        if ($request->id) {
            $package = addPackage::where('id', $request->id)->delete();
            $packages = addPackage::where('package_id', $request->id)->delete();

            $package_name = $request->package_name;
            $package_title = $request->package_title;
            $package_subtitle = $request->package_subtitle;
            $package_monthly = $request->package_monthly;
            $package_yearly = $request->package_yearly;
            $package_feature = $request->package_feature;
            $type = $request->type;

            $packageid = addPackage::create(['package_name' => $package_name, 'package_title' => $package_title, 'package_subtitle' => $package_subtitle, 'package_monthly' => $package_monthly, 'package_yearly' => $package_yearly]);
            if ($packageid) {
                $package_id = $packageid->id;
                foreach ($request->features as $features) {
                    $addpackage = addPackage::create(['package_name' => $package_name, 'package_id' => $package_id, 'package_title' => $package_title, 'package_subtitle' => $package_subtitle, 'package_monthly' => $package_monthly, 'package_yearly' => $package_yearly, 'package_feature' => $features, 'type' => '2']);
                }

                return redirect()->route('admin/manage-package');

            } else {
                return redirect()->route('admin/manage-package');

            }
        } else {

            $package_name = $request->package_name;
            $package_title = $request->package_title;
            $package_subtitle = $request->package_subtitle;
            $package_monthly = $request->package_monthly;
            $package_yearly = $request->package_yearly;
            $package_feature = $request->package_feature;
            $type = $request->type;

            $packageid = addPackage::create(['package_name' => $package_name, 'package_title' => $package_title, 'package_subtitle' => $package_subtitle, 'package_monthly' => $package_monthly, 'package_yearly' => $package_yearly]);
            if ($packageid) {
                $package_id = $packageid->id;
                foreach ($request->features as $features) {

                    $addpackage = addPackage::create(['package_name' => $package_name, 'package_id' => $package_id, 'package_title' => $package_title, 'package_subtitle' => $package_subtitle, 'package_monthly' => $package_monthly, 'package_yearly' => $package_yearly, 'package_feature' => $features, 'type' => '2']);
                }

                return redirect()->route('admin/manage-package');

            } else {
                return redirect()->route('admin/manage-package');

            }
        }

    }

    public function packagedelete($id)
    {

        $package = addPackage::where('id', $id)->delete();
        $packages = addPackage::where('package_id', $id)->delete();
        return back();
    }

    public function packageedit($id)
    {

        $package = addPackage::where('id', $id)->where('type', '1')->first();

        return view('admin/addPackage', compact('package', 'id'));
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

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $userexit = addRole::where('email', $request->email)->first();
        if ($userexit) {
            return back()->with('emailexit', 'Email Already Exit');
        }

        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $type = 'admin';
        $role_type = '1';
        $country = $request->country;
        $json = json_encode($request->rolefeatures);

        $createrole = addRole::create(['name' => $name, 'country' => $country, 'email' => $email, 'phone' => $phone, 'role' => $role, 'type' => $type, 'password' => Hash::make($password), 'rolefeatures' => $json]);

        if ($createrole) {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ];

            Mail::to($request->email)->send(new sendrolecreditionals($details));
            return redirect()->route('admin/role-permission');
        } else {
            return back();
        }
    }

    public function roledelete($id)
    {

        $roles = addRole::where('id', $id)->delete();

        return back();
    }

    public function discount()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            return view('admin/discount');
        }
    }

    public function editRole($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $editRole = addRole::where('id', $id)->first();
            $country = DB::table('country')->get();

            return view('admin/addRole', compact('editRole', 'country'));
        }
    }

    public function updateroleFeatures(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',

            'role' => 'required',

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
        $roleFeat->country = $request->country;

        $roleFeat->role = $request->role;
        $type = 'admin';
        $json = json_encode($request->rolefeatures);
        $roleFeat->rolefeatures = $json;

        if ($roleFeat->save()) {
            return redirect()->route('admin/role-permission');

        } else {

            return back();
        }
    }

    public function manageCoupon()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $allcoupon = addCoupon::all();
            return view('admin/manageCoupon', compact('allcoupon'));
        }
    }

    public function addCoupon()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $editCoupon = '';
            return view('admin/addCoupon', compact('editCoupon'));
        }
    }

    public function updateCouponStatus(Request $request)
    {

        $coupon = addCoupon::find($request->product_id);
        $coupon->status = $request->status;
        $coupon->save();
        $coupon = coupon::find($request->product_id);
        if ($coupon->status == 0) {
            return response()->json(['success' => 'Deactive Student successfully.']);
        } else {
            return response()->json(['success' => 'Active Student successfully.']);

        }
    }

    public function coupondelete($id)
    {

        $roles = addCoupon::where('id', $id)->delete();

        return back()->with('deletecoupon', 'Coupon delete successfully');
    }

    public function addCouponDetail(Request $request)
    {

        //  $validate = Validator::make($request->all(), [
        //   'coupon_name' => 'required',
        //   'coupon_duration' => 'required|min:10',
        //   'coupon_discount' => 'required',
        //   'amount' => 'required|min:8',
        //   'coupon_type' => 'required'
        // ],[
        //     'coupon_name.required' => 'Firstname is must required.',
        //     'coupon_duration.required' => 'Lastname is must required.',
        //     'coupon_discount.required' => 'Phone is must required.',
        //     'amount.required' => 'Email is must required.',
        //     'coupon_type.required' => 'Password is must required.',
        // ]);

        // if($validate->fails()){
        // return back()->withErrors($validate->errors())->withInput();
        // }

        $startdate = '';
        $enddate = '';
        if ($request->coupon_duration == 'all_time_free') {
            $startdate = '0';
            $enddate = '0';
        } else {
            $startdate = $request->start_date;
            $enddate = $request->end_date;
        }

        $codes = generateRandomString(6);
        $code = strtoupper($codes);

        $coupon = addCoupon::create(['coupon_name' => $request->coupon_name, 'coupon_code' => $code, 'coupon_discount_type' => $request->coupon_discount, 'coupon_amount' => $request->amount, 'coupon_duration' => $request->coupon_duration, 'coupon_type' => $request->coupon_type, 'start_date' => $startdate, 'end_date' => $enddate]);

        if ($coupon) {
            return redirect()->route('admin/manage-coupon');
        } else {
            return redirect()->route('admin/manage-coupon');
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
            'staff.required' => 'staff is must required.',
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
        $type = 'admin';
        $cancelMessage = '';

        $task = addTask::create(['task_name' => $task_title, 'type' => $type, 'priority' => $request->priority, 'cancelMessage' => $cancelMessage, 'assign_id' => $staff, 'start_date' => $start_date, 'end_date' => $end_date, 'task_description' => $comment]);
        if ($task) {
            return redirect()->route('admin/task-manage')->with('delete', 'Task Added successfully');
        } else {
            return redirect()->route('admin/task-manage')->with('updatefaq', 'FAQ Added successfully');
        }

    }

    public function taskdelete($id)
    {
        $task = addTask::find($id);
        $task->delete();
        return back()->with('delete', 'Task delete successfully');
    }

    public function editCoupon($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $editCoupon = addCoupon::where('id', $id)->first();
            return view('admin/addCoupon', compact('editCoupon'));
        }
    }

    public function updateCoupon(Request $request)
    {

        $startdate = '';
        $enddate = '';
        if ($request->coupon_duration == 'all_time_free') {
            $startdate = '0';
            $enddate = '0';
        } else {
            $startdate = $request->start_date;
            $enddate = $request->end_date;
        }

        $coupon = addCoupon::where('id', $request->id)->first();
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_discount_type = $request->coupon_discount;
        $coupon->coupon_amount = $request->amount;
        $coupon->coupon_duration = $request->coupon_duration;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->start_date = $startdate;
        $coupon->end_date = $enddate;
        if ($coupon->save()) {
            return redirect()->route('admin/manage-coupon')->with('deletecoupon', 'Edit Coupon successfully');
        } else {
            return back();
        }

    }

    public function deletepassport($id)
    {
        $passport = addStudentPassport::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('delete', 'Image delete successfully');

    }

    public function deleteother($id)
    {
        $passport = addStudentOther::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('delete', 'Image delete successfully');

    }

    public function deleterecommand($id)
    {
        $passport = addStudentRecommand::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('delete', 'Image delete successfully');

    }

    public function deletefinanical($id)
    {
        $passport = addStudentFinancial::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('delete', 'Image delete successfully');

    }

    public function deletemarksheet($id)
    {
        $passport = addStudentMarksheet::where('id', $id)->delete();
        Session::put('status', 'document');
        return back()->with('delete', 'Image delete successfully');

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
            'location' => 'required',

        ], [
            'first_name.required' => 'Contact name is must required.',
            'email.required' => 'Relationship  is must required.',
            'phone.required' => 'Contact phone  is must required.',
            'last_name.required' => 'Contact email is must required.',
            'comment.required' => 'Contact email is must required.',
            'source.required' => 'Contact email is must required.',
            'location.required' => 'Contact email is must required.',

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
        $location = $request->location;

        $type = 'admin';
        $lead_assign_id = $request->agent;

        $lead = addLead::create(['first_name' => $first_name, 'email' => $email, 'phone' => $phone, 'last_name' => $last_name, 'location' => $location, 'source' => $source, 'comment' => $comment, 'type' => $type, 'lead_assign_id' => $lead_assign_id]);
        if ($lead) {
            return redirect()->route('/admin/lead-manage');
        } else {
            return back();
        }
    }

    public function editLead($id)
    {
        $leads = addLead::where('id', $id)->where('type', 'admin')->first();
        $staff = AgentModel::all();
        return view('admin/editLead', compact('leads', 'staff'));
    }

    public function updateLead(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'first_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'last_name' => 'required',
            'source' => 'required',
            'comment' => 'required',
            'location' => 'required',

        ], [
            'first_name.required' => 'Contact name is must required.',
            'email.required' => 'Relationship  is must required.',
            'phone.required' => 'Contact phone  is must required.',
            'last_name.required' => 'Contact email is must required.',
            'comment.required' => 'Contact email is must required.',
            'source.required' => 'Contact email is must required.',
            'location.required' => 'Contact email is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $leads = addLead::where('id', $request->id)->where('type', 'admin')->first();

        $leads->first_name = $request->first_name;
        $leads->last_name = $request->last_name;
        $leads->email = $request->email;
        $leads->phone = $request->phone;
        $leads->source = $request->source;
        $leads->comment = $request->comment;
        $leads->location = $request->location;
        $leads->type = 'admin';
        $leads->lead_assign_id = $request->agent;
        if ($leads->save()) {
            return redirect()->route('/admin/lead-manage');
        } else {
            return back();
        }
    }

    public function leadmanage()
    {
        $leads = addLead::where('status', '0')->where('type', 'admin')->get();
        $staff = AgentModel::all();
        return view('admin/manageLead', compact('leads', 'staff'));
    }

    public function completeleadmanage()
    {
        $leads = addLead::where('status', '1')->where('type', 'admin')->get();

        return view('admin/completemanageLead', compact('leads'));
    }

    public function support()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $support = addSupport::where('status', '0')->get();

            $staff = addRole::where('type', 'admin')->get();

            return view('admin/manageSupport', compact('support', 'staff'));
        }
    }

    public function supporttype($value)
    {
        if ($value == 'insitution') {
            $support = addSupport::where('type', 'institution')->where('status', '0')->get();

            $staff = addRole::where('type', 'admin')->get();
            Session::forget('typee');
            Session::put('typee', 'insitution');
            return view('admin/manageSupport', compact('support', 'staff'));
        } else {
            $support = addSupport::where('type', 'agent')->where('status', '0')->get();
            Session::forget('typee');
            Session::put('typee', 'agent');
            $staff = addRole::where('type', 'admin')->get();
            return view('admin/manageSupport', compact('support', 'staff'));
        }
    }
    public function completesupporttype($value)
    {
        if ($value == 'insitution') {
            $support = addSupport::where('type', 'institution')->where('status', '!=', '0')->get();
            Session::forget('typee');
            Session::put('typee', 'insitution');
            return view('admin/supportComplete', compact('support'));
        } else {
            $support = addSupport::where('type', 'agent')->where('status', '!=', '0')->get();
            Session::forget('typee');
            Session::put('typee', 'agent');

            return view('admin/supportComplete', compact('support'));
        }
    }

    public function supportcomplete()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            Session::forget('typee');
            $support = addSupport::where('status', '!=', '0')->get();
            return view('admin/supportComplete', compact('support'));
        }
    }

    public function leaddelete($id)
    {
        $lead = addLead::find($id);
        $lead->delete();
        return back()->with('delete', 'Lead delete successfully');
    }

    public function changeStatus(Request $request)
    {
        $user = addSupport::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function cancelChangeStatus(Request $request)
    {
        $task = addTask::find($request->user_id);
        $task->status = '1';
        $task->cancelMessage = $request->status;
        $task->save();

        return response()->json(['success' => 'Cancel task successfully.']);
    }

    public function leadchangeStatus(Request $request)
    {
        $user = addLead::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    public function assignticket(Request $request)
    {
        $user = addSupport::find($request->support_id);
        $user->assign_to = $request->agent_id;
        $user->save();

        return response()->json(['success' => 'Ticket assign successfully.']);
    }

    public function assignlead(Request $request)
    {
        $user = addLead::find($request->support_id);
        $user->lead_assign_id = $request->agent_id;
        $user->save();

        return response()->json(['success' => 'Lead assign successfully.']);
    }

    public function studentreport()
    {

        $student = StudentModel::all();
        return view('admin/studentReport', compact('student'));
    }

    public function agentreport()
    {

        $agent = AgentModel::all();
        return view('admin/agentReport', compact('agent'));
    }

    public function sendEmail()
    {
        $emailprofile = emailModel::where('type', 'admin')->orderBy('id', 'desc')->take(5)->get();
        $group = addGroup::where('type', 'admin')->get();
        return view('admin/sendEmailGroup', compact('group', 'emailprofile'));
    }

    public function sendSingleEmail(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'senderEmail' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',

        ], [
            'senderEmail.required' => 'Sender Email  is must required.',
            'email.required' => 'Email  is must required.',
            'subject.required' => 'Subject  is must required.',
            'message.required' => 'Message is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $senderEmail = $request->senderEmail;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;
        $type = 'admin';
        $name = ' ';
        $details = [

            'subject' => $subject,
            'email' => $request->email,
            'message' => $message,
        ];

        Mail::to($request->email)->send(new sendemailbyadmin($details));
        $email = emailModel::create(['sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type, 'member_type' => $request->membertype]);
        if ($email) {
            return back()->with('message', 'Email send successfully');
        } else {
            return back();
        }

    }

    public function sendGroupEmail(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'senderEmail' => 'required',
            'group' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'member_type' => 'required',
        ], [
            'senderEmail.required' => 'Sender Email  is must required.',
            'group.required' => 'Email  is must required.',
            'subject.required' => 'Subject  is must required.',
            'message.required' => 'Message is must required.',
            'member_type.required' => 'Message is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $groupss = addGroupMember::where('group_id', $request->group)->get();

        foreach ($groupss as $value) {

            if ($value->type == "Agent") {
                $agent = AgentModel::find($value->member_id);

                $senderEmail = $request->senderEmail;
                $email = $agent->email;
                $subject = $request->subject;
                $message = $request->message;
                $type = 'admin';

                $details = [

                    'subject' => $subject,
                    'email' => $request->email,
                    'message' => $message,
                ];

                Mail::to($request->email)->send(new sendemailbyadmin($details));
                $email = emailModel::create(['sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type]);
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
                $email = emailModel::create(['sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type]);

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
                $email = emailModel::create(['sender' => $senderEmail, 'reciever' => $email, 'subject' => $subject, 'message' => $message, 'type' => $type]);

            }

        }

        return back()->with('message', 'Email send successfully');

    }

    public function getgroup()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $group = addGroup::all();
            return view('admin/getgroup', compact('group'));
        }
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
        $type = 'admin';
        $group = addGroup::create(['group_name' => $group_name, 'group_description' => $group_description, 'type' => $type]);
        if ($group) {
            return back()->with('message', 'Email send successfully');
        } else {
            return back();
        }
    }

    public function addGroupMember($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $email = addGroupMember::where('group_id', $id)->orderBy('id', 'desc')->take(5)->get();
            return view('admin/addGroupMember', compact('id', 'email'));
        }
    }

    public function getMember(Request $request)
    {
        if ($request->type == 'Agent') {
            $data['members'] = AgentModel::all();
        } elseif ($request->type == 'Insitution') {
            $data['members'] = InstitutionModel::all();
        } else {
            $data['members'] = StudentModel::all();
        }
        return response()->json($data);
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

    public function SmsSend(Request $request)
    {

        $message = strip_tags($request->message);

        $sms = $request->member;
        // $message = $request->message;
        $type = 'admin';

        if ($request->membertype == 'Agent') {
            $exit = AgentModel::where('phone', $request->member)->first();
            if ($exit->country == 'Australia') {
                $message = strip_tags($request->message);
                $text = $message;

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
                $message = strip_tags($request->message);
                $args = http_build_query(array(
                    'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                    'from' => 'Studify',
                    'to' => $request->member,
                    'text' => $message));

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
                $message = strip_tags($request->message);
                $text = $message;

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
                $senderphone = '';
                $message = strip_tags($request->message);
                $text = $message;
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
                $message = strip_tags($request->message);
                $text = $message;
                $senderphone = '';
                $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
                $fields = array(
                    'sms_text' => $text, //here goes your SMS text
                    'numbers' => $request->phone, // Your numbers array goes here
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
                $senderphone = '';
                $message = strip_tags($request->message);
                $text = $message;
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
        $sms = smsModel::create(['agent_id' => '0', 'sender' => 'studify', 'reciever' => $sms, 'message' => $message, 'type' => $type, 'member_type' => $request->membertype]);
        return back()->with('message', 'SMS Send successfully');
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
        $message = strip_tags($request->message);

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
                        'from' => 'Studify',
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
                $type = 'admin';

                $sms = smsModel::create(['sender' => 'studify', 'reciever' => $phone, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

            } elseif ($value->type == "Insitution") {

                $institution = InstitutionModel::find($value->member_id);
                if ($institution->country == 'Australia') {

                    $text = strip_tags($request->message);

                    $url = 'https://cellcast.com.au/api/v3/send-sms'; //API URL
                    $fields = array(
                        'sms_text' => $text, //here goes your SMS text
                        'numbers' => $institution->phone, // Your numbers array goes here
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
                    $message = strip_tags($request->message);
                    $text = $message;
                    $args = http_build_query(array(
                        'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                        'from' => 'Studify',
                        'to' => $institution->phone,
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
                $type = 'admin';

                $sms = smsModel::create(['sender' => 'studify', 'reciever' => $email, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

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

                } elseif ($agent->country == 'Nepal') {
                    $text = strip_tags($request->message);
                    $args = http_build_query(array(
                        'token' => 'v2_6rGUeAJvyBBvRoblqAjw76XlLXS.ZTyB',
                        'from' => 'Studify',
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
                $type = 'admin';

                $sms = smsModel::create(['sender' => 'studify', 'reciever' => $email, 'message' => $message, 'type' => $type, 'member_type' => $value->type]);

            }
        }
        return back()->with('message', 'Sms Send successfully');

    }

    public function getSmsGroup()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $smsgroup = addSmsGroup::where('type', 'admin')->get();
            return view('admin/getSmsGroup', compact('smsgroup'));
        }
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
        $type = 'admin';
        $group = addSmsGroup::create(['group_name' => $group_name, 'group_description' => $group_description, 'type' => $type]);
        if ($group) {
            return back()->with('message', 'Group added successfully');
        } else {
            return back();
        }
    }

    public function addSmsGroupMember($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $smsprofile = addSmsGroupMember::where('group_id', $id)->orderBy('id', 'desc')->take(5)->get();
            return view('admin/addSmsGroupMember', compact('id', 'smsprofile'));
        }
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

    public function getCourse()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $course = addShortCourse::all();

            return view('admin/getCourse', compact('course'));
        }
    }

    public function deleteCourse($id)
    {
        $course = addShortCourse::find($id);
        $course->delete();
        return back()->with('course', 'Course delete successfully');
    }

    public function editCourse(Request $request)
    {
        $id = $request->id;
        $emp = addShortCourse::find($id);
        return response()->json($emp);
    }

    public function updateCourse(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'course_name' => 'required',
            'course_subtitle' => 'required',
            'course_description' => 'required',
        ], [
            'course_name.required' => 'Group name is must required.',
            'course_subtitle.required' => 'Type  is must required.',
            'course_description.required' => 'Type  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $image = '';

        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('CourseImage/'), $filename);

            $image = $filename;
            $course = addShortCourse::find($request->courseid);
            $course->image = $image;
            $course->save();
        }

        $course = addShortCourse::find($request->courseid);
        $course->course_name = $request->course_name;
        $course->course_subtitle = $request->course_subtitle;
        $course->course_description = $request->course_description;
        $course->course_prize = $request->course_prize;
        $course->discount_prize = $request->discount_prize;

        if ($course->save()) {
            return back()->with('course', 'Course Updated successfully');
        } else {
            return back();
        }
    }

    public function addCourse(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'course_name' => 'required',
            'image' => 'required',
            'course_subtitle' => 'required',
            'course_description' => 'required',
            'course_prize' => 'required',
            'discount_prize' => 'required',
        ], [
            'course_name.required' => 'Group name is must required.',
            'image.required' => 'Group description  is must required.',
            'course_subtitle.required' => 'Type  is must required.',
            'course_description.required' => 'Type  is must required.',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $image = '';

        if (!empty($request->image)) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('CourseImage/'), $filename);

            $image = $filename;
        }

        $course_name = $request->course_name;
        $course_subtitle = $request->course_subtitle;
        $course_description = $request->course_description;
        $course_prize = $request->course_prize;
        $discount_prize = $request->discount_prize;

        $course = addShortCourse::create(['course_name' => $course_name, 'image' => $image, 'course_subtitle' => $course_subtitle, 'course_description' => $course_description, 'course_prize' => $course_prize,
            'discount_prize' => $discount_prize]);
        if ($course) {
            return back()->with('course', 'Course added successfully');
        } else {
            return back();
        }
    }

    public function getCourseTopic($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $topic = addCourseTopic::where('course_id', $id)->get();
            return view('admin/getCourseTopic', compact('id', 'topic'));
        }
    }

    public function editTopic(Request $request)
    {
        $id = $request->id;
        $emp = addCourseTopic::find($id);
        return response()->json($emp);
    }

    public function deleteTopic($id)
    {
        $topic = addCourseTopic::find($id);
        $topic->delete();
        return back()->with('topic', 'Topic delete successfully');
    }

    public function addCourseTopic(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'topic_name' => 'required',

        ], [
            'topic_name.required' => 'Topic name is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $topic_name = $request->topic_name;
        $course = addCourseTopic::create(['course_id' => $request->id, 'topic_name' => $topic_name]);
        if ($course) {
            return back()->with('course', 'Course added successfully');
        } else {
            return back();
        }
    }

    public function UpdateCourseTopic(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'topic_name' => 'required',

        ], [
            'topic_name.required' => 'Topic name is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $topic = addCourseTopic::find($request->topicid);
        $topic->topic_name = $request->topic_name;

        if ($topic->save()) {
            return back()->with('topic', 'Topic Updated successfully');
        } else {
            return back();
        }
    }

    public function getChapter($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            Session::put('topic_id', $id);
            $chapter = addCourseChapter::where('topic_id', $id)->get();
            return view('admin/getCourseChapter', compact('id', 'chapter'));
        }
    }

    public function addChapter()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $chapter = '';
            $topic = addCourseTopic::all();
            return view('admin/addChapter', compact('topic', 'chapter'));
        }
    }

    public function addChapterData(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'topic_id' => 'required',

            'chapter_name' => 'required',

        ], [
            'topic_id.required' => 'Select Topic is must required.',

            'chapter_name.required' => 'Chapter Name  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $topic = addCourseTopic::find($request->topic_id);

        $image = '';

        if (!empty($request->chapter_image)) {
            $file = $request->file('chapter_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('ChapterImage/'), $filename);

            $image = $filename;
        }

        $pdf = '';

        if (!empty($request->pdf)) {
            $file = $request->file('pdf');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('ChapterPDF/'), $filename);

            $pdf = $filename;
        }

        $topic_id = $request->topic_id;
        $chapter_name = $request->chapter_name;
        $chapter_subtitle = '';
        if ($request->chapter_subtitle) {
            $chapter_subtitle = $request->chapter_subtitle;
        } else {
            $chapter_subtitle = '';
        }
        $chapter_description = $request->chapter_description;

        if ($request->chapter_description) {
            $course = addCourseChapter::create(['course_id' => $topic->course_id, 'topic_id' => $topic_id, 'pdf' => $pdf, 'chapter_name' => $chapter_name, 'image' => $image, 'chapter_subtitle' => $chapter_subtitle, 'chapter_description' => $request->chapter_description]);
        } else {
            $chapter_description = ' ';
            $course = addCourseChapter::create(['course_id' => $topic->course_id, 'topic_id' => $topic_id, 'pdf' => $pdf, 'chapter_name' => $chapter_name, 'image' => $image, 'chapter_subtitle' => $chapter_subtitle, 'chapter_description' => $chapter_description]);

        }
        $id = Session::get('topic_id');
        if ($course) {
            // return redirect()->route('/admin/get-chapter/'.$id)->with('course', 'Course added successfully');
            // return redirect()->route('admin/get-chapter/'.$request->topic_id)->with('chapter', 'Chapter Added successfully');
            return back()->with('chapter', 'Chapter Added successfully!');

        } else {
            return back();
        }
    }

    public function ChapterDetail($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $topic = addCourseTopic::all();
            $chapter = addCourseChapter::where('id', $id)->first();
            return view('admin/getChapterDetail', compact('chapter', 'topic'));
        }
    }

    public function deleteChapter($id)
    {
        $chapter = addCourseChapter::find($id);
        $chapter->delete();
        return back()->with('chapter', 'Chapter delete successfully');
    }

    public function EditChapter($id)
    {
        $chapter = addCourseChapter::find($id);
        $topic = addCourseTopic::all();
        return view('admin/addChapter', compact('chapter', 'topic'));
    }

    public function UpdateChapter(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'topic_id' => 'required',

            'chapter_name' => 'required',

        ], [
            'topic_id.required' => 'Select Topic is must required.',

            'chapter_name.required' => 'Chapter Name  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $image = '';

        if (!empty($request->chapter_image)) {
            $file = $request->file('chapter_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('ChapterImage/'), $filename);
            $image = $filename;
            $chapter = addCourseChapter::find($request->id);
            $chapter->image = $image;
            $chapter->save();
        }

        $pdf = '';
        if (!empty($request->pdf)) {
            $file = $request->file('pdf');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . rand(1, 99) . '.' . $extension;
            $file->move(public_path('ChapterPDF/'), $filename);
            $pdf = $filename;
            $chapter = addCourseChapter::find($request->id);
            $chapter->pdf = $pdf;
            $chapter->save();
        }

        if ($request->chapter_subtitle) {
            $chapter_subtitle = $request->chapter_subtitle;
        } else {
            $chapter_subtitle = '';
        }

        if ($request->chapter_description) {
            $chapter = addCourseChapter::find($request->id);
            $chapter->topic_id = $request->topic_id;
            $chapter->chapter_name = $request->chapter_name;
            $chapter->chapter_subtitle = $chapter_subtitle;
            $chapter->chapter_description = $request->chapter_description;

            if ($chapter->save()) {
                // return redirect()->route('/admin/get-chapter/'.$id)->with('course', 'Course added successfully');
                return back()->with('chapter', 'Chapter Updated successfully');
            } else {
                return back();
            }
        } else {
            $chapter_description = ' ';
            $chapter = addCourseChapter::find($request->id);
            $chapter->topic_id = $request->topic_id;
            $chapter->chapter_name = $request->chapter_name;
            $chapter->chapter_subtitle = $chapter_subtitle;
            $chapter->chapter_description = $chapter_description;
            if ($chapter->save()) {
                // return redirect()->route('/admin/get-chapter/'.$id)->with('course', 'Course added successfully');
                return back()->with('chapter', 'Chapter Updated successfully');
            } else {
                return back();
            }
        }

    }

    public function workflowAdd()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $workflow = workflow::all();
            return view('admin/addWorkflow', compact('workflow'));

        }
    }

    public function workflow()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('/admin');
        } else {
            $workflow = workflow::all();
            $students = StudentModel::all();
            return view('admin/workflow', compact('students', 'workflow'));

        }
    }

    public function workflowDetail($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('/admin');
        } else {
            $workflow = workflow::all();
            return view('admin/workflowDetail', compact('workflow', 'id'));

        }
    }

    public function workflowStatus(Request $request)
    {

        $product = workflow::find($request->product_id);
        $product->status = $request->status;
        $product->save();
        $product = workflow::find($request->product_id);
        if ($product->status == 0) {
            return response()->json(['success' => 'Deactive  successfully.']);
        } else {
            return response()->json(['success' => 'Active  successfully.']);

        }
    }

    public function addWorkflow(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'stage_name' => 'required',
            'status' => 'required',

        ], [
            'stage_name.required' => 'Stage name is must required.',
            'status.required' => 'Please Select Status',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $stage_name = $request->stage_name;
        $status = $request->status;

        $workflow = workflow::create(['stage_name' => $stage_name, 'status' => $status]);
        if ($workflow) {
            return back()->with('workflow', 'Workflow added successfully');
        } else {
            return back();
        }
    }

    public function studentAccountList()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $studentPayment = universityCoursePayment::where('status', '1')->where('invoice_status', '0')->get();
            return view('admin.studentAccountList', compact('studentPayment'));
        }
    }

    public function alreadySendInvoice()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $studentPayment = universityCoursePayment::where('status', '1')->where('invoice_status', '1')->get();
            return view('admin.SendedInvoice', compact('studentPayment'));
        }
    }

    public function account($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $studentPayment = universityCoursePayment::where('id', $id)->first();
            return view('admin/account', compact('studentPayment', 'id'));

        }
    }

    public function viewInvoice($id)
    {

        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $invoicedetail = addInvoice::where('invoice_id', $id)->first();

            return view('admin/invoicedetail', compact('invoicedetail', 'id'));

        }
    }

    public function addInvoice(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'student_id' => 'required',
            'univeristy_id' => 'required',
            'course_id' => 'required',
            'course_tution_fees' => 'required',
            'course_comission' => 'required',
            'price' => 'required',
            'gst' => 'required',
            'gst_amount' => 'required',
            'all_total' => 'required',
        ], [
            'topic_id.required' => 'Select Topic is must required.',
            'chapter_image.required' => 'Image  is must required.',
            'chapter_name.required' => 'Chapter Name  is must required.',
            'chapter_subtitle.required' => 'Chapter Subtitle  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $addInvoice = addInvoice::create(['invoice_id' => $request->id, 'student_id' => $request->student_id, 'insitution_id' => $request->univeristy_id, 'course_id' => $request->course_id, 'tution_fees' => $request->course_tution_fees,
            'comission_per' => $request->course_comission, 'comission_amount' => $request->price, 'gst_per' => $request->gst, 'gst_amount' => $request->gst_amount, 'all_total' => $request->all_total]);
        if ($addInvoice) {
            $invoicestatus = universityCoursePayment::where('id', $request->id)->first();
            $invoicestatus->invoice_status = '1';
            $invoicestatus->save();
            return redirect()->route('admin/student-account')->with('Invoice', 'Invoice added successfully');

        } else {
            return back();
        }
    }

    public function addSmsPackage(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_price' => 'required',
            'sms_limit' => 'required',
            'country' => 'required',
            'comment' => 'required',

        ], [
            'package_name.required' => 'Select Topic is must required.',
            'package_price.required' => 'Image  is must required.',
            'sms_limit.required' => 'Chapter Name  is must required.',
            'comment.required' => 'Chapter Subtitle  is must required.',
            'country.required' => 'Chapter Subtitle  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $addSmsPackage = smsPackage::create(['package_name' => $request->package_name, 'country' => $request->country, 'package_price' => $request->package_price, 'sms_limit' => $request->sms_limit, 'message' => $request->comment]);
        if ($addSmsPackage) {
            return back()->with('package', 'Package added successfully');

        } else {
            return back();
        }
    }

    public function smsPackageDelete($id)
    {

        $package = smsPackage::where('id', $id)->delete();

        return back()->with('package', 'Package Delete Successfully');
    }

    public function fullcalender(Request $request)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $tasks = addTask::where('type', 'admin')->get();
            return view('admin/fullcalender', compact('tasks'));
        }
    }

    public function generatePDF()
    {
        $datas = StudentModel::all();

        $data = [
            'data' => $datas,
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('admin.StudentReportPdf', $data);

        return $pdf->download('Student-Report.pdf');

    }

    public function agentgeneratePDF()
    {
        $datas = AgentModel::all();

        $data = [
            'data' => $datas,
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('admin.AgentReportPdf', $data);

        return $pdf->download('Agent-Report.pdf');

    }

    public function insitutionreport()
    {

        $insitution = InstitutionModel::all();
        return view('admin/insitutionReport', compact('insitution'));
    }

    public function insitutiongeneratePDF()
    {
        $datas = InstitutionModel::all();

        $data = [
            'data' => $datas,
            'date' => date('m/d/Y'),
        ];

        $pdf = PDF::loadView('admin.InsitutionReportPdf', $data);

        return $pdf->download('Insitution-Report.pdf');

    }

    public function editTask($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $tasks = addTask::where('id', $id)->first();
            $staff = addRole::where('type', 'admin')->get();
            return view('admin/editTask', compact('tasks', 'staff'));
        }
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
            'staff.required' => 'staff is must required.',
            'start_date.required' => 'Start date is must required.',
            'end_date.required' => 'End date  is must required.',
            'comment.required' => 'Question is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $task = addTask::find($request->id);

        $task->task_name = $request->task_title;
        $task->priority = $request->priority;
        $task->assign_id = $request->staff;
        $task->start_date = $request->start_date;
        $task->end_date = $request->end_date;
        $task->task_description = $request->comment;
        $task->type = 'admin';

        if ($task->save()) {
            return redirect()->route('admin/task-manage')->with('delete', 'Task Updated successfully');
        } else {
            return redirect()->route('admin/task-manage')->with('delete', ' Not Updated successfully');
        }

    }

    public function getEmailPackage()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $emailpackage = email_package::all();
            return view('admin/emailPackage', compact('emailpackage'));
        }
    }

    public function addEmailPackage(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_price' => 'required',
            'sms_limit' => 'required',
            'comment' => 'required',

        ], [
            'package_name.required' => 'Select Topic is must required.',
            'package_price.required' => 'Image  is must required.',
            'sms_limit.required' => 'Chapter Name  is must required.',
            'comment.required' => 'Chapter Subtitle  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $addSmsPackage = email_package::create(['package_name' => $request->package_name, 'package_price' => $request->package_price, 'country' => $request->country, 'email_limit' => $request->sms_limit, 'message' => $request->comment]);
        if ($addSmsPackage) {
            return back()->with('package', 'Package added successfully');

        } else {
            return back();
        }
    }

    public function emailPackageDelete($id)
    {

        $package = email_package::where('id', $id)->delete();

        return back()->with('package', 'Package Delete Successfully');
    }

    public function getSmsTemplate()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $addSmsTemplate = addSmsTemplate::where('type', 'sms')->where('add_type', 'admin')->get();
            return view('admin/getSmsTemplate', compact('addSmsTemplate'));
        }
    }

    public function getEmailTemplate()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $addEmalTemplate = addEmailTemplate::where('type', 'email')->where('add_type', 'admin')->get();
            return view('admin/getEmailTemplate', compact('addEmalTemplate'));
        }
    }

    public function addEmailTemplate(Request $request)
    {

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
        $addSmsTemplate = addEmailTemplate::create(['agent_id' => '0', 'add_type' => 'admin', 'name' => $request->template_name, 'description' => $request->template_description, 'type' => 'email']);
        if ($addSmsTemplate) {
            return back()->with('template', 'Template added successfully');

        } else {
            return back();
        }
    }

    public function addSmsTemplate(Request $request)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {

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
            $addSmsTemplate = addSmsTemplate::create(['name' => $request->template_name, 'add_type' => 'admin', 'description' => $request->template_description, 'type' => 'sms']);
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

    public function editSmsTemplate($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $addSmsTemplate = addSmsTemplate::where('id', $id)->first();
            return view('admin/editSmsTemplate', compact('addSmsTemplate'));
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
            return redirect()->route('admin/get-sms-template')->with('template', 'Template Updated successfully');
        } else {
            return redirect()->route('/admin/get-sms-template')->with('delete', ' Not Updated successfully');
        }

    }

    public function getSmsTemplateData(Request $request)
    {

        $templateData = addSmsTemplate::find($request->product_id);
        return response()->json($templateData);

    }

    public function getSampleCategory()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $category = addSampleDocument::where('type', 'category')->get();
            return view('admin/sampleDocumentCategory', compact('category'));
        }
    }

    public function addSampleCategory(Request $request)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {

            $validate = Validator::make($request->all(), [
                'category' => 'required',

            ], [
                'category.required' => 'Category is must required',

            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $description = '';
            $category = addSampleDocument::create(['category' => $request->category, 'description' => $description, 'type' => 'category']);
            if ($category) {
                return back()->with('category', 'Category added successfully');

            } else {
                return back();
            }

        }
    }

    public function getSampleSubCategory()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $category = addSampleDocument::where('type', 'category')->get();
            $subcategory = addSampleDocument::where('type', 'subcategory')->get();
            return view('admin/sampleDocumentSubCategory', compact('subcategory', 'category'));
        }
    }

    public function addSampleSubCategory(Request $request)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {

            $validate = Validator::make($request->all(), [
                'category' => 'required',
                'subcategory' => 'required',

            ], [
                'category.required' => 'Category is must required',
                'subcategory.required' => 'Sub Category is must required',
            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $description = '';
            $category = addSampleDocument::create(['category' => $request->category, 'sub_category' => $request->subcategory, 'description' => $description, 'type' => 'subcategory']);
            if ($category) {
                return back()->with('category', 'Sub Category added successfully');

            } else {
                return back();
            }

        }
    }

    public function getSampleDocument()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $category = addSampleDocument::where('type', 'category')->get();
            $subcategory = addSampleDocument::where('type', 'subcategory')->get();
            $document = addSampleDocument::where('type', 'document')->get();
            return view('admin/sampleDocument', compact('category', 'subcategory', 'document'));
        }
    }

    public function fetchSubCategory(Request $request)
    {
        $data['subcategory'] = DB::table('sample_document')->where('category', '=', $request->category_id)->where('type', '=', 'subcategory')->get(["sub_category", "id"]);
        return response()->json($data);
    }

    public function addSampleDocument(Request $request)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {

            $validate = Validator::make($request->all(), [
                'category' => 'required',
                'subcategory' => 'required',
                'title' => 'required',
                'description' => 'required',

            ], [
                'category.required' => 'Please Select Category',
                'subcategory.required' => 'Please Select Sub Category',
                'title.required' => 'Title is must required',
                'description.required' => 'Description is must required',

            ]);

            if ($validate->fails()) {
                return back()->withErrors($validate->errors())->withInput();
            }
            $document = '';

            if (!empty($request->document)) {
                $files = $request->file('document');
                $extensions = $files->getClientOriginalExtension();
                $filenames = time() . rand(1, 99) . '.' . $extensions;
                $files->move(public_path('SampleDocument/'), $filenames);

                $document = $filenames;

            }

            $documentdata = addSampleDocument::create(['category' => $request->category, 'sub_category' => $request->subcategory, 'title' => $request->title, 'description' => $request->description, 'document' => $document, 'type' => 'document']);
            if ($documentdata) {
                return back()->with('category', 'Document added successfully');

            } else {
                return back();
            }

        }
    }

    public function deleteSampleDocument($id)
    {

        $package = addSampleDocument::where('id', $id)->where('type', 'document')->delete();

        return back()->with('category', 'Document Delete Successfully');
    }

    public function deleteSampleDocumentSubcategory($id)
    {

        $package = addSampleDocument::where('id', $id)->where('type', 'subcategory')->delete();

        return back()->with('category', 'Sub Category Delete Successfully');
    }

    public function deleteSampleDocumentcategory($id)
    {

        $package = addSampleDocument::where('id', $id)->where('type', 'category')->delete();

        return back()->with('category', ' Category Delete Successfully');
    }

    public function editCategory(Request $request)
    {
        $id = $request->id;
        $emp = addSampleDocument::find($id);
        return response()->json($emp);
    }

    public function updateCategory(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'category' => 'required',

        ], [
            'category.required' => 'Category is must required',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $category = addSampleDocument::find($request->id);
        $category->category = $request->category;

        if ($category->save()) {
            return back()->with('category', 'Category Updated Successfully');

        } else {
            return back()->with('category', ' Category Delete Successfully');}

    }

    public function editSubCategory(Request $request)
    {
        $id = $request->id;
        $emp = addSampleDocument::find($id);
        $category = addSampleDocument::find($emp->category);

        return response()->json($emp);
    }

    public function updateSubCategory(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'category' => 'required',
            'subcategory' => 'required',

        ], [
            'category.required' => 'Category is must required',
            'subcategory.required' => 'Sub Category is must required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $category = addSampleDocument::find($request->id);
        $category->category = $request->category;
        $category->sub_category = $request->subcategory;

        if ($category->save()) {
            return back()->with('category', 'Sub Category Updated Successfully');

        } else {
            return back()->with('category', 'Sub Category Delete Successfully');}

    }

    public function editSampleDocument(Request $request)
    {
        $id = $request->id;
        $emp = addSampleDocument::find($id);
        return response()->json($emp);
    }

    public function updateSampleDocument(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'category' => 'required',
            'subcategory' => 'required',
            'title' => 'required',
            'description' => 'required',

        ], [
            'category.required' => 'Please Select Category',
            'subcategory.required' => 'Please Select Sub Category',
            'title.required' => 'Title is must required',
            'description.required' => 'Description is must required',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $documentimage = '';
        if (!empty($request->document)) {
            $files = $request->file('document');
            $extensions = $files->getClientOriginalExtension();
            $filenames = time() . rand(1, 99) . '.' . $extensions;
            $files->move(public_path('SampleDocument/'), $filenames);
            $documentimage = $filenames;

            $document = addSampleDocument::find($request->id);
            $document->title = $request->title;
            $document->description = $request->description;
            $document->category = $request->category;
            $document->sub_category = $request->subcategory;
            $document->document = $documentimage;

            if ($document->save()) {
                return back()->with('category', 'Document Updated Successfully');

            } else {
                return back()->with('category', 'Document  Updated Successfully');}

        } else {

            $document = addSampleDocument::find($request->id);
            $document->title = $request->title;
            $document->description = $request->description;
            $document->category = $request->category;
            $document->sub_category = $request->subcategory;

            if ($document->save()) {
                return back()->with('category', 'Document  Updated Successfully');

            } else {
                return back()->with('category', 'Document  Updated Successfully');}

        }
    }

    public function getStoragePackage()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $package = addStoragePackage::all();
            return view('admin/getStoragePackage', compact('package'));
        }
    }

    public function storagePackageDelete($id)
    {

        $package = addStoragePackage::where('id', $id)->delete();

        return back()->with('package', 'Package Delete Successfully');
    }

    public function addStoragePackage(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_price' => 'required',
            'storage_limit' => 'required',
            'comment' => 'required',

        ], [
            'package_name.required' => 'Select Topic is must required.',
            'package_price.required' => 'Image  is must required.',
            'storage_limit.required' => 'Chapter Name  is must required.',
            'comment.required' => 'Chapter Subtitle  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $addSmsPackage = addStoragePackage::create(['package_name' => $request->package_name, 'package_price' => $request->package_price, 'storage_limit' => $request->storage_limit, 'message' => $request->comment]);
        if ($addSmsPackage) {
            return back()->with('package', 'Package added successfully');

        } else {
            return back();
        }
    }

    public function getCourseSubcription()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $student = StudentModel::all();
            return view('admin/getCourseSubscription', compact('student'));
        }
    }

    public function getStudentCourseSubcriptiondetails($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $course = studentCourse::where('member_id', $id)->get();
            return view('admin/getStudentCourseSubcriptiondetails', compact('course'));
        }
    }

    public function updateSmsPackage(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_price' => 'required',
            'sms_limit' => 'required',
            'comment' => 'required',
            'country' => 'required',

        ], [
            'package_name.required' => 'Select Topic is must required.',
            'package_price.required' => 'Image  is must required.',
            'sms_limit.required' => 'Chapter Name  is must required.',
            'comment.required' => 'Chapter Subtitle  is must required.',
            'country.required' => 'Chapter Subtitle  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $sms = smsPackage::find($request->id);
        $sms->package_name = $request->package_name;
        $sms->package_price = $request->package_price;
        $sms->sms_limit = $request->sms_limit;
        $sms->message = $request->comment;
        $sms->country = $request->country;

        if ($sms->save()) {
            return back()->with('package', 'Package Updated Sucessfully');

        } else {
            return back()->with('package', 'Sub Category Delete Successfully');}

    }

    public function editEmailPackage(Request $request)
    {
        $id = $request->id;
        $emp = email_package::find($id);
        return response()->json($emp);
    }

    public function updateEmailPackage(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_price' => 'required',
            'email_limit' => 'required',
            'comment' => 'required',

        ], [
            'package_name.required' => 'Select Topic is must required.',
            'package_price.required' => 'Image  is must required.',
            'email_limit.required' => 'Chapter Name  is must required.',
            'comment.required' => 'Chapter Subtitle  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $email = email_package::find($request->id);
        $email->package_name = $request->package_name;
        $email->package_price = $request->package_price;
        $email->email_limit = $request->email_limit;
        $email->message = $request->comment;
        $email->country = $request->country;

        if ($email->save()) {
            return back()->with('package', 'Package Updated Sucessfully');

        } else {
            return back()->with('package', 'Sub Category Delete Successfully');}

    }

    public function editStoragePackage(Request $request)
    {
        $id = $request->id;
        $emp = addStoragePackage::find($id);
        return response()->json($emp);
    }

    public function updateStoragePackage(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'package_name' => 'required',
            'package_price' => 'required',
            'storage_limit' => 'required',
            'comment' => 'required',

        ], [
            'package_name.required' => 'Select Topic is must required.',
            'package_price.required' => 'Image  is must required.',
            'storage_limit.required' => 'Chapter Name  is must required.',
            'comment.required' => 'Chapter Subtitle  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $storage = addStoragePackage::find($request->id);
        $storage->package_name = $request->package_name;
        $storage->package_price = $request->package_price;
        $storage->storage_limit = $request->storage_limit;
        $storage->message = $request->comment;

        if ($storage->save()) {
            return back()->with('package', 'Package Updated Sucessfully');

        } else {
            return back()->with('package', 'Sub Category Delete Successfully');}

    }

    public function onlineTranscation()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $online = universityCoursePayment::where('mode', 'Online')->get();
            return view('admin/courseOnlinePayment', compact('online'));
        }
    }

    public function offlineTranscation()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $offline = universityCoursePayment::where('mode', 'Offline')->get();
            return view('admin/courseOfflinePayment', compact('offline'));
        }
    }

    public function deleteSmsGroup($id)
    {

        $package = addSmsGroup::where('id', $id)->delete();

        return back()->with('deletestudent', 'Group Delete Successfully');
    }
    public function deleteEmailGroup($id)
    {

        $package = addGroup::where('id', $id)->delete();

        return back()->with('deletestudent', 'Group Delete Successfully');
    }

    public function deleteEmailTemplate($id)
    {

        $package = addEmailTemplate::where('id', $id)->delete();

        return back()->with('template', 'Template Delete Successfully');
    }

    public function editEmailTemplate($id)
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {
            $addEmailTemplate = addEmailTemplate::where('id', $id)->first();
            return view('admin/editEmailTemplate', compact('addEmailTemplate'));
        }
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
            return redirect()->route('admin/get-email-template')->with('template', 'Template Updated successfully');
        } else {
            return redirect()->route('/admin/get-email-template')->with('delete', ' Not Updated successfully');
        }

    }

    public function editemail(Request $request)
    {
        $id = $request->id;
        $emp = addGroup::find($id);
        return response()->json($emp);
    }

    public function updateEmailGroup(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'group_name' => 'required',
            'group_description' => 'required',

        ], [
            'group_name.required' => 'Group name is must required.',
            'group_description.required' => 'Group description  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $group = addGroup::find($request->id);
        $group->group_name = $request->group_name;
        $group->group_description = $request->group_description;
        if ($group->save()) {
            return back()->with('message', 'Update Group successfully');
        } else {
            return back();
        }
    }

    public function editsms(Request $request)
    {
        $id = $request->id;
        $emp = addSmsGroup::find($id);
        return response()->json($emp);
    }

    public function updateSmsGroup(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'group_name' => 'required',
            'group_description' => 'required',

        ], [
            'group_name.required' => 'Group name is must required.',
            'group_description.required' => 'Group description  is must required.',

        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $group = addSmsGroup::find($request->id);
        $group->group_name = $request->group_name;
        $group->group_description = $request->group_description;
        if ($group->save()) {
            return back()->with('message', 'Update Group successfully');
        } else {
            return back();
        }
    }

    public function getShortCourseTranscation()
    {
        if (Session::get('adminlogin') != 'loginsuccess') {
            return redirect()->route('admin');
        } else {

            $coursetranscation = studentCourse::where('payment_status', '1')->get();
            return view('admin/getShortCourseTrancation', compact('coursetranscation'));
        }
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

function generateRandomString($length = 20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
