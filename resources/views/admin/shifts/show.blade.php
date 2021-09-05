@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shift.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shifts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.id') }}
                        </th>
                        <td>
                            {{ $shift->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.shift_name') }}
                        </th>
                        <td>
                            {{ $shift->shift_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.time_in') }}
                        </th>
                        <td>
                            {{ $shift->time_in }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shift.fields.time_out') }}
                        </th>
                        <td>
                            {{ $shift->time_out }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shifts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection