@extends('layouts.app')

@section('title', 'إضافة موظف')

@section('content')
<h3>إضافة موظف جديد</h3>
<form method="POST" action="{{ route('employees.store') }}">
    @csrf
    @include('employees._form')
</form>
@endsection
