<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\InstitutionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware grocourseup. Now create something great!
|
*/
///web////
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/student', [HomeController::class, 'student'])->name('student');
Route::get('/agent', [HomeController::class, 'agent'])->name('agent');
Route::get('/institution', [HomeController::class, 'institution'])->name('institution');
Route::get('/course', [HomeController::class, 'course'])->name('course');


Route::get('/member/login', [HomeController::class, 'studentLogin'])->name('/member/login');
Route::get('/institution/login', [HomeController::class, 'institutionLogin'])->name('/institution/login');

Route::get('/agent/login', [HomeController::class, 'agentLogin'])->name('/agent/login');
Route::get('/member/register', [HomeController::class, 'studentRegister'])->name('/member/register');
Route::get('/institution/register', [HomeController::class, 'institutionRegister'])->name('/institution/register');

Route::get('/agent/register', [HomeController::class, 'agentRegister'])->name('/agent/register');
Route::get('/about', [HomeController::class, 'about'])->name('/about');
Route::get('/contact', [HomeController::class, 'contact'])->name('/contact');
Route::get('/terms-conditions', [HomeController::class, 'termsConditions'])->name('/terms-conditions');
Route::get('/disclaimer', [HomeController::class, 'disclaimer'])->name('/disclaimer');
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('/privacy-policy');
Route::get('/university/search', [HomeController::class, 'FindExplorebestuniversities'])->name('/university/search');
Route::get('/PayingforCollege', [HomeController::class, 'PayingCollege'])->name('/PayingforCollege');
Route::get('/FAQ', [HomeController::class, 'FAQ'])->name('/FAQ');
Route::get('/ExpertAdvice', [HomeController::class, 'ExpertAdvice'])->name('/ExpertAdvice');
Route::get('/Blog', [HomeController::class, 'Blog'])->name('/Blog');
Route::get('/blog-details/{value}', [HomeController::class, 'singleBlog'])->name('/blog-details/{value}');
Route::get('/universitiesdetails/{id}', [HomeController::class, 'universitiesdetails'])->name('/universitiesdetails');
Route::get('/WhyCollegeMatters', [HomeController::class, 'WhyCollegeMatters'])->name('/WhyCollegeMatters');

Route::get('/member/forgotpassword', [HomeController::class, 'memberforgotpassword'])->name('/member/forgotpassword');

Route::post('/member/forgot_email_check', [HomeController::class, 'memberpasswordupdate'])->name('/member/forgot_email_check');
Route::get('/member/{email}/{token}', [HomeController::class, 'memberpasswordchange'])->name('/member/{email}/{token}');
Route::post('/member/password-update', [HomeController::class, 'updatepassword'])->name('/member/password-update');


Route::get('/agent/forgotpassword', [HomeController::class, 'agentforgotpassword'])->name('/agent/forgotpassword');
Route::post('/agent/forgot_email_check', [HomeController::class, 'agentpasswordupdate'])->name('/agent/forgot_email_check');

Route::get('/agents/{email}/{token}', [HomeController::class, 'agentpasswordchange'])->name('/agent/{email}/{token}');


// Route::post('/agent/password-update', [HomeController::class, 'agentupdatepassword'])->name('/agent/password-update');


Route::get('/insitution/forgotpassword', [HomeController::class, 'insitutionforgotpassword'])->name('/insitution/forgotpassword');
Route::post('/insitution/forgot_email_check', [HomeController::class, 'insitutionpasswordupdate'])->name('/insitution/forgot_email_check');
Route::get('/insitution/{email}/{token}', [HomeController::class, 'insitutionpasswordchange'])->name('/insitution/{email}/{token}');
Route::post('/insitution/password-update', [HomeController::class, 'insitutionupdatepassword'])->name('/insitution/password-update');

Route::get('/agent/search', [HomeController::class, 'findAgent'])->name('/agent/search');
Route::get('/course-payment/{id}', [HomeController::class, 'coursePayment'])->name('/course-payment/{id}');

Route::post('/stripe.post', [HomeController::class, 'stripePost'])->name('/stripe.post');

Route::post('/khalti/payment/verify',[HomeController::class,'verifyPayment'])->name('khalti.verifyPayment');

Route::post('/khalti/payment/store',[HomeController::class,'storePayment'])->name('khalti.storePayment');



Route::get('/univeristy-apply/{insitutionid}/{courseid}', [HomeController::class, 'univeristyApply'])->name('/univeristy-apply/{insitutionid}/{courseid}');

Route::get('/university-course-fees/{insitutionid}/{courseid}', [HomeController::class, 'universityCourseFees'])->name('/university-course-fees/{insitutionid}/{courseid}');
Route::post('/university-fees/stripe.post', [HomeController::class, 'universityStripePost'])->name('/university-fees/stripe.post');
Route::post('/offline-university-fees', [HomeController::class, 'offlineUniveristyFees'])->name('/offline-university-fees');
Route::get('/course/topic/{id}', [HomeController::class, 'getTopic'])->name('/course/topic/{id}');
Route::get('package-price', [HomeController::class, 'getPackagePrice'])->name('package-price');


///////////admin////////////////////////
Route::get('/admin', [AdminController::class, 'login'])->name('admin');
Route::get('/admin/register', [AdminController::class, 'register']);
Route::post('/logincheck', [AdminController::class, 'logincheck'])->name('logincheck');
Route::post('/adminregister', [AdminController::class, 'postAdminRegister'])->name('adminregister');
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');


Route::get('admin/manage-agent', [AdminController::class, 'agenttable'])->name('admin/manage-agent');
Route::post('admin/agent/delete/{id}', [AdminController::class, 'agentdelete']);
Route::get('/admin/agentstatus/update', [AdminController::class, 'updateAgentStatus']);


Route::get('admin/manage-institution', [AdminController::class, 'institutiontable'])->name('admin/manage-institution');
Route::post('admin/institution/delete/{id}', [AdminController::class, 'institutiondelete']);
Route::get('/admin/institutionstatus/update', [AdminController::class, 'updateInstitutionStatus']);

Route::get('admin/student-detail/{id}', [AdminController::class, 'studentDetail'])->name('admin/student-detail/{id}');

Route::get('admin/agent-detail/{id}', [AdminController::class, 'agentDetail'])->name('admin/agent-detail/{id}');


Route::get('admin/forget-password', [AdminController::class, 'forgetpassword'])->name('admin/forget-password');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin/logou');
Route::get('admin/manage-blog', [AdminController::class, 'manageblog'])->name('admin/manage-blog');
Route::get('admin/add-blog', [AdminController::class, 'addblog'])->name('admin/add-blog');
Route::get('admin/edit-blog/{id}', [AdminController::class, 'editBlog'])->name('admin/edit-blog/{id}');
Route::post('admin/update-blog/{id}', [AdminController::class, 'updateBlog'])->name('admin/update-blog/{id}');
Route::get('admin/view-blog/{id}', [AdminController::class, 'viewBlog'])->name('admin/view-blog/{id}');
Route::post('admin/addBlogs', [AdminController::class, 'addblogs'])->name('admin/addBlogs');
Route::get('admin/blog/delete/{id}', [AdminController::class, 'blogDelete']);
Route::get('admin/manage-student', [AdminController::class, 'studenttable'])->name('admin/manage-student');
Route::post('admin/student/delete/{id}', [AdminController::class, 'studentdelete']);
Route::get('/admin/status/update', [AdminController::class, 'updateStudentStatus'])->name('/admin/status/update');
Route::get('admin/student-edit/{id}', [AdminController::class, 'studentEdit'])->name('admin/student-edit/{id}');
Route::post('admin/student-update/{id}', [AdminController::class, 'studentUpdate'])->name('admin/student-update/{id}');

