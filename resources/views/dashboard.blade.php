@extends('layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title">لوحة التحكم</h3>
        <p>الوحدة المتاحة حالياً: <a href="{{ route('employees.index') }}">إدارة الموظفين</a>.</p>
        <p class="text-muted mb-0">الحضور والتقارير والمخزون والمبيعات لم تُنفَّذ بعد.</p>
    </div>
</div>
@endsection
