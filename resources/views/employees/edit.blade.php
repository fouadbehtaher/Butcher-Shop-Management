@extends('layouts.app')

@section('title', 'تعديل موظف')

@section('content')
<h3>تعديل بيانات الموظف</h3>
<form method="POST" action="{{ route('employees.update', $employee) }}">
    @csrf
    @method('PUT')
    @include('employees._form')
</form>
@endsection