Route::get('admin/agent-detail/{id}', [AdminController::class, 'agentDetail'])->name('admin/agent-detail/{id}');

Route::get('admin/agent-edit/{id}', [AdminController::class, 'agentEdit'])->name('admin/agent-edit/{id}');
Route::post('admin/agent-update/{id}', [AdminController::class, 'agentUpdate'])->name('admin/agent-update/{id}');
Route::get('admin/institution-edit/{id}', [AdminController::class, 'institutionEdit'])->name('admin/institution-edit/{id}');
Route::post('admin/insitution-update/{id}', [AdminController::class, 'institutionupdate'])->name('admin/insitution-update/{id}');
Route::get('admin/admin-profile', [AdminController::class, 'adminprofile'])->name('admin/admin-profile');
Route::post('admin/admin-profile-update', [AdminController::class, 'adminprofileupdate'])->name('admin/admin-profile-update');

Route::post('admin/add-faq', [AdminController::class, 'addFaq'])->name('/admin/add-faq');


Route::get('/admin/manage-student-faq', [AdminController::class, 'managestudentfaq'])->name('/admin/manage-student-faq');

Route::get('/admin/add-student-faq', [AdminController::class, 'addstudentFaq'])->name('/admin/add-student-faq');

Route::get('/admin/manage-agent-faq', [AdminController::class, 'manageAgentfaq'])->name('/admin/manage-agent-faq');

Route::get('/admin/add-agent-faq', [AdminController::class, 'addAgentFaq'])->name('/admin/add-agent-faq');

Route::get('/admin/manage-institution-faq', [AdminController::class, 'manageInstutionfaq'])->name('/admin/manage-institution-faq');

Route::get('/admin/add-insitution-faq', [AdminController::class, 'addInsitutionFaq'])->name('/admin/add-insitution-faq');

Route::post('/admin/delete-student-faq/{id}', [AdminController::class, 'deleteStudentFaq']);
Route::post('/admin/delete-agent-faq/{id}', [AdminController::class, 'deleteAgentFaq']);
Route::post('/admin/delete-insitution-faq/{id}', [AdminController::class, 'deleteInsitutionFaq']);

Route::get('/admin/edit-student-faq/{id}', [AdminController::class, 'editStudentFaq'])->name('/admin/edit-student-faq');
Route::post('/admin/update-student-faq/{id}', [AdminController::class, 'updateStudentFaq'])->name('/admin/update-student-faq');

Route::get('/admin/edit-agent-faq/{id}', [AdminController::class, 'editAgentFaq'])->name('/admin/edit-agent-faq');
Route::post('/admin/update-agent-faq/{id}', [AdminController::class, 'updateAgentFaq'])->name('/admin/update-agent-faq');

Route::get('/admin/edit-insitution-faq/{id}', [AdminController::class, 'editInsitutionFaq'])->name('/admin/edit-insitution-faq');
Route::post('/admin/update-insitution-faq/{id}', [AdminController::class, 'updateInsitutionFaq'])->name('/admin/update-insitution-faq');
Route::get('admin/role-permission', [AdminController::class, 'rolePermission'])->name('admin/role-permission');
Route::get('admin/sms-list', [AdminController::class, 'smsList'])->name('admin/sms-list');
Route::get('admin/send-sms', [AdminController::class, 'sendSms'])->name('admin/send-sms');
Route::get('admin/document-manage', [AdminController::class, 'managedocument'])->name('admin/document-manage');
Route::get('admin/task-manage', [AdminController::class, 'managetask'])->name('admin/task-manage');

Route::get('admin/role-manage', [AdminController::class, 'managerole'])->name('admin/role-manage');

Route::get('admin/manage-package', [AdminController::class, 'managepackage'])->name('admin/manage-package');
Route::get('admin/add-package', [AdminController::class, 'addpackage'])->name('admin/add-package');

Route::get("admin/insitution-detail/{id}",[AdminController::class,"insitutionDetail"])->name("admin/insitution-detail/{id}");

Route::post('admin/institution/updateinstitutioninfo', [AdminController::class, 'updateinstitutioninfo']);
Route::post('admin/institution/aboutInfo', [AdminController::class, 'updateaboutInfo']);
Route::post('admin/glance/update', [AdminController::class, 'updateGlance']);
Route::get('admin/glance/delete/{id}', [AdminController::class, 'glancedelete']);
Route::post('admin/institution/updatevideo', [AdminController::class, 'updatevideo']);
Route::post('admin/institution/uploadmultipleimage', [AdminController::class, 'uploadmultipleimage']);

Route::post("admin/student/update",[AdminController::class,"updatestudent"])->name("admin/student/update");

Route::post("admin/student/updateAddress",[AdminController::class,"updateStudentAddress"])->name("admin/student/updateAddress");
Route::post("admin/student/updateLanguageScore",[AdminController::class,"updateLanguageScore"])->name("admin/student/updateLanguageScore");
Route::post("admin/student/addLanguageScore",[AdminController::class,"addLanguageScore"])->name("admin/student/addLanguageScore");
Route::post("admin/student/updateGpaScore",[AdminController::class,"updateGpaScore"])->name("admin/student/updateGpaScore");
Route::post("admin/student/updateacademic",[AdminController::class,"updateacademicInfo"])->name("admin/student/updateacademic");
Route::post("admin/student/updateContact",[AdminController::class,"updateContact"])->name("admin/student/updateContact");
Route::post("admin/student/upload-documents",[AdminController::class,"uploadmultipleimagess"])->name("admin/student/upload-documents");
Route::post("admin/student/updateSignature",[AdminController::class,"updateSignature"])->name("admin/student/updateSignature");

Route::post('admin/add-package-features', [AdminController::class, 'addpackageFeatures'])->name('admin/add-package-features');

Route::get('admin/package/delete/{id}', [AdminController::class, 'packagedelete']);
Route::get('admin/package-edit/{id}', [AdminController::class, 'packageedit']);

Route::post('admin/add-role-features', [AdminController::class, 'addroleFeatures'])->name('admin/add-role-features');
Route::get('admin/role/delete/{id}', [AdminController::class, 'roledelete'])->name('admin/role/delete/{id}');
Route::get('admin/discount', [AdminController::class, 'discount']);
Route::get('admin/edit-role/{id}', [AdminController::class, 'editRole']);

Route::post('admin/update-role-features', [AdminController::class, 'updateroleFeatures'])->name('admin/update-role-features');

Route::get('admin/manage-coupon', [AdminController::class, 'manageCoupon']);
Route::get('admin/add-coupon', [AdminController::class, 'addCoupon']);
Route::get('/admin/coupon-status/update', [AdminController::class, 'updateCouponStatus'])->name('/admin/coupon-status/update');
Route::get('admin/coupon/delete/{id}', [AdminController::class, 'coupondelete'])->name('admin/coupon/delete/{id}');
Route::get('admin/manage-coupon', [AdminController::class, 'manageCoupon'])->name('admin/manage-coupon');;
Route::post('admin/add-coupon-detail', [AdminController::class, 'addCouponDetail']);
Route::get('admin/coupon-edit/{id}', [AdminController::class, 'editCoupon']);
Route::post('admin/update-coupon-detail', [AdminController::class, 'updateCoupon'])->name('admin/update-coupon-detail');

Route::get('/admin/lead-manage', [AdminController::class, 'leadmanage'])->name('/admin/lead-manage');
Route::get('/admin/edit-lead/{id}', [AdminController::class, 'editLead'])->name('/admin/edit-lead/{id}');
Route::post('admin/update-lead', [AdminController::class, 'updateLead'])->name('admin/update-lead');


Route::get('/admin/complete-lead-manage', [AdminController::class, 'completeleadmanage'])->name('/admin/complete-lead-manage');

