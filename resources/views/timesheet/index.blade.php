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
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                        <div class="view-icons">
                            <a href="{{ route('all/employee/card') }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                            <a href="{{ route('all/employee/list') }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
@can('time_entry_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.time-entries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.timeEntry.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.timeEntry.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TimeEntry">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.timeEntry.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeEntry.fields.work_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeEntry.fields.project') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeEntry.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeEntry.fields.end_time') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeEntries as $key => $timeEntry)
                        <tr data-entry-id="{{ $timeEntry->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $timeEntry->id ?? '' }}
                            </td>
                            <td>
                                {{ $timeEntry->work_type->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeEntry->project->name ?? '' }}
                            </td>
                            <td>
                                {{ $timeEntry->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $timeEntry->end_time ?? '' }}
                            </td>
                            <td>
                                @can('time_entry_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.time-entries.show', $timeEntry->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('time_entry_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.time-entries.edit', $timeEntry->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('time_entry_delete')
                                    <form action="{{ route('admin.time-entries.destroy', $timeEntry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('time_entry_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.time-entries.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-TimeEntry:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection