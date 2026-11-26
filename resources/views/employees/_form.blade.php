@php($e = $employee ?? null)
<div class="mb-3">
    <label class="form-label" for="name">الاسم</label>
    <input class="form-control" id="name" name="name" value="{{ old('name', $e?->name) }}" required maxlength="100">
</div>
<div class="mb-3">
    <label class="form-label" for="position">الوظيفة</label>
    <input class="form-control" id="position" name="position" value="{{ old('position', $e?->position) }}" required maxlength="50">
</div>
<div class="mb-3">
    <label class="form-label" for="salary">الراتب</label>
    <input class="form-control" id="salary" name="salary" type="number" step="0.01" min="0" value="{{ old('salary', $e?->salary) }}" required>
</div>
<div class="mb-3">
    <label class="form-label" for="phone">الهاتف</label>
    <input class="form-control" id="phone" name="phone" value="{{ old('phone', $e?->phone) }}" required maxlength="20">
</div>
<div class="mb-3">
    <label class="form-label" for="hire_date">تاريخ التعيين</label>
    <input class="form-control" id="hire_date" name="hire_date" type="date" value="{{ old('hire_date', $e?->hire_date?->format('Y-m-d')) }}" required>
</div>
<button class="btn btn-primary" type="submit">حفظ</button>
<a class="btn btn-secondary" href="{{ route('employees.index') }}">رجوع</a>