Route::get('/admin/support', [AdminController::class, 'support'])->name('/admin/support');
Route::get('/admin/support-complete', [AdminController::class, 'supportcomplete'])->name('/admin/support-complete');
Route::post('/admin/delete-lead/{id}', [AdminController::class, 'leaddelete']);
Route::get("admin/student/delete-passport/{id}",[AdminController::class,"deletepassport"])->name("admin/student/delete-passport");
Route::get("admin/student/delete-marksheet/{id}",[AdminController::class,"deletemarksheet"])->name("admin/student/delete-marksheet");
Route::get("admin/student/delete-other/{id}",[AdminController::class,"deleteother"])->name("admin/student/delete-other");
Route::get("admin/student/delete-recommendations/{id}",[AdminController::class,"deleterecommand"])->name("admin/student/delete-recommendations");
Route::get("admin/student/delete-financials/{id}",[AdminController::class,"deletefinanical"])->name("admin/student/delete-financials");
Route::get("admin/changeStatus",[AdminController::class,"changeStatus"])->name("admin/changeStatus");
Route::get('/admin/assign-ticket', [AdminController::class, 'assignticket'])->name("/admin/assign-ticket");
Route::get('/admin/support/{value}', [AdminController::class, 'supporttype'])->name('/admin/support/{value}');
Route::get('/admin/completesupport/{value}', [AdminController::class, 'completesupporttype'])->name('/admin/completesupport/{value}');
Route::get('/admin/assign-lead', [AdminController::class, 'assignlead'])->name("/admin/assign-lead");
Route::get("admin/leadchangeStatus",[AdminController::class,"leadchangeStatus"])->name("admin/leadchangeStatus");
Route::post('/admin/add-lead', [AdminController::class, 'addLead'])->name('/admin/add-lead');
Route::get("admin/application-list",[AdminController::class,"applicationlist"])->name("admin/application-list");
Route::post('admin/assign-staff', [AdminController::class, 'assignstaff'])->name('admin/assign-staff');
Route::get("admin/assign-application-list",[AdminController::class,"assignapplicationlist"])->name("admin/assign-application-list");
Route::get("admin/pending-application",[AdminController::class,"pendingapplication"])->name("admin/pending-application");
Route::get("admin/send-to-insitution/{id}",[AdminController::class,"sendToInsitution"])->name("admin/send-to-insitutio/{id}");
Route::get("admin/complete-application",[AdminController::class,"completeapplication"])->name("admin/complete-application");
Route::get("/admin/recheck-application/{id}",[AdminController::class,"recheckapplicationStatus"])->name("/admin/recheck-application/{id}");
Route::post('admin/add-task', [AdminController::class, 'addtask'])->name('admin/add-task');
Route::post('/admin/delete-task/{id}', [AdminController::class, 'taskdelete']);
Route::get('admin/assign-task', [AdminController::class, 'assignTask']);
Route::get('admin/complete-task/{id}', [AdminController::class, 'completetask']);
Route::get("admin/cancelstatus",[AdminController::class,"cancelChangeStatus"])->name("admin/cancelstatus");
Route::get('admin/task-complete', [AdminController::class, 'completedtask']);
Route::get('admin/cancel-task', [AdminController::class, 'canceltask']);

Route::get('/admin/edit-task/{id}', [AdminController::class, 'editTask']);
Route::post('/admin/update-task', [AdminController::class, 'updateTask']);


Route::get('/admin/student-report', [AdminController::class, 'studentreport']);
Route::get('/admin/agent-report', [AdminController::class, 'agentreport']);
Route::get('/admin/student-report/generate-pdf', [AdminController::class, 'generatePDF']);
Route::get('/admin/agent-report/generate-pdf', [AdminController::class, 'agentgeneratePDF']);

Route::get('/admin/insitution-report', [AdminController::class, 'insitutionreport']);
Route::get('/admin/insitution-report/generate-pdf', [AdminController::class, 'insitutiongeneratePDF']);


Route::get('/admin/send-email', [AdminController::class, 'sendEmail']);
Route::post('/admin/email', [AdminController::class, 'sendSingleEmail']);
Route::post('/admin/send-email-group', [AdminController::class, 'sendGroupEmail']);
Route::post('/admin/add-group', [AdminController::class, 'addGroup']);
Route::get('/admin/add-group-members/{id}', [AdminController::class, 'addGroupMember']);
Route::post('/admin/get-member', [AdminController::class, 'getMember']);
Route::post('admin/add-members', [AdminController::class, 'addMembers']);
Route::post('admin/send-smss', [AdminController::class, 'SmsSend']);
Route::get('/admin/get-group', [AdminController::class, 'getGroup']);
Route::get('/admin/get-sms-group', [AdminController::class, 'getSmsGroup']);
Route::post('/admin/add-sms-group', [AdminController::class, 'addSmsGroup']);
Route::get('/admin/add-sms-group-members/{id}', [AdminController::class, 'addSmsGroupMember']);
Route::post('admin/add-sms-members', [AdminController::class, 'addSmsMembers']);
Route::post('admin/send-group-smss', [AdminController::class, 'GroupSmsSend']);
Route::get('admin/get-courses', [AdminController::class, 'getCourse']);
Route::post('/admin/add-course', [AdminController::class, 'addCourse']);
Route::get('/admin/get-course-topic/{id}', [AdminController::class, 'getCourseTopic'])->name("/admin/get-course-topic");
Route::post('admin/add-course-topic', [AdminController::class, 'addCourseTopic']);
Route::get('/admin/get-chapter/{id}', [AdminController::class, 'getChapter'])->name("/admin/get-chapter/{id}");
Route::get('admin/add-chapter', [AdminController::class, 'addChapter']);
Route::post('admin/add-chapter-data', [AdminController::class, 'addChapterData']);
Route::get('/admin/chapter-detail/{id}', [AdminController::class, 'ChapterDetail']);
Route::get("/admin/delete-chapter/{id}",[AdminController::class,"deleteChapter"])->name("/admin/delete-chapter/{id}");
Route::get("/admin/edit-chapter/{id}",[AdminController::class,"EditChapter"])->name("/admin/edit-chapter/{id}");
Route::post('/admin/update-chapter', [AdminController::class, 'UpdateChapter']);
Route::get("/admin/delete-topic/{id}",[AdminController::class,"deleteTopic"])->name("/admin/delete-topic/{id}");
Route::get("/admin/delete-course/{id}",[AdminController::class,"deleteCourse"])->name("/admin/delete-course/{id}");

Route::get('/admin/edit-course', [AdminController::class, 'editCourse'])->name('/admin/edit-course');
Route::post('/admin/update-course', [AdminController::class, 'updateCourse']);

Route::get('/admin/edit-topic', [AdminController::class, 'editTopic'])->name('/admin/edit-topic');
Route::post('admin/update-course-topic', [AdminController::class, 'UpdateCourseTopic']);
Route::post("admin/student/addAddress",[AdminController::class,"addStudentAddress"])->name("admin/student/addAddress");


Route::get('admin/add-workflow', [AdminController::class, 'workflowAdd']);
Route::get('/admin/workflow-status/update', [AdminController::class, 'workflowStatus'])->name('/admin/workflow-status/update');
Route::post('/admin/add-workflow', [AdminController::class, 'addWorkflow']);
Route::get('admin/student/inovice/{id}', [AdminController::class, 'account']);
Route::get('admin/student-account', [AdminController::class, 'studentAccountList'])->name('admin/student-account');
Route::post('/admin/student_invoice', [AdminController::class, 'addInvoice']);
Route::get('admin/student/view-inovice/{id}', [AdminController::class, 'viewInvoice']);
Route::get('admin/workflow', [AdminController::class, 'workflow']);
Route::get('/admin/workflow-detail/{id}', [AdminController::class, 'workflowDetail']);

