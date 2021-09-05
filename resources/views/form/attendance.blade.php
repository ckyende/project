
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
                        <a href="#">
                            <i class="la la-dashboard"></i>
                            <span> Dashboard</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('home') }}">Admin Dashboard</a></li>
                            <li><a href="{{ route('em/dashboard') }}">Employee Dashboard</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_name=='Admin')
                        <li class="menu-title"> <span>Authentication</span> </li>
                        <li class="submenu">
                            <a href="#">
                                <i class="la la-user-secret"></i> <span> User Controller</span> <span class="menu-arrow"></span>
                            </a>
                            <ul style="display: none;">
                                <li><a href="{{ route('userManagement') }}">All User</a></li>
                                <li><a href="{{ route('activity/log') }}">Activity Log</a></li>
                                <li><a href="{{ route('activity/login/logout') }}">Activity User</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="menu-title">
                        <span>Employees</span>
                    </li>
                    <li class="submenu">
                        <a href="#" class="noti-dot">
                            <i class="la la-user"></i>
                            <span> Employees</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul style="display: none;">
                            <li><a href="{{ route('all/employee/card') }}">All Employees</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Activities</span></li>
                    <li> <a class="active" href="{{ route('form/attendance') }}"><i class="la la-briefcase"></i><span> Attendance </span> </span></a>

                    <li > <a href="{{ route('form/position') }}"><i class="la la-rocket"></i> <span> Designations</span></a>
                        
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
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Attendance <span id="year"></span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Attendance</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> New </a>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
             {{-- message --}}
             {!! Toastr::message() !!}
            

<!-- Add Attendance Modal -->
<div class="container">
    <h3 align="center">Upload Excel</h3>
     <br />
    @if(count($errors) > 0)
     <div class="alert alert-danger">
      Upload Validation Error<br><br>
      <ul>
       @foreach($errors->all() as $error)
       <li>{{ $error }}</li>
       @endforeach
      </ul>
     </div>
    @endif
 
    @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
     <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ url('form/attendance/import') }}">
     {{ csrf_field() }}
     <div class="form-group">
      <table class="table">
       <tr>
         <td width="40%" align="right">
        <a style="margin:5px" href="{{ url('/sample/AttendanceList.xlsx') }}" class="btn btn-danger">Download Sample</a>
        </td>
        <td width="30%" align="left">
        <label class="btn btn-sucess" style="margin:5px">
         <input type="file" name="file" id="file">
         </label></td>
         <td width="80%" align="left">
        <label class="btn btn-primary" style="margin:5px">
         <input type="submit" style="display:yes" name="upload" class="btn btn-primary" value="Upload">
         </label></td>
        <td width="30%" align="left"></td>
       </tr>
       <tr>
         <td width="40%" align="right"></td>
         <td width="30"><span class="text-muted">.xls, .xslx</span></td>
         <td width="30%" align="left"></td>
        </tr>
      </table>
     </div>
    </form>
    
    <br />
    
     <div class="row">
         <div class="col-md-12">
             <div class="table-responsive">
                 <table class="table table-striped custom-table datatable">
         <div class="card-body">
             @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
         
         <table class="table">
         <thead>
          <tr>
         
         <th>National ID</th>
         <th>Name</th>
         <th>Designation</th>
         <th>Location</th>
 
        </tr>
        @foreach($data as $row)
        <tr>
         
         <td>{{ $row->national_id }}</td>
         <td>{{ $row->name}}</td>
         <td>{{ $row->designation}}</td>
         <td>{{ $row->location }}</td>
        
        </tr>
        @endforeach
         </table>
        </tr>
       </tbody>
      </div>
     </div>
    </div>
   </div>
  
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
    {{-- update js --}}
    <script>
        $(document).on('click','.userUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_email').val(_this.find('.email').text());
            $('#e_phone_number').val(_this.find('.phone_number').text());
            $('#e_image').val(_this.find('.image').text());
 
            var name_role = (_this.find(".role_name").text());
            var _option = '<option selected value="' + name_role+ '">' + _this.find('.role_name').text() + '</option>'
            $( _option).appendTo("#e_role_name");
 
            var position = (_this.find(".position").text());
            var _option = '<option selected value="' +position+ '">' + _this.find('.position').text() + '</option>'
            $( _option).appendTo("#e_position");
 
            var department = (_this.find(".department").text());
            var _option = '<option selected value="' +department+ '">' + _this.find('.department').text() + '</option>'
            $( _option).appendTo("#e_department");
 
            var statuss = (_this.find(".statuss").text());
            var _option = '<option selected value="' +statuss+ '">' + _this.find('.statuss').text() + '</option>'
            $( _option).appendTo("#e_status");
            
        });
    </script>
    @endsection
 
 @endsection
 