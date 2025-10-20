{{-- resources/views/employees/index.blade.php --}}

@extends('layouts.app')

@section('title', 'إدارة الموظفين')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">قائمة الموظفين</h3>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> إضافة موظف جديد
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>الوظيفة</th>
                                    <th>الراتب</th>
                                    <th>الهاتف</th>
                                    <th>تاريخ التعيين</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->position }}</td>
                                    <td>{{ number_format($employee->salary, 2) }} ج.م</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->hire_date->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('employees.show', $employee) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
