<header class="ab-site-header header navbar navbar-expand-md navbar-dark navbar-sticky navbar-floating bg-blue">
    <div class="container px-0 px-xl-3">
        <a class="navbar-brand order-md-1 me-md-5 me-0 pe-lg-2 mx-sm-start" href="{{url('/')}}">
            <img class="navbar-brand-static " src="{{asset('assets/images/7C217B53-4E1D-4469-83DB-24C59D5F0C1A1.png')}}"
                 alt="ApplyBridge -Logo" width="200">
            
        </a>

                

        @if(Session::get('login') == '')
                    <div class="d-flex order-3">
            <div class="dropdown mx-2 order-md-3 login-header">
                <a class="btn btn-outline-login btn-sm rounded-pill dropdown-toggle d-sm-block" href="#" role="button"
                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Login
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{url('member/login')}}">Student</a></li>
                    <li><a class="dropdown-item" href="{{url('agent/login')}}">Counselor</a></li>
                <li><a class="dropdown-item" href="{{url('institution/login')}}">Institution</a></li>

                </ul>
            </div>
            <div class="dropdown order-md-3">
                <a class="btn btn-success btn-sm rounded-pill dropdown-toggle d-sm-block" href="#" role="button"
                   id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Register
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{url('member/register')}}">Student</a></li>
                    <li><a class="dropdown-item" href="{{url('agent/register')}}">Counselor</a></li>
                     <li><a class="dropdown-item" href="{{url('institution/register')}}">Institution</a></li>
                </ul>
            </div>
            <button class="navbar-toggler ms-1 me-n3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse1" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        @endif




        <nav class="collapse navbar-collapse order-md-2" id="navbarCollapse1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown search-dd">
                    <a class="nav-link dropdown-toggle border-bottom px-0 pb-1" href="#" data-bs-toggle="dropdown"><i
                                class="ri-search-line  align-middle me-3"></i> <span class="pe-5 fst-italic">Help me with…</span></a>
                    <ul class="dropdown-menu mt-0">
                    <li><a class="dropdown-item" href="{{url('agent/search')}}">Find Agents </a></li>

                    @if(Session::get('login'))
                                
                        <li><a class="dropdown-item" href="{{url('/university/search')}}">Finding my dream university </a></li>
@endif

                        <li><a class="dropdown-item" href="https://studify.au/blog-details/Unveiling-the-Wonders-of-Studying-in-Australia">Why Study in Australia</a></li>
                        <li><a class="dropdown-item" href="https://studify.au/blog-details/Unlocking-the-Doors-to-Excellence:-The-Benefits-of-Studying-in-Canada">Why Study in Canada</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link color-red" href="{{url('student')}}">Student</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link color-green" href="{{url('agent')}}">Counselor</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link color-blue" href="{{url('institution')}}">Institution</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link color-green" href="{{url('course')}}">Academy</a>
                </li>
            </ul>

        </nav>

        @if(Session::get('login') != '')
                         @if(Session::get('login') == 'student')
                                        @php
                                        $id = Session::get('student_iddd');
                                        $values = App\Models\StudentModel::where(['id' => $id])->first();
                                        $names = $values->first_name;
                                        @endphp
        <div class="d-flex order-3">
                                     
                    <div class="dropdown mx-2 order-md-3 login-header">
                        <a class="btn btn-outline-login btn-sm rounded-pill dropdown-toggle d-sm-block" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$names}} <i class="ri-user-line"></i> </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a href="{{url('/student/dashboard')}}" class="dropdown-item" href=""><i class="ri-dashboard-3-fill"></i> Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{url('/student/profile')}}"><i class="ri-file-user-fill"></i> My Profile</a></li>
                            <li><a class="dropdown-item" href="{{url('student/logout')}}"><i class="ri-logout-circle-r-fill"></i> Logout</a></li>
                        </ul>
                    </div>
                    <button class="navbar-toggler ms-1 me-n3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse1" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
               </div>
            @endif
            

            @if(Session::get('login') == 'agent')
                                        @php
                                        $id = Session::get('agent_id');
                                        $values = App\Models\AgentModel::where(['id' => $id])->first();
                                        $names = $values->first_name;
                                        @endphp
        <div class="d-flex order-3">
                                     
                    <div class="dropdown mx-2 order-md-3 login-header">
                        <a class="btn btn-outline-login btn-sm rounded-pill dropdown-toggle d-sm-block" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$names}} <i class="ri-user-line"></i> </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a href="{{url('/agent/dashboard')}}" class="dropdown-item" href=""><i class="ri-dashboard-3-fill"></i> Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{url('/agent/profile')}}"><i class="ri-file-user-fill"></i> My Profile</a></li>
                            <li><a class="dropdown-item" href="{{url('agent/logout')}}"><i class="ri-logout-circle-r-fill"></i> Logout</a></li>
                        </ul>
                    </div>
                    <button class="navbar-toggler ms-1 me-n3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse1" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
               </div>
            @endif


            @if(Session::get('login') == 'insitution')
                                        @php
                                        $id = Session::get('institution_id');
                                        $values = App\Models\InstitutionModel::where(['id' => $id])->first();
                                        $names = $values->institution_name;
                                        @endphp
        <div class="d-flex order-3">
                                     
                    <div class="dropdown mx-2 order-md-3 login-header">
                        <a class="btn btn-outline-login btn-sm rounded-pill dropdown-toggle d-sm-block" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{$names}} <i class="ri-user-line"></i> </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a href="{{url('/institution/dashboard')}}" class="dropdown-item" href=""><i class="ri-dashboard-3-fill"></i> Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{url('/institution/index')}}"><i class="ri-file-user-fill"></i> My Profile</a></li>
                            <li><a class="dropdown-item" href="{{url('/institution/logout')}}"><i class="ri-logout-circle-r-fill"></i> Logout</a></li>
                        </ul>
                    </div>
                    <button class="navbar-toggler ms-1 me-n3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse1" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
               </div>
            @endif

            @endif

    </div>

</header>