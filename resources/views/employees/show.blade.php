@extends('layouts.app')

@section('title', $employee->name)

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{ $employee->name }}</h3>
        <dl class="row mb-0">
            <dt class="col-sm-3">الوظيفة</dt><dd class="col-sm-9">{{ $employee->position }}</dd>
            <dt class="col-sm-3">الراتب</dt><dd class="col-sm-9">{{ $employee->salary }}</dd>
            <dt class="col-sm-3">الهاتف</dt><dd class="col-sm-9">{{ $employee->phone }}</dd>
            <dt class="col-sm-3">تاريخ التعيين</dt><dd class="col-sm-9">{{ $employee->hire_date->format('Y-m-d') }}</dd>
            <dt class="col-sm-3">الحالة</dt><dd class="col-sm-9">{{ $employee->status }}</dd>
        </dl>
    </div>
</div>
<a class="btn btn-secondary mt-3" href="{{ route('employees.index') }}">رجوع</a>
@endsection