Route::get('admin/send-invoice', [AdminController::class, 'alreadySendInvoice']);
Route::post('/admin/add-sms-package', [AdminController::class, 'addSmsPackage']);
Route::get('/admin/sms-package-delete/{id}', [AdminController::class, 'smsPackageDelete']);

Route::get('admin/email/package', [AdminController::class, 'getEmailPackage']);

Route::post('/admin/add-email-package', [AdminController::class, 'addEmailPackage']);
Route::get('/admin/email-package-delete/{id}', [AdminController::class, 'emailPackageDelete']);
Route::get('/admin/storage-package-delete/{id}', [AdminController::class, 'storagePackageDelete']);


Route::get('/admin/get-calender', [AdminController::class, 'fullcalender']);
Route::get('/admin/short-course/status', [AdminController::class, 'updateShortCourseStatus'])->name('/admin/short-course/status');
Route::get('admin/get-sms-template', [AdminController::class, 'getSmsTemplate'])->name('admin/get-sms-template');;
Route::post('/admin/add-sms-template', [AdminController::class, 'addSmsTemplate']);
Route::get('/admin/delete-template/{id}', [AdminController::class, 'deleteSmsTemplate']);
Route::get('/admin/edit-template/{id}', [AdminController::class, 'editSmsTemplate']);
Route::post('/admin/update-sms-template', [AdminController::class, 'updateSmsTemplate']);
Route::get('/admin/get-template-data', [AdminController::class, 'getSmsTemplateData'])->name('/admin/get-template-data');
Route::get('/admin/sample-document/category', [AdminController::class, 'getSampleCategory'])->name('/admin/sample-document/category');
Route::post('/admin/add-sample-category', [AdminController::class, 'addSampleCategory']);

Route::get('admin/sample-document/sub-category', [AdminController::class, 'getSampleSubCategory'])->name('admin/sample-document/sub-category');
Route::post('/admin/add-sample-sub-category', [AdminController::class, 'addSampleSubCategory']);

Route::get('admin/sample-document', [AdminController::class, 'getSampleDocument'])->name('admin/sample-document');
Route::post('agent/fetch-subcategory', [AdminController::class, 'fetchSubCategory']);

Route::post('/admin/add-sample-document', [AdminController::class, 'addSampleDocument']);

Route::get('/admin/delete-sample-document/{id}', [AdminController::class, 'deleteSampleDocument']);
Route::get('/admin/sample-document-subcategory/delete/{id}', [AdminController::class, 'deleteSampleDocumentSubcategory']);
Route::get('/admin/sample-document-category/delete/{id}', [AdminController::class, 'deleteSampleDocumentcategory']);

Route::get('/admin/sample-document/edit-category', [AdminController::class, 'editCategory'])->name('/admin/sample-document/edit-category');

Route::post('/admin/update-category', [AdminController::class, 'updateCategory']);
Route::get('/admin/sample-document/edit-subcategory', [AdminController::class, 'editSubCategory'])->name('/admin/sample-document/edit-subcategory');
Route::post('/admin/update-sample-sub-category', [AdminController::class, 'updateSubCategory']);

Route::get('/admin/edit-sample-document', [AdminController::class, 'editSampleDocument'])->name('/admin/edit-sample-document');

Route::post('/admin/update-sample-document', [AdminController::class, 'updateSampleDocument']);

Route::get('admin/storage-package', [AdminController::class, 'getStoragePackage'])->name('admin/storage-package');
Route::post('/admin/add-storag-package', [AdminController::class, 'addStoragePackage']);

Route::get('admin/get-courses-subscription', [AdminController::class, 'getCourseSubcription'])->name('admin/get-courses-subscription');

Route::get('/admin/student-course-subscriptions/{id}', [AdminController::class, 'getStudentCourseSubcriptiondetails'])->name('/admin/student-course-subscriptions/{id}');

Route::get('/admin/edit-sms-package', [AdminController::class, 'editSmsPackage'])->name('/admin/edit-sms-package');

Route::post('/admin/update-sms-package', [AdminController::class, 'updateSmsPackage']);
Route::get('/admin/edit-email-package', [AdminController::class, 'editEmailPackage'])->name('/admin/edit-email-package');
Route::post('/admin/update-email-package', [AdminController::class, 'updateEmailPackage']);
Route::get('/admin/edit-storage-package', [AdminController::class, 'editStoragePackage'])->name('/admin/edit-storage-package');
Route::post('/admin/update-storage-package', [AdminController::class, 'updateStoragePackage']);
Route::get('/admin/online-transcation', [AdminController::class, 'onlineTranscation'])->name('/admin/online-transcation');
Route::get('/admin/offline-transcation', [AdminController::class, 'offlineTranscation'])->name('/admin/offline-transcation');

Route::get('/admin/delete-sms-group/{id}', [AdminController::class, 'deleteSmsGroup']);
Route::get('admin/get-email-template', [AdminController::class, 'getEmailTemplate'])->name('admin/get-email-template');;

Route::post('/admin/add-email-template', [AdminController::class, 'addEmailTemplate']);
Route::get('/admin/delete-email-template/{id}', [AdminController::class, 'deleteEmailTemplate']);

Route::get('/admin/edit-email-template/{id}', [AdminController::class, 'editEmailTemplate']);
Route::post('/admin/update-email-template', [AdminController::class, 'updateEmailTemplate']);
Route::get('/admin/delete-email-group/{id}', [AdminController::class, 'deleteEmailGroup']);
Route::get('/admin/edit-email-group', [AdminController::class, 'editemail'])->name('/admin/edit-email-group');
Route::post('/admin/update-email-group', [AdminController::class, 'updateEmailGroup']);
Route::get('/admin/edit-sms-group', [AdminController::class, 'editsms'])->name('/admin/edit-sms-group');
Route::post('/admin/update-sms-group', [AdminController::class, 'updateSmsGroup']);
Route::get('admin/get-short-course-transcation', [AdminController::class, 'getShortCourseTranscation'])->name('admin/get-short-course-transcation');
Route::get('admin/storage-transcation', [AdminController::class, 'getStorageSubscription'])->name('admin/storage-transcation');

///student routes
Route::post('/studentlogincheck', [StudentController::class, 'studentlogin'])->name('studentlogincheck');
Route::post('/studentregister', [StudentController::class, 'register'])->name('studentregister');
Route::get('/student/profile', [StudentController::class, 'index'])->name('/student/profile');
Route::get("student/logout",[StudentController::class,"logout"])->name("student/logout");
Route::post("student/update",[StudentController::class,"updatestudent"])->name("student/update");
Route::post("student/addAddress",[StudentController::class,"addStudentAddress"])->name("student/addAddress");
Route::post("student/updateAddress",[StudentController::class,"updateStudentAddress"])->name("student/updateAddress");
Route::post("student/addLanguageScore",[StudentController::class,"addLanguageScore"])->name("student/addLanguageScore");
Route::post("student/updateLanguageScore",[StudentController::class,"updateLanguageScore"])->name("student/updateLanguageScore");
Route::post("student/updateGpaScore",[StudentController::class,"updateGpaScore"])->name("student/updateGpaScore");
Route::post("student/addContact",[StudentController::class,"addContact"])->name("student/addContact");
Route::post("student/updateContact",[StudentController::class,"updateContact"])->name("student/updateContact");
Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('/student/dashboard');
Route::get('/student/profile-view', [StudentController::class, 'profileView'])->name('/student/profile-view');
Route::get('/student/activity', [StudentController::class, 'activity'])->name('/student/activity');
Route::get('/student/documents', [StudentController::class, 'documents'])->name('/student/documents');

