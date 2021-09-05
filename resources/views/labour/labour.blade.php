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
                    <li> <a class="active" href="{{ route('labour') }}"><i class="la la-edit"></i><span> Labour Request </span></a>

                    <li> <a href="{{ route('form/attendance') }}"><i class="la la-briefcase"></i><span> Attendance </span> </span></a>

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
                        <h3 class="page-title">Labour Request <span id="year"></span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Labour Request</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="{{ route('labour/save') }}" class="btn add-btn" data-toggle="modal" data-target="#add_labour"><i class="fa fa-plus"></i> New </a>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
             {{-- message --}}
             {!! Toastr::message() !!}

             <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Turnmen</th>
                                    <th>Bob Cat Operator</th>
                                    <th>Bulk Loader</th>
                                    <th>Trimming Gang</th>
                                    <th>Cargil Clerk</th>
                                    <th>Total</th>
                                    <th>Request Date</th>

                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($total = 0)
                                @foreach ($result as $result )
                                <tr>
                                    <td>
                                        <td>{{ $result->turnmen }}</td>
                                        <td>{{ $result->bob_cat_operator}}</td>
                                        <td>{{ $result->bulk_loader }}</td>
                                        <td>{{ $result->trimming_gang }}</td>
                                        <td>{{ $result->cargil_clerk }}</td>
                                        <td>{{ $result->total }}</td>
                                        <td>{{ $result->request_date }}</td>
                                    <td>
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
                                </div>
                               </tr>
                            </div>
                            @endforeach
                        </div>
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
        
 <!-- /Page Content -->

<!-- Add Labour Modal -->
<div id="add_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('labour/save') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Turnmen</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="turnmen">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Bob Cat Operator</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="bob_cat_operator">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Bulk Loader</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="bulk_loader">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Trimming Gang</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="trimming_gang">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Cargil Clerk</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="cargil_clerk">
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
<!-- /Add Labour Modal -->

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
