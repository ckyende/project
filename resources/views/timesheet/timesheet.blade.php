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
                            <li><a class="active" href="{{ route('all/employee/card') }}">All Employees</a></li>
                        </ul>
                    </li>
                    <li class="menu-title"> <span>Activities</span></li>
                    <li> <a href="{{ route('form/attendance') }}"><i class="la la-briefcase"></i><span> Attendance </span> </span></a>

                    <li > <a href="{{ route('form/position') }}"><i class="la la-rocket"></i> <span> Desisgnations</span></a>

                    <li><a href="{{ route('form/location') }}"><i class="la la-external-link-square"></i> <span>Location</span></a></li>

                    <li > <a href="{{ route('form/holidays/new') }}"><i class="la la-files-o"></i><span> Holidays </span> </a>

                    <li> <a class="active" href="{{ route('timesheet') }}"><i class="la la-file-pdf-o"></i><span>Timesheet</span></a></li>

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
                        <h3 class="page-title">Timesheet</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Timesheet</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('timesheet/save') }}" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> New</a>
                        <div class="view-icons">
                          
                            
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
            {{-- message --}}
            {!! Toastr::message() !!}

            <div class="container">
                <br>
            
                <span id="message_error"></span>
                <hr><br>
                <form id="validate" action="{{ route('timesheet') }}" method="post">
                    @csrf   
                    <table id="emptbl" class="table table-bordered border-primar">
                        <thead class="table-dark">
                            <tr>
                                <th>Date</th>
                                <th>National ID</th>
                                <th>Designation</th> 
                                <th>Location</th> 
                                <th>Time In</th> 
                                <th>Time Out</th> 
                                <th>Overtime</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <td id="col0"><input type="date" class="form-control" name="date[]" placeholder="date" required></td> 
                                <td id="col1"><input type="number" class="form-control" name="national_id[]" placeholder="National ID" required></td> 
                                <td id="col2"> 
                                    <select class="form-control" name="position[]" id="position" required> 
                                        <option selected disabled>-- Select --</option> 
                                        <option value="Accounting">T1</option>
                                        <option value="Marketing">T2</option>
                                        <option value="IT Management">Sgr Port</option>
                                    </select> 
                                </td> 
                                <td id="col0"><input type="text" class="form-control" name="location[]" placeholder="Location" required></td>
                                <td id="col0"><input type="time" class="form-control" name="time_in[]" placeholder="Time In" required></td>
                                <td id="col0"><input type="time" class="form-control" name="time_out[]" placeholder="Time out" required></td>
                                <td id="col0"><input type="number" class="form-control" name="Overtime[]" placeholder="Enter your name" required></td>
                            </tr>
                        </tbody>  
                    </table> 
                    <table>
                        <br>
                        <tr> 
                            <td><button type="button" class="btn btn-sm btn-info" onclick="addRows()">Add</button></td>
                            <td><button type="button" class="btn btn-sm btn-danger" onclick="deleteRows()">Remove</button></td>
                            <td><button type="submit" class="btn btn-sm btn-success">Save</button></td> 
                        </tr>  
                    </table>
                </form>
            </div>
        
            <script>
                function addRows()
                { 
                    var table = document.getElementById('emptbl');
                    var rowCount = table.rows.length;
                    var cellCount = table.rows[0].cells.length; 
                    var row = table.insertRow(rowCount);
                    for(var i =0; i <= cellCount; i++)
                    {
                        var cell = 'cell'+i;
                        cell = row.insertCell(i);
                        var copycel = document.getElementById('col'+i).innerHTML;
                        cell.innerHTML=copycel;
                        if(i == 2)
                        { 
                            var radioinput = document.getElementById('col2').getElementsByTagName('input'); 
                            for(var j = 0; j <= radioinput.length; j++)
                            { 
                                if(radioinput[j].type == 'radio')
                                { 
                                    var rownum = rowCount;
                                    radioinput[j].name = 'gender['+rownum+']';
                                }
                            }
                        }
                    }
                }
        
                function deleteRows()
                {
                    var table = document.getElementById('emptbl');
                    var rowCount = table.rows.length;
                    if(rowCount > '2')
                    {
                        var row = table.deleteRow(rowCount-1);
                        rowCount--;
                    }else{
                        alert('There should be atleast one row');
                    }
                }
            </script>
            <!-- alert blink text -->
            <script>
                function blink_text()
                {
                    $('#message_error').fadeOut(700);
                    $('#message_error').fadeIn(700);
                }
                setInterval(blink_text,1000);
            </script>
            <!-- script validate form -->
            <script>
                $('#validate').validate({
                    reles: {
                        'empname[]': {
                            required: true,
                        },
                        'phone[]': {
                            required:true,
                        },
                        'department[]': {
                            required:true,
                        },
                    },
                    messages: {
                        'empname[]' : "Please input file*",
                        'phone[]' : "Please input file*",
                        'department[]' : "Please input file*",
                    },
                });
            </script>


            <div class="row staff-grid-row">
                @foreach ($employees as $items )
                <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                    <div class="profile-widget">
                        <div class="profile-img">
                            <a href="profile.html" class="avatar"><img src="{{ URL::to('/assets/images/'. $items->avatar) }}" alt="{{ $items->avatar }}" alt="{{ $items->avatar }}"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('timesheet/view/edit/'.$items->rec_id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{ $items->name }}</a></h4>
                        <div class="small text-muted">{{ $items->position }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>National ID</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Location</th>
                                <th>Time In</th>
                                <th>Time Out</th>

                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                    <tbody>                 
                </div>
            </div>
        </div>

       
        <!-- /Page Content -->

        <!-- Add Employee Modal -->
        
        <div id="add_employee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Attendance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('timesheet/save') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Full Name</label>
                                        <select class="select select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" id="name" name="name">
                                            <option value="">-- Select --</option>
                                            @foreach ($employeeList as $key=>$employee )
                                                <option value="{{ $employee->name }}" data-national_id={{ $employee->national_id }}>{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Auto email" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="birthDate" name="birthDate">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="select form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="gender" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">  
                                    <div class="form-group">
                                        <label class="col-form-label">National ID <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="national_id" name="national_id" placeholder="Auto id employee" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Designation</label>
                                        <select class="select select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" id="designation" name="designation">
                                            <option value="">-- Select --</option>
                                            @foreach ($employeeList as $key=>$employee )
                                                <option value="{{ $employee->name }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Employee Modal -->
        
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        $("input:checkbox").on('click', function()
        {
            var $box = $(this);
            if ($box.is(":checked"))
            {
                var group = "input:checkbox[class='" + $box.attr("class") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            }
            else
            {
                $box.prop("checked", false);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2-hidden-accessible').select2({
                closeOnSelect: false
            });
        });
    </script>
    <script>
        // select auto id and email
        $('#name').on('change',function()
        {
            $('#employee_id').val($(this).find(':selected').data('employee_id'));
            $('#email').val($(this).find(':selected').data('email'));
        });
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