Route::post("/student/updateSignature",[StudentController::class,"updateSignature"])->name("/student/updateSignature");

Route::post("/student/upload-documents",[StudentController::class,"uploadmultipleimage"])->name("/student/upload-documents");
Route::post("/student/addacademic",[StudentController::class,"addacademicInfo"])->name("/student/addacademic");
Route::post("/student/updateacademic",[StudentController::class,"updateacademicInfo"])->name("/student/updateacademic");
Route::get("student/delete-passport/{id}",[StudentController::class,"deletepassport"])->name("/student/delete-passport");
Route::get("student/delete-marksheet/{id}",[StudentController::class,"deletemarksheet"])->name("/student/delete-marksheet");
Route::get("student/delete-other/{id}",[StudentController::class,"deleteother"])->name("/student/delete-other");
Route::get("student/delete-recommendations/{id}",[StudentController::class,"deleterecommand"])->name("/student/delete-recommendations");
Route::get("student/delete-financials/{id}",[StudentController::class,"deletefinanical"])->name("/student/delete-financials");

Route::get('/student/get-course', [StudentController::class, 'getCourse'])->name('/student/get-course');

Route::get('/student/get-course-topic/{id}', [StudentController::class, 'getCourseTopic'])->name("/student/get-course-topic");
Route::get('/student/get-chapter/{id}', [StudentController::class, 'getChapter'])->name("/student/get-chapter");
Route::get('student/get-chapter-detail/{id}', [StudentController::class, 'getChapterDetail'])->name("/student/get-chapter-detail/{id}");
Route::get('student/get-chapter-detail-pdf/{id}', [StudentController::class, 'getChapterDetailPdf'])->name("/student/get-chapter-detail-pdf/{id}");

Route::get('/student/email-verify/{id}', [StudentController::class, 'studentEmailVerify'])->name("/student/email-verify/{id}");
Route::get('/student/university-course-delete/{id}', [StudentController::class, 'studentUnivCourseDelete'])->name("/student/university-course-delete/{id}");


///agent routes
Route::post('/agentlogincheck', [AgentController::class, 'agentlogin'])->name('agentlogincheck');
Route::post('/agentregister', [AgentController::class, 'register'])->name('agentregister');
Route::get('/agent/member/add', [AgentController::class, 'index'])->name('/agent/member/add');
Route::get('agent/new/member/add', [AgentController::class, 'newmember'])->name('agent/new/member/add');

Route::get("agent/logout",[AgentController::class,"logout"])->name("agent/logout");
Route::post('/agent/studentRegister', [AgentController::class, 'studentRegister'])->name('/agent/studentRegister');
Route::post("agent/addAddress",[AgentController::class,"addStudentAddress"])->name("agent/addAddress");

Route::post("agent/updateAddress",[AgentController::class,"updateStudentAddress"])->name("agent/updateAddress");
Route::post("agent/addLanguageScore",[AgentController::class,"addLanguageScore"])->name("agent/addLanguageScore");
Route::post("agent/updateLanguageScore",[AgentController::class,"updateLanguageScore"])->name("agent/updateLanguageScore");
Route::post("agent/updateGpaScore",[AgentController::class,"updateGpaScore"])->name("agent/updateGpaScore");
Route::post("agent/addContact",[AgentController::class,"addContact"])->name("agent/addContact");
Route::post("agent/updateContact",[AgentController::class,"updateContact"])->name("agent/updateContact");
Route::post("agent/updateSignature",[AgentController::class,"updateSignature"])->name("agent/updateSignature");

Route::get("agent/dashboard",[AgentController::class,"dashboard"])->name("agent/dashboard");
Route::post("agent/addContact",[AgentController::class,"addContact"])->name("agent/addContact");
Route::post("agent/updateContact",[AgentController::class,"updateContact"])->name("agent/updateContact");
Route::post("agent/updateSignature",[AgentController::class,"updateSignature"])->name("agent/updateSignature");
Route::get("agent/member",[AgentController::class,"getmember"])->name("agent/member");
Route::get("agent/member/incomplete",[AgentController::class,"getincompletemember"])->name("agent/member/incomplete");
Route::get("agent/member/complete",[AgentController::class,"getcompletemember"])->name("agent/member/complete");

Route::get("agent/profile",[AgentController::class,"getprofile"])->name("agent/profile");
Route::get("agent/activity",[AgentController::class,"activity"])->name("agent/activity");
Route::post("/agent/addacademic",[AgentController::class,"addacademicInfo"])->name("/agent/addacademic");

Route::post("agent/updateacademic",[AgentController::class,"updateacademicInfo"])->name("/agent/updateacademic");
Route::post("agent/profle-update",[AgentController::class,"updateAgentprofile"])->name("/agent/agent/profle-update");
Route::get("agent/role-permission",[AgentController::class,"rolePermission"])->name("agent/role-permission");
Route::get("/agent/sms-send",[AgentController::class,"smsSend"])->name("/agent/sms-send");
Route::get('agent/document-manage', [AgentController::class, "managedocument"])->name("agent/document-manage");
Route::get('agent/task-manage', [AgentController::class, "managetask"])->name("agent/task-manage");
Route::get('/agent/select-package', [AgentController::class, "selectPackage"])->name("/agent/select-package");
Route::post('agent/payment', [AgentController::class, "payment"])->name("agent/payment");

Route::post('/agent/stripe.post', [AgentController::class, 'stripePost'])->name('/agent/stripe.post');

Route::post('agent/fetch-states', [AgentController::class, 'fetchState']);
Route::post('agent/get-cities-by-state', [AgentController::class, 'getCity']);
Route::get('agent/insitution-list', [AgentController::class, "insitutionList"])->name("agent/insitution-list");

Route::post('agent/package-status', [AgentController::class, "packagestatus"])->name("agent/package-status");

Route::get('agent/add-role', [AgentController::class, "addrolePermission"])->name("agent/add-role");

Route::post('agent/add-role-features', [AgentController::class, 'addroleFeatures'])->name('agent/add-role-features');
Route::get('agent/role/delete/{id}', [AgentController::class, 'roledelete'])->name('agent/role/delete/{id}');

Route::get('agent/edit-role/{id}', [AgentController::class, 'editRole']);

Route::post('agent/update-role-features', [AgentController::class, 'updateroleFeatures'])->name('agent/update-role-features');

Route::get('agent/checkout', [AgentController::class, 'checkout'])->name('agent/checkout');
Route::get('/agent/lead-manage', [AgentController::class, 'leadmanage'])->name('/agent/lead-manage');

Route::post('/agent/add-lead', [AgentController::class, 'addLead'])->name('/agent/add-lead');
Route::post('/agent/delete-lead/{id}', [AgentController::class, 'leaddelete']);

