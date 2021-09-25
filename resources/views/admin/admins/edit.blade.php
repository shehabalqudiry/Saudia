@extends('layouts.master')

@section('content')
<!-- row -->
<div class="row">
    <div class="col-12">
        <div class="card box-shadow-0 text-right">
            <div class="card-header">
                <h4 class="card-title mb-1">تعديل بيانات المستخدم : {{ $admin->name }}</h4>
            </div>
            <div class="card-body pt-0">
                <form class="form-horizontal" action="{{ route('admins.update', $admin->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="inputName">الاسم</label>
                            <input type="text" class="form-control" id="inputName" name="name"
                            value="{{ $admin->name }}">
                        </div>
                        <div class="col-6">
                            <label for="inputEmail3">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="inputEmail3" name="email"
                                value="{{ $admin->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="inputPassword3">كلمة المرور</label>
                            <input type="password" class="form-control" id="inputPassword3" name="password">
                        </div>
                        <div class="col-6">
                            <label for="inputPassword4">تأكيد كلمة المرور</label>
                            <input type="password" class="form-control" id="inputPassword4" name="confirm-password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            {{-- @dd($roles) --}}
                            <label for="role">نوع المستخدم</label>
                            <select class="form-control" name="roles[]" id="role" multiple>
                                @foreach ($roles as $role)
                                <option {{ in_array($role, $adminRole) ? 'selected' : '' }} value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 mt-3 justify-content-end">
                        <div>
                            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!--Internal  jquery.maskedinput js -->
<script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
<!--Internal  spectrum-colorpicker js -->
<script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  jquery-simple-datetimepicker js -->
<script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
<!-- Internal form-elements js -->
<script src="{{URL::asset('assets/js/form-elements.js')}}"></script>

@endsection
