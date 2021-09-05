@extends('layouts.master')
{{-- @section('menu')
@extends('sidebar.dashboard')
@endsection --}}
@section('content')

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('home') }}">Admin Dashboard</a></li>
                            <li><a class="active" href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_name=='Admin')
                        <li class="menu-title"> <span>Authentication</span> </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="la la-user-secret"></i>
                                <span> User Controller</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a href="{{ route('userManagement') }}">All User</a></li>
                                <li><a href="{{ route('activity/log') }}">Activity Log</a></li>
                                <li><a href="{{ route('activity/login/logout') }}">Activity User</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="menu-title"> <span>Employees</span> </li>
                    <li class="submenu">
                        <a href="#">
                            <i class="la la-user"></i>
                            <span> Employees</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">All Employees</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Activities</span></li>
                    <li> <a href="{{ route('form/attendance') }}"><i class="la la-briefcase"></i><span> Attendance </span> </span></a>

                    <li > <a href="{{ route('form/position') }}"><i class="la la-rocket"></i> <span> Desisgnations</span></a>
                        
                    <li><a href="{{ route('form/location') }}"><i class="la la-external-link-square"></i> <span>Location</span></a></li>
                   
                    <li > <a href="{{ route('form/holidays/new') }}"><i class="la la-files-o"></i><span> Holidays </span> </a>

                    <li> <a href="{{ route('timesheet') }}"><i class="la la-file-pdf-o"></i><span>Timesheet</span></a></li>

                    <li > <a href="{{ route('schedule') }}"><i class="la la-pie-chart"></i><span> Shift & Schedule </span> </a>
                       
                    <li class="menu-title"> <span>Payments</span> </li>
                    
                    <li> <a href="constantcost.html"><i class="la la-crosshairs"></i> <span> PPE + Constant Cost </span> </a>
      
                    <li> <a href="overtime.html"><i class="la la-edit"></i><span> Overtime </span></a>
                   
                    <li> <a href="payroll.html"><i class="la la-money"></i><span> Payroll </span></a>

                    <li class="menu-title"> <span>Administration</span> </li>
                    <li> <a href="departments.html"><i class="la la-object-ungroup">
                        </i> <span>Departments</span></a>
                    </li>
                    
                       
                    <li class="menu-title"> <span>Pages</span> </li>
                    <li class="submenu"> <a href="#"><i class="la la-user"></i>
                        <span> Profile </span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="profile.html"> Employee Profile </a></li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->
    
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="welcome-box">
                        <div class="welcome-img">
                            <img src="{{ URL::to('/assets/images/'. Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="welcome-det">
                            <h3>Welcome, {{ Auth::user()->name }}</h3>
                            <p>{{ $todayDate }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <section class="dash-section">
                        <h1 class="dash-sec-title">Today</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <a href="#" class="dash-card text-danger">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-hourglass-o"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Richard Miles is off sick today</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-09.jpg') }}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="dash-info-list">
                                <a href="#" class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>You are away today</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-02.jpg') }}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="dash-info-list">
                                <a href="#" class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>You are working from home today</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-02.jpg') }}" alt=""></div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </section>

                    <section class="dash-section">
                        <h1 class="dash-sec-title">Tomorrow</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <div class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>2 people will be away tomorrow</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <a href="#" class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-04.jpg') }}" alt=""></a>
                                            <a href="#" class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-08.jpg') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="dash-section">
                        <h1 class="dash-sec-title">Next seven days</h1>
                        <div class="dash-sec-content">
                            <div class="dash-info-list">
                                <div class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>2 people are going to be away</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <a href="#" class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-05.jpg') }}" alt=""></a>
                                            <a href="#" class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-07.jpg') }}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash-info-list">
                                <div class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-user-plus"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>Your first day is going to be  on Thursday</p>
                                        </div>
                                        <div class="dash-card-avatars">
                                            <div class="e-avatar"><img src="{{ URL::to('assets/img/profiles/avatar-02.jpg') }}" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash-info-list">
                                <a href="" class="dash-card">
                                    <div class="dash-card-container">
                                        <div class="dash-card-icon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="dash-card-content">
                                            <p>It's Spring Bank Holiday  on Monday</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="dash-sidebar">
                        <section>
                            <h5 class="dash-title">Projects</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>71</h4>
                                            <p>Total Tasks</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>14</h4>
                                            <p>Pending Tasks</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <div class="dash-stats-list">
                                            <h4>2</h4>
                                            <p>Total Projects</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h5 class="dash-title">Your Leave</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>4.5</h4>
                                            <p>Leave Taken</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>12</h4>
                                            <p>Remaining</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <a class="btn btn-primary" href="#">Apply Leave</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h5 class="dash-title">Your time off allowance</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="time-list">
                                        <div class="dash-stats-list">
                                            <h4>5.0 Hours</h4>
                                            <p>Approved</p>
                                        </div>
                                        <div class="dash-stats-list">
                                            <h4>15 Hours</h4>
                                            <p>Remaining</p>
                                        </div>
                                    </div>
                                    <div class="request-btn">
                                        <a class="btn btn-primary" href="#">Apply Time Off</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <h5 class="dash-title">Upcoming Holiday</h5>
                            <div class="card">
                                <div class="card-body text-center">
                                    <h4 class="holiday-title mb-0">Mon 20 May 2019 - Ramzan</h4>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Wrapper -->  
@endsection