Route::get('agent/support', [AgentController::class, 'support'])->name('agent/support');
Route::get('agent/add-support', [AgentController::class, 'addsupport'])->name('agent/add-support');
Route::post('agent/add-support-data', [AgentController::class, 'addsupportdata'])->name('agent/add-support-data');
Route::get('/agent/complete-lead-manage', [AgentController::class, 'completeleadmanage'])->name('/agent/complete-lead-manage');
Route::get('/agent/role-lead-manage', [AgentController::class, 'roleleadmanage'])->name('/agent/role-lead-manage');
Route::get("/agent/changeLeadStatus",[AgentController::class,"changeStatus"])->name("/agent/changeLeadStatus");
Route::get('/agent/complete-role-lead-manage', [AgentController::class, 'completeroleleadmanage'])->name('/agent/complete-role-lead-manage');
Route::post('agent/assign-staff', [AgentController::class, 'assignstaff'])->name('agent/assign-staff');
Route::get('agent/student/delete/{id}', [AgentController::class, 'studentdelete']);
Route::get('/agent/application', [AgentController::class, 'application'])->name('/agent/application');
Route::get('agent/check-application/{id}', [AgentController::class, 'checkapplication']);
Route::post('/agent/updatestudent', [AgentController::class, 'updatestudent']);
Route::get('agent/checked-application/{id}', [AgentController::class, 'checkedapplication']);
Route::post('agent/add-task', [AgentController::class, 'addtask'])->name('agent/add-task');
Route::get('agent/assign-task', [AgentController::class, 'assignTask']);
Route::get('agent/complete-task/{id}', [AgentController::class, 'completetask']);
Route::get("/agent/cancelstatus",[AgentController::class,"cancelChangeStatus"])->name("/agent/cancelstatus");
Route::get("agent/cancel-task",[AgentController::class,"canceltask"])->name("agent/cancel-task");
Route::get("agent/complete-task",[AgentController::class,"completedtask"])->name("agent/complete-task");
Route::get('/agent/send-email', [AgentController::class, 'sendEmail']);
Route::post('/agent/email', [AgentController::class, 'sendSingleEmail']);
Route::post('/agent/send-email-group', [AgentController::class, 'sendGroupEmail']);
Route::get('/agent/get-group', [AgentController::class, 'getgroup']);
Route::post('/agent/add-group', [AgentController::class, 'addGroup']);
Route::get('/agent/add-group-members/{id}', [AgentController::class, 'addGroupMember']);
Route::post('agent/add-members', [AgentController::class, 'addMembers']);
Route::get('/agent/get-emails', [AgentController::class, 'getEmail']);

Route::post('/agent/send-sms', [AgentController::class, 'sendSms']);
Route::post('/agent/send-group-smss', [AgentController::class, 'GroupSmsSend']);

Route::get('/agent/get-sms-group', [AgentController::class, 'getsmsgroup']);
Route::post('/agent/add-sms-group', [AgentController::class, 'addSmsGroup']);
Route::get('/agent/add-sms-group-members/{id}', [AgentController::class, 'addSmsGroupMember']);
Route::post('agent/add-sms-members', [AgentController::class, 'addSmsMembers']);
Route::post('/agent/get-member', [AgentController::class, 'getList']);
Route::get('/agent/get-sms', [AgentController::class, 'getSms']);
Route::get('/agent/workflow', [AgentController::class, 'workflow']);
Route::get('/agent/workflow-detail/{id}', [AgentController::class, 'workflowDetail']);
Route::get('/agent/email-verify/{id}', [AgentController::class, 'EmailVerify'])->name("/agent/email-verify/{id}");
Route::get('/agent/account', [AgentController::class, 'account']);
Route::get('/agent/student-view/{id}', [AgentController::class, 'studentView']);
Route::get('/agent/student-invoice', [AgentController::class, 'studentInvoice']);

Route::post('agent/fetch-course', [AgentController::class, 'fetchCourse']);
Route::get('/agent/workflow-pending/{workflow_id}/{student_id}', [AgentController::class, 'workflowPending']);
Route::get('/agent/workflow-reject/{workflow_id}/{student_id}', [AgentController::class, 'workflowReject']);
Route::get('/agent/workflow-complete/{workflow_id}/{student_id}', [AgentController::class, 'workflowComplete']);
Route::get('/agent/calender', [AgentController::class, 'calender']);

Route::get('/agent/sms-package', [AgentController::class, 'getsmsPackage']);
Route::get('/agent/email-package', [AgentController::class, 'getemailPackage']);
Route::get('/agent/email-package/payment/{id}', [AgentController::class, 'emailPackagePayment']);
Route::get('/agent/sms-package/payment/{id}', [AgentController::class, 'smsPackagePayment']);


Route::get('/agent/staff/get-calender', [AgentController::class, 'fullcalender']);
Route::post('/agent/staff/fullcalenderAjax', [AgentController::class, 'ajax']);
Route::get('agent/sample-document', [AgentController::class, 'sampleDocument']);
Route::post('/agent/search-sample-document', [AgentController::class, 'sampleDocument']);
Route::get('/agent/sample-pdf/{id}', [AgentController::class, 'downloadsample']);
Route::get('agent/get-document', [AgentController::class, 'getDocument'])->name("/agent/get-document");;

Route::get('agent/get-document/{value}', [AgentController::class, 'getDocumentFolder']);

Route::Post('/agent/create-document-folder', [AgentController::class, 'createDocumentFolder']);
Route::Post('/agent/create-document-sub-folder', [AgentController::class, 'createDocumentSubFolder']);

Route::Post('/agent/create-folder-file', [AgentController::class, 'createFile']);
Route::Post('/agent/create-sub-folder-file', [AgentController::class, 'createSubFolderFile']);

Route::get('agent/get-storage-package', [AgentController::class, 'getStoragePackage']);

Route::Post('/agent/sms-package-payment', [AgentController::class, 'smsPackagePaymentSend']);

Route::Post('/agent/email-package-payment', [AgentController::class, 'emailPackagePaymentSend']);

Route::get('/agent/get-files/{value}', [AgentController::class, 'getFiles']);
Route::Post('/agent/create-sub-file', [AgentController::class, 'createFolderFile']);

Route::get('/agent/storage-package/payment/{id}', [AgentController::class, 'storagePackagePayment']);

Route::Post('/agent/storage-package-payment', [AgentController::class, 'storagePackagePaymentSend']);

Route::get('/agent/get-sms-template', [AgentController::class, 'getsmstemplate'])->name('/agent/get-sms-template');;

Route::post('/agent/add-sms-template', [AgentController::class, 'addSmsTemplate']);

Route::get('/agent/delete-template/{id}', [AgentController::class, 'deleteSmsTemplate']);

Route::get('/agent/get-template-data', [AgentController::class, 'getSmsTemplateData'])->name('/agent/get-template-data');
Route::get('/agent/edit-template/{id}', [AgentController::class, 'editSmsTemplate']);
Route::post('/agent/update-sms-template', [AgentController::class, 'updateSmsTemplate']);
Route::post("/agent/upload-documents",[AgentController::class,"uploadmultipleimage"])->name("/agent/upload-documents");
Route::get('/agent/edit-task', [AgentController::class, 'editTask'])->name('/agent/edit-task');
Route::post('agent/update-task', [AgentController::class, 'updateTask']);
Route::post('agent/self-update-task', [AgentController::class, 'selfUpdateTask']);


Route::get("/agent/changeTaskStatus",[AgentController::class,"changeTaskStatus"])->name("/agent/changeTaskStatus");

Route::get('/agent/get-email-template', [AgentController::class, 'getemailtemplate'])->name('/agent/get-email-template');;
Route::post('/agent/add-email-template', [AgentController::class, 'addEmailTemplate']);
Route::get('/agent/delete-email-template/{id}', [AgentController::class, 'deleteEmailTemplate']);
Route::get('/agent/edit-email-template', [AgentController::class, 'editEmailTemplate'])->name('/agent/edit-email-template');
Route::post('/agent/update-email-template', [AgentController::class, 'updateEmailTemplate']);

Route::get('/agent/get-email-template-data', [AgentController::class, 'getEmailTemplateData'])->name('/agent/get-email-template-data');
Route::get('/agent/self-task-manage', [AgentController::class, 'getSelfTask'])->name('/agent/self-task-manage');
Route::post('/agent/add-agent-task', [AgentController::class, 'addAgenttask']);
Route::post("/agent/upload-documents",[AgentController::class,"uploadmultipleimage"])->name("/agent/upload-documents");

