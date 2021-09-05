@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shift.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shifts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="shift_name">{{ trans('cruds.shift.fields.shift_name') }}</label>
                <input class="form-control {{ $errors->has('shift_name') ? 'is-invalid' : '' }}" type="text" name="shift_name" id="shift_name" value="{{ old('shift_name', '') }}" required>
                @if($errors->has('shift_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('shift_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.shift_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time_in">{{ trans('cruds.shift.fields.time_in') }}</label>
                <input class="form-control timepicker {{ $errors->has('time_in') ? 'is-invalid' : '' }}" type="text" name="time_in" id="time_in" value="{{ old('time_in') }}" required>
                @if($errors->has('time_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.time_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time_out">{{ trans('cruds.shift.fields.time_out') }}</label>
                <input class="form-control timepicker {{ $errors->has('time_out') ? 'is-invalid' : '' }}" type="text" name="time_out" id="time_out" value="{{ old('time_out') }}" required>
                @if($errors->has('time_out'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_out') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shift.fields.time_out_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection