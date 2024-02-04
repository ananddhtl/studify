<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Studify Admin </title>
    <meta name="description" content="Studify Admin ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="{{asset('assets/admin/image/png')}}" sizes="60x60" href="{{asset('assets/images/fav.png')}}">
    <link rel="icon" type="{{asset('assets/admin/image/png')}}" sizes="96x96" href="{{asset('assets/images/fav.png')}}">
    <link rel="icon" type="{{asset('assets/admin/image/png')}}" sizes="60x60" href="{{asset('assets/images/fav.png')}}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/admin/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('assets/admin/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{asset('assets/admin/images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('assets/admin/images/logo2.png')}}"
                        alt="Logo"></a>
            </div>

            @if(Session::get('role') == 'admin')

            <div id="main-menu" class="main-menu navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('admin/dashboard') }}"> <i class="menu-icon fa fa-dashboard"
                                id="mm"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Manage</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-graduation-cap" aria-hidden="true" id="icn"></i>
                            Manage Student</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-student') }}">Students</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-users" aria-hidden="true" id="icn"></i> Manage
                            Agent</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-agent') }}">Agents</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-university" aria-hidden="true" id="icn"></i> Manage
                            Institution</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a
                                    href="{{ url('admin/manage-institution') }}">Institutions</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-clone" aria-hidden="true" id="icn"></i> Manage
                            Blogs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-blog') }}">Blogs</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-gift" aria-hidden="true" id="icn"></i> Manage
                            Coupon</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-coupon') }}">Coupons</a></li>

                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-comment-o" aria-hidden="true" id="icn"></i> Manage
                            FAQ</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-student-faq') }}">Student
                                    FAQ</a></li>
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-agent-faq') }}">Agent FAQ</a>
                            </li>
                            <li><i class="fa fa-table"></i><a
                                    href="{{ url('admin/manage-institution-faq') }}">Institution FAQ</a></li>
                        </ul>
                    </li>



                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-lock" aria-hidden="true" id="icn" id="icn"></i>
                            Support</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/support')}}">Pending</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/support-complete')}}">Complete</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-building" aria-hidden="true" id="icn"></i>
                            Academy</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/get-courses')}}">Courses</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/get-courses-subscription')}}">Courses
                                    Subscriptions</a></li>
                            <li><i class="fa fa-table"></i><a
                                    href="{{url('admin/get-short-course-transcation')}}">Transcations</a></li>


                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-gears" aria-hidden="true" id="icn"></i> Accounts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/student-account')}}">Invoice</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/send-invoice')}}">Sent Invoice</a></li>


                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-commenting-o" aria-hidden="true" id="icn"></i>
                            SMS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/get-sms-template')}}">Add SMS
                                    Template</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/sms-list')}}">SMS Package</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/send-sms')}}">Send SMS</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/get-sms-group')}}">Group</a></li>

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-tasks" aria-hidden="true" id="icn"></i> Manage
                            Application</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/application-list')}}">New
                                    Application</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/assign-application-list')}}">Assigned
                                    Application</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/pending-application')}}">Pending</a>
                            </li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/complete-application')}}">Complete</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-lock" aria-hidden="true" id="icn" id="icn"></i> Lead
                            Manager</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('/admin/lead-manage')}}">Leads</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/complete-lead-manage')}}">Complete</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-file-text" aria-hidden="true" id="icn" id="icn"></i>
                            Report</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('/admin/student-report')}}">Student</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/agent-report')}}">Agent</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/insitution-report')}}">Insitution</a>
                            </li>
                        </ul>
                    </li>



                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-comment-o" aria-hidden="true" id="icn"></i> Manage
                            Workflow</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/workflow') }}"> Workflow</a></li>
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/add-workflow') }}">Add Workflow</a>
                            </li>
                        </ul>
                    </li>


                    <li class="menu-item">
                        <a href="{{url('admin/manage-package')}}" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-archive" aria-hidden="true" id="icn" id="icn"></i>
                            Manage Package</a>
                    </li>


                    <li class="menu-item">
                        <a href="{{url('admin/role-permission')}}" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-key" aria-hidden="true" id="icn" id="icn"></i> Roles
                            & Permissions</a>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-file" aria-hidden="true" id="icn"></i>Manage
                            Documents</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/storage-package')}}">Packages</a></li>
                            <li><i class="fa fa-table"></i><a
                                    href="{{url('admin/storage-transcation')}}">Transcation</a></li>


                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-envelope-o" aria-hidden="true" id="icn"></i> Manage
                            Email</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/get-email-template')}}">Email
                                    Template</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/email/package')}}"> Email Packages</a>
                            </li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/send-email')}}">Send Email</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/get-group')}}">Group</a></li>


                        </ul>
                    </li>



                    <li class="menu-item">
                        <a href="{{url('/admin/get-calender')}}" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-calendar" aria-hidden="true" id="icn" id="icn"></i>
                            Calendar</a>
                    </li>



                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-lock" aria-hidden="true" id="icn" id="icn"></i> Task
                        </a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/task-manage')}}">Create Task</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/cancel-task')}}">Cancel</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/task-complete')}}">Complete</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-comment-o" aria-hidden="true" id="icn"></i> Sample
                            Document</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a
                                    href="{{ url('admin/sample-document/category') }}">Category</a></li>
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/sample-document/sub-category') }}">Sub
                                    Category</a></li>
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/sample-document') }}">Upload
                                    Document</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-lock" aria-hidden="true" id="icn" id="icn"></i>Course
                            Transcation</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('/admin/online-transcation')}}">Online</a>
                            </li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/offline-transcation')}}">Offline</a>
                            </li>
                        </ul>
                    </li>



                    <!-- /.menu-title -->
                </ul>
            </div>

            @elseif(Session::get('role') == 'other')
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('admin/dashboard') }}"> <i class="menu-icon fa fa-dashboard"
                                id="mm"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Manage</h3><!-- /.menu-title -->


                    @foreach (Session::get('rolefeature') as $features)
                    @if($features == 'managestudent')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-graduation-cap" aria-hidden="true" id="icn"></i>
                            Manage Student</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-student') }}">Students</a></li>
                        </ul>
                    </li>


                    @endif

                    @if($features == 'manageagent')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-users" aria-hidden="true" id="icn"></i> Manage
                            Agent</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-agent') }}">Agents</a></li>
                        </ul>
                    </li>
                    @endif

                    @if($features == 'manageinsitution')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-university" aria-hidden="true" id="icn"></i> Manage
                            Institution</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a
                                    href="{{ url('admin/manage-institution') }}">Institutions</a></li>
                        </ul>
                    </li>
                    @endif

                    @if($features == 'manageblog')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-clone" aria-hidden="true" id="icn"></i> Manage
                            Blogs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-blog') }}">Blogs</a></li>
                        </ul>
                    </li>
                    @endif

                    @if($features == 'managefaq')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-comment-o" aria-hidden="true" id="icn"></i> Manage
                            FAQ</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-student-faq') }}">Student
                                    FAQ</a></li>
                            <li><i class="fa fa-table"></i><a href="{{ url('admin/manage-agent-faq') }}">Agent FAQ</a>
                            </li>
                            <li><i class="fa fa-table"></i><a
                                    href="{{ url('admin/manage-institution-faq') }}">Institution FAQ</a></li>
                        </ul>
                    </li>

                    @endif

                    @if($features == 'managesms')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-commenting-o" aria-hidden="true" id="icn"></i>
                            SMS</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/sms-list')}}">SMS Package</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/send-sms')}}">Send SMS</a></li>
                        </ul>
                    </li>
                    @endif

                    @if($features == 'managesupport')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-lock" aria-hidden="true" id="icn" id="icn"></i>
                            Support</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/support')}}">Pending</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/support-complete')}}">Complete</a></li>
                        </ul>
                    </li>
                    @endif

                    @if($features == 'managepackage')
                    <li class="menu-item">
                        <a href="{{url('admin/manage-package')}}" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-archive" aria-hidden="true" id="icn" id="icn"></i>
                            Manage Package</a>
                    </li>
                    @endif

                    @if($features == 'managerole')
                    <li class="menu-item">
                        <a href="{{url('admin/role-permission')}}" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-key" aria-hidden="true" id="icn" id="icn"></i> Role &
                            Permission</a>
                    </li>
                    @endif

                    @if($features == 'managedocument')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-file" aria-hidden="true" id="icn"></i>Manage
                            Documents</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/storage-package')}}">Packages</a></li>
                            <li><i class="fa fa-table"></i><a
                                    href="{{url('admin/storage-transcation')}}">Transcation</a></li>


                        </ul>
                    </li>

                    @endif

                    @if($features == 'manageemail')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-envelope-o" aria-hidden="true" id="icn"></i> Manage
                            Email</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{url('admin/get-email-template')}}">Email
                                    Template</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/email/package')}}"> Email Packages</a>
                            </li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/send-email')}}">Send Email</a></li>
                            <li><i class="fa fa-table"></i><a href="{{url('admin/get-group')}}">Group</a></li>


                        </ul>
                    </li>
                    @endif

                    @if($features == 'managecalender')
                    <li class="menu-item">
                        <a href="{{url('/admin/get-calender')}}" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-calendar" aria-hidden="true" id="icn" id="icn"></i>
                            Calendar</a>
                    </li>

                    @endif

                    @if($features == 'managetask')
                    <li class="menu-item">
                        <a href="{{url('admin/assign-task')}}" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-tasks" aria-hidden="true" id="icn" id="icn"></i>
                            Tasks</a>
                    </li>
                    @endif

                    @if($features == 'managelead')
                    <li class="menu-item">
                        <a href="{{url('/admin/lead-manage')}}" class="dropdown-toggle" aria-haspopup="true"
                            aria-expanded="false"> <i class="fa fa-lock" aria-hidden="true" id="icn" id="icn"></i> Lead
                            Manager</a>
                    </li>
                    @endif



                    @endforeach

                    @else
                    <script>
                    window.location = "/admin";
                    </script>

                    @endif
                    <!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>



                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            @if(Session::get('role') == 'admin')
                            <img class="user-avatar rounded-circle"
                                src="{{asset('public/AdminImage/'.session()->get('adminimage'))}}" alt="User Avatar">
                            @else
                            <img class="user-avatar rounded-circle" src="{{asset('/public/AgentImage/noImage.webp')}}"
                                alt="User Avatar">
                            @endif
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{url('admin/admin-profile')}}"><i class="fa fa-user"></i> My
                                Profile</a>
                            <a class="nav-link" href="{{ url('admin/logout') }}"><i class="fa fa-power-off"></i>
                                Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <script src="{{asset('assets/js/scroll.js')}}"></script>
</body>
<!--end::Body-->

</html>