Route::get("agent/delete-passport/{id}",[AgentController::class,"deletepassport"])->name("/agent/delete-passport");
Route::get("agent/delete-marksheet/{id}",[AgentController::class,"deletemarksheet"])->name("/agent/delete-marksheet");
Route::get("agent/delete-other/{id}",[AgentController::class,"deleteother"])->name("/agent/delete-other");
Route::get("agent/delete-recommendations/{id}",[AgentController::class,"deleterecommand"])->name("/agent/delete-recommendations");
Route::get("agent/delete-financials/{id}",[AgentController::class,"deletefinanical"])->name("/agent/delete-financials");

Route::get('agent/get-payment', [AgentController::class, 'getPayment'])->name('agent/get-payment');
Route::get('/agent/view-sample-pdf/{id}', [AgentController::class, 'viewsample']);
Route::get('agent/student-list/{id}', [AgentController::class, 'getInsitutionStudent']);
Route::get('/agent/deletefile', [AgentController::class, 'deletefile'])->name('/agent/deletefile');
Route::get('/agent/edit-file', [AgentController::class, 'editFile'])->name('/agent/edit-file');
Route::post('/agent/update-document-folder', [AgentController::class, 'updateDocumentFolder']);

// insitution routes
Route::post('/institutionlogincheck', [InstitutionController::class, 'institutionlogin'])->name('institutionlogincheck');

Route::post('/institutionregister', [InstitutionController::class, 'institutionregister'])->name('institutionregister');

Route::get('/institution/dashboard', [InstitutionController::class, 'institutiondashboard'])->name('/institution/dashboard');

Route::get('/institution/index', [InstitutionController::class, 'institutionindex'])->name('/institution/index');

Route::get('/institution/manage-courses', [InstitutionController::class, 'coursestable'])->name('institution/manage-courses');

Route::get('/institution/add-courses', [InstitutionController::class, 'addCourses'])->name('institution/add-courses');

Route::get('/institution/add-fees', [InstitutionController::class, 'addFees'])->name('institution/add-fees');
Route::post('/institution/addFees', [InstitutionController::class, 'add_fees']);

Route::post('/course/update', [InstitutionController::class, 'courseupdate']);


Route::post('/institution/addCourses', [InstitutionController::class, 'addCourse'])->name('addCourses');

Route::get('/institution/logout', [InstitutionController::class, 'logout'])->name('institution/logout');


Route::get('/changeCourseStatus', [InstitutionController::class, 'updateCourseStatus']);

Route::get('/course/edit/{id}', [InstitutionController::class, 'courseedit']);
Route::post('/course/update', [InstitutionController::class, 'courseupdate']);


Route::post('/course/delete/{id}', [InstitutionController::class, 'coursedelete']);
Route::post('/institution/addinstitution', [InstitutionController::class, 'adduniversity']);
Route::post('/institution/updateinstitutioninfo', [InstitutionController::class, 'updateinstitutioninfo']);
Route::post('/institution/aboutInfo', [InstitutionController::class, 'updateaboutInfo']);
Route::post('/institution/updatevideo', [InstitutionController::class, 'updatevideo']);

Route::get('/institution/manage-fees', [InstitutionController::class, 'manageFees'])->name('/institution/manage-fees');
Route::get('/fees/edit/{id}', [InstitutionController::class, 'feesedit']);
Route::post('/fees/update', [InstitutionController::class, 'feesupdate']);
Route::post('/fees/delete/{id}', [InstitutionController::class, 'feesdelete']);
Route::post('/institution/uploadmultipleimage', [InstitutionController::class, 'uploadmultipleimage']);

Route::get('/institution/manage-requirements', [InstitutionController::class, 'manageRequirements'])->name('/institution/manage-requirements');
Route::get('/institution/add-requirements', [InstitutionController::class, 'add_requirements']);
Route::post('/institution/addrequirements', [InstitutionController::class, 'addrequirements']);
Route::post('/requirement/delete/{id}', [InstitutionController::class, 'requirementdelete']);
Route::get('/requirement/edit/{id}', [InstitutionController::class, 'requirementedit']);
Route::post('/requirement/update', [InstitutionController::class, 'requirementupdate']);
Route::get('/institution/manage-branch', [InstitutionController::class, 'managebranch'])->name('/institution/manage-branch');
Route::get('/institution/add-branch', [InstitutionController::class, 'addBranch'])->name('institution/add-branch');
Route::post('/institution/addBranch', [InstitutionController::class, 'add_Branch'])->name('addBranch');
Route::get('/branch/edit/{id}', [InstitutionController::class, 'branchedit']);
Route::post('/branch/update', [InstitutionController::class, 'branchupdate']);
Route::post('/glance/update', [InstitutionController::class, 'updateGlance']);
Route::get('/glance/delete/{id}', [InstitutionController::class, 'glancedelete']);

Route::get('/institution/role-permission', [InstitutionController::class, 'rolePermission'])->name("/institution/role-permission");;

Route::get("institution/sms-send",[InstitutionController::class,"smsSend"])->name("institution/sms-send");

Route::get('/institution/document-manage', [InstitutionController::class, 'managedocument']);

Route::get("institution/task-manage",[InstitutionController::class,"managetask"])->name("institution/task-manage");

Route::get('/institution/manage-commission', [InstitutionController::class, 'managecommission'])->name('/institution/manage-commission');
Route::post('institution/add-commission', [InstitutionController::class, 'addCommission']);

Route::get('/institution/delete-commission/{id}', [InstitutionController::class, 'deleteCommission']);

Route::get('institution/edit-commission/{id}', [InstitutionController::class, 'editCommission']);

Route::get('institution/add-role', [InstitutionController::class, 'addRole']);

Route::post('institution/add-role-features', [InstitutionController::class, 'addroleFeatures'])->name('institution/add-role-features');
Route::get('institution/role/delete/{id}', [InstitutionController::class, 'roledelete'])->name('institution/role/delete/{id}');
Route::get('institution/edit-role/{id}', [InstitutionController::class, 'editRole']);

Route::post('institution/update-role-features', [InstitutionController::class, 'updateroleFeatures'])->name('institution/update-role-features');

Route::get('/institution/lead-manage', [InstitutionController::class, 'leadmanage'])->name('/institution/lead-manage');
Route::get('/institution/role-lead-manage', [InstitutionController::class, 'roleleadmanage'])->name('/institution/role-lead-manage');

Route::post('/institution/add-lead', [InstitutionController::class, 'addLead'])->name('/institution/add-lead');

Route::post('/institution/delete-lead/{id}', [InstitutionController::class, 'leaddelete']);
Route::get('/institution/support', [InstitutionController::class, 'support'])->name('/institution/support');

Route::get('/institution/add-support', [InstitutionController::class, 'addsupport'])->name('/institution/add-support');
Route::post('institution/add-support-data', [InstitutionController::class, 'addsupportdata'])->name('institution/add-support-data');
Route::get('/institution/complete-lead-manage', [InstitutionController::class, 'completeleadmanage'])->name('/institution/complete-lead-manage');
Route::get('/institution/role-complete-lead-manage', [InstitutionController::class, 'rolecompleteleadmanage'])->name('/institution/role-complete-lead-manage');

Route::get("/institution/changeLeadStatus",[InstitutionController::class,"changeStatus"])->name("/institution/changeLeadStatus");
Route::get("/institution/leadchangeStatus",[InstitutionController::class,"leadchangeStatus"])->name("/institution/leadchangeStatus");

Route::get("/institution/studentlist",[InstitutionController::class,"studentlist"])->name("/institution/studentlist");
Route::get("/institution/application",[InstitutionController::class,"applicationlist"])->name("/institution/application");
Route::get("/institution/check-application/{id}",[InstitutionController::class,"checkapplication"])->name("/institution/check-application/{id}");
Route::get("/institution/recheck-application/{id}",[InstitutionController::class,"recheckapplicationStatus"])->name("/institution/recheck-application/{id}");
Route::get("/institution/complete-application/{id}",[InstitutionController::class,"completeapplicationStatus"])->name("/institution/complete-application/{id}");
Route::get('/institution/task-manage', [InstitutionController::class, "managetask"])->name("/institution/task-manage");
Route::post('/institution/add-task', [InstitutionController::class, 'addtask'])->name('/institution/add-task');
Route::get("/institution/cancel-task",[InstitutionController::class,"canceltask"])->name("/institution/cancel-task");
Route::get("/institution/complete-task",[InstitutionController::class,"completedtask"])->name("/institution/complete-task");
Route::get('/institution/assign-task', [InstitutionController::class, 'assignTask']);
Route::get('/institution/complete-task/{id}', [InstitutionController::class, 'completetask']);
Route::get("/institution/cancelstatus",[InstitutionController::class,"cancelChangeStatus"])->name("/institution/cancelstatus");
Route::get('/institution/send-email', [InstitutionController::class, 'sendEmail']);
Route::post('/institution/email', [InstitutionController::class, 'sendSingleEmail']);
Route::post('/institution/send-email-group', [InstitutionController::class, 'sendGroupEmail']);

Route::get('/institution/get-group', [InstitutionController::class, 'getgroup']);
Route::post('/institution/add-group', [InstitutionController::class, 'addGroup']);
Route::get('/institution/add-group-members/{id}', [InstitutionController::class, 'addGroupMember']);
Route::post('institution/add-members', [InstitutionController::class, 'addMembers']);
Route::get('/institution/get-emails', [InstitutionController::class, 'getEmail']);
Route::post('/institution/send-sms', [InstitutionController::class, 'sendSms']);
Route::get('/institution/get-sms-group', [InstitutionController::class, 'getsmsgroup']);
Route::post('/institution/add-sms-group', [InstitutionController::class, 'addSmsGroup']);
Route::get('/institution/add-sms-group-members/{id}', [InstitutionController::class, 'addSmsGroupMember']);
Route::post('institution/add-sms-members', [InstitutionController::class, 'addSmsMembers']);
Route::post('/institution/send-group-smss', [InstitutionController::class, 'GroupSmsSend']);
Route::get('/institution/get-sms', [InstitutionController::class, 'getSms']);
Route::post('/institution/get-member', [InstitutionController::class, 'getList']);

Route::get('/institution/workflow', [InstitutionController::class, 'workflow']);
Route::get('/institution/email-verify/{id}', [InstitutionController::class, 'EmailVerify'])->name("/institution/email-verify/{id}");
Route::get('/institution/account', [InstitutionController::class, 'account']);
Route::get('/institution/calender', [InstitutionController::class, 'calender']);
Route::get('/institution/invoice', [InstitutionController::class, 'invoice']);

Route::get('/institution/sms-package', [InstitutionController::class, 'getsmsPackage']);
Route::get('/institution/email-package', [InstitutionController::class, 'getemailPackage']);
Route::get('/institution/email-package/payment/{id}', [InstitutionController::class, 'emailPackagePayment']);
Route::get('/institution/sms-package/payment/{id}', [InstitutionController::class, 'smsPackagePayment']);
Route::get('/institution/staff/get-calender', [InstitutionController::class, 'fullcalender']);

Route::Post('/institution/sms-package-payment', [InstitutionController::class, 'smsPackagePaymentSend']);

Route::Post('/institution/email-package-payment', [InstitutionController::class, 'emailPackagePaymentSend']);

Route::get('institution/get-storage-package', [InstitutionController::class, 'getStoragePackage']);

Route::get('/institution/storage-package/payment/{id}', [InstitutionController::class, 'storagePackagePayment']);

Route::Post('/institution/storage-package-payment', [InstitutionController::class, 'storagePackagePaymentSend']);


Route::get('institution/get-document', [InstitutionController::class, 'getDocument']);
Route::Post('/institution/create-folder-file', [InstitutionController::class, 'createFile']);
Route::Post('/institution/create-document-folder', [InstitutionController::class, 'createDocumentFolder']);
Route::get('institution/get-document/{value}', [InstitutionController::class, 'getDocumentFolder']);
Route::Post('/institution/create-sub-folder-file', [InstitutionController::class, 'createSubFolderFile']);
Route::Post('/institution/create-document-sub-folder', [InstitutionController::class, 'createDocumentSubFolder']);
Route::get('/institution/get-files/{value}', [InstitutionController::class, 'getFiles']);

Route::Post('/institution/create-sub-file', [InstitutionController::class, 'createFolderFile']);

Route::get('/institution/get-sms-template', [InstitutionController::class, 'getsmstemplate'])->name('/institution/get-sms-template');;

Route::post('/institution/add-sms-template', [InstitutionController::class, 'addSmsTemplate']);

Route::get('/institution/delete-template/{id}', [InstitutionController::class, 'deleteSmsTemplate']);

Route::get('/institution/get-template-data', [InstitutionController::class, 'getSmsTemplateData'])->name('/institution/get-template-data');

Route::get('institution/edit-template/{id}', [InstitutionController::class, 'editSmsTemplate']);
Route::post('/institution/update-sms-template', [InstitutionController::class, 'updateSmsTemplate']);

Route::get("/institution/changeInvoiceStatus",[InstitutionController::class,"changeInvoiceStatus"])->name("/institution/changeInvoiceStatus");
Route::get('/institution/get-email-template', [InstitutionController::class, 'getemailtemplate'])->name('/institution/get-email-template');;

Route::post('/institution/add-email-template', [InstitutionController::class, 'addEmailTemplate']);
Route::get('/institution/delete-email-template/{id}', [InstitutionController::class, 'deleteEmailTemplate']);
Route::get('/institution/edit-email-template', [InstitutionController::class, 'editEmailTemplate'])->name('/institution/edit-email-template');
Route::get("/institution/changeTaskStatus",[InstitutionController::class,"changeTaskStatus"])->name("/institution/changeTaskStatus");
Route::post('institution/update-task', [InstitutionController::class, 'updateTask']);

Route::post('/institution/update-email-template', [InstitutionController::class, 'updateEmailTemplate']);

Route::get('/institution/self-task-manage', [InstitutionController::class, "getSelfTask"])->name("/institution/self-task-manage");
Route::post('institution/add-self-task', [InstitutionController::class, 'addselftask'])->name('institution/add-self-task');
Route::post('institution/assign-staff', [InstitutionController::class, 'assignstaff'])->name('institution/assign-staff');


Route::get('/institution/get-email-template-data', [InstitutionController::class, 'getEmailTemplateData'])->name('/institution/get-email-template-data');

Route::get('/institution/edit-task', [InstitutionController::class, 'editTask'])->name('/institution/edit-task');

Route::get('/university/search/country/{value}', [HomeController::class, 'FindExplorebestuniversitiesByCountry'])->name('/university/searchs/country/{value}');

Route::get('/university/searchs/{value}', [HomeController::class, 'FindExplorebestuniversitiesss'])->name('/university/searchs/{value}');

Route::get('institution/searchUniverByCourse', [HomeController::class, 'searchUniverByCourse'])->name('institution/searchUniverByCourse');

Route::get('/institution/delete-branch/{id}', [InstitutionController::class, 'deletebranch']);


Route::get('institution/searchUniverByName', [HomeController::class, 'searchUniverByName'])->name('institution/searchUniverByName');
Route::get('/institution/deletefile', [InstitutionController::class, 'deletefile'])->name('/institution/deletefile');
Route::get('/institution/edit-file', [InstitutionController::class, 'editFile'])->name('/institution/edit-file');
Route::post('/institution/update-document-folder', [InstitutionController::class, 'updateDocumentFolder']);
