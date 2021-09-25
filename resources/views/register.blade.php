@extends('layouts.master2')
@section('content')
<div class="container">
    <div class="col-md-12">
        @if (session()->has('success'))
        <script>
            $.notify({
                icon: "add_alert",
                message: "{{ session()->get('success') }}"

                }, {
                type: 'success',
                timer: 3000,
                placement: {
                from: 'top',
                align: 'right'
                }
                });
        </script>
        @endif
        <div class="card">
            <div class="card-header text-right">
                <div class="row align-items-center">

                    <div class="col-sm-12 col-md-4 row-sm hide_desktop">
                        <img src="{{ asset('assets/img/Logo.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="d-none-sm col-sm-12 col-md-5  main_title">
                        <h3 class="card-title ">المملكة العربية السعودية</h3>
                        <h3 class="card-title">السفارة السعودية في القاهرة</h3>
                        <h3 class="card-title">الملحقية العمالية</h3>
                    </div>
                    <div class="col-sm-12 col-md-3 hide_mobile">
                        <h2 class="card-title">طلب توظيف</h2>
                    </div>
                    <div class="col-sm-12 col-md-4 row-sm hide_mobile">
                        <img src="{{ asset('assets/img/Logo.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-sm-12 col-md-3 hide_desktop ">
                        <h2 class="card-title">طلب توظيف</h2>
                    </div>
                </div>
            </div>
            <div class="card-body text-right">
                @include('layouts.errors')
                <form action="{{ route('jobAplication') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <h4 class="card-title text-center my-4 txt-title"
                            style="background: rgb(45, 180, 115); color: white">
                            البيانات الشخصية</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label ">الاسم الاول
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">الاسم الاول</span>
                                </label>
                                <input type="text" required class="form-control" name="first_name" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label">اسم الاب
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);"> اسم الاب</span>
                                </label>
                                <input type="text" required class="form-control" name="father_name" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label ">اسم الجد
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">الاسم الثالث فى
                                        البطاقة </span>
                                </label>
                                <input type="text" required class="form-control" name="third_name" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label ">الاسم الاخير
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);"> الاسم الاخير في
                                        البطاقة </span>
                                </label>
                                <input type="text" required class="form-control" name="forth_name" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="bmd-label ">عدد الابناء
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">كم لديك من
                                        ابناء</span>
                                </label>
                                <input type="text" class="form-control" name="children" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="bmd-label ">الديانة
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">تحديد
                                        الديانة</span>
                                </label>

                                <select class="form-control" name="religion">
                                    <option value="مسلم">مسلم</option>
                                    <option value="مسيحي">مسيحي</option>
                                    <option value="غير ذلك">غير ذلك</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label ">الجنسية
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">من فضاك حدد
                                        الجنسية</span>
                                </label>

                                <select class="form-control" name="nationality_id">
                                    <option value="">حدد الجنسية</option>
                                    @foreach($nationality as $n)
                                    <option value="{{ $n->id }}">{{ $n->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="bmd-label ">الرقم القومي
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">ادخل الرقم القومي
                                        او الرقم الوطني</span>
                                </label>
                                <input type="text" maxlength="14" required class="form-control"
                                    name="national_number" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label ">رقم الهاتف
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">ادخل رقم الهاتف
                                        الخاص بك </span>
                                </label>
                                <input type="text" required id="phone" class="form-control" name="phone" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label ">البريد الاكتروني
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">ادخل البريد
                                        الالكتروني للتواصل</span>
                                </label>
                                <input type="email" class="form-control" name="email" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label ">العنوان
                                    <span class="badge badge-light" style="color:rgb(45, 180, 115);">عنوانك المقيم بيه
                                        حاليا</span>
                                </label>
                                <input type="text" required class="form-control" name="home_address" />
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="city_id">
                                    <option value="">المحافظة</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="spec_title">
                                    <option value="استشاري">طبيب استشاري</option>
                                    <option value="اخصائي">اخصائي</option>
                                    <option value="مقيم">طبيب مقيم</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="job_id">
                                    <option value="">الوظيفة المتقدم عليها</option>
                                    @foreach ($jobs->where('status', 1)->all() as $job)
                                    <option value="{{ $job->id }}">{{ $job->job_title  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="bmd-label">تاريخ الميلاد
                                <span class="badge badge-light" style="color:rgb(45, 180, 115);">ادخل تاريخ
                                    ميلادك</span>
                            </label>
                            <div class="form-group">
                                <input type="date" class="form-control" name="birth_day" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="bmd-label ">مكان الميلاد
                                <span class="badge badge-light" style="color:rgb(45, 180, 115);">ادخل مكان الميلاد مسقط
                                    رأسك</span>
                            </label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="birth_address" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="bmd-label ">النوع</label>
                            <div class="form-group">
                                <select class="form-control" name="gendar">
                                    <option value="" selected>النوع</option>
                                    <option value="ذكر">ذكر</option>
                                    <option value="أنثى">أنثى</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- المؤهلات العلمية --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="col-12">
                                    <h4 class="card-title text-center my-4 txt-title"
                                        style="background: rgb(45, 180, 115); color: white">المؤهلات
                                        العلمية</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover repeater">
                                            <thead class="">
                                                <th>
                                                    المؤهل او الشهاده
                                                </th>
                                                <th>
                                                    التخصص
                                                </th>
                                                <th>
                                                    سنة التخرج
                                                </th>
                                                <th>
                                                    مرفقات
                                                </th>
                                                <th>
                                                    <button type="button" value="+" data-repeater-create
                                                        class="add btn btn-success"><i class="far fa-plus"></i>
                                                        اضافة</button>
                                                </th>
                                            </thead>
                                            <tbody data-repeater-list="qualifications">
                                                <tr data-repeater-item>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="qualification_name">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="qualification_spec">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="date"
                                                            name="qualification_gradution_year">
                                                    </td>
                                                    <td>
                                                        <input required type="file" accept="application/pdf"
                                                            name="qual_files">
                                                    </td>
                                                    <th>
                                                        <button data-repeater-delete type="button"
                                                            class="btn btn-danger"><i class="fa fa-trash"></i>
                                                            ازالة</button>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- الخبرات العملية --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="col-12">
                                    <h4 class="card-title text-center my-4 txt-title"
                                        style="background: rgb(45, 180, 115); color: white;">الخبرات العملية
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover repeater">
                                            <thead id="e_head" class="">
                                                <th>
                                                    الوظائف التي شغلتها
                                                </th>
                                                <th>
                                                    اسم الجهة
                                                </th>
                                                <th>
                                                    بداية الخدمة
                                                </th>
                                                <th>
                                                    نهاية الخدمة
                                                </th>
                                                <th>
                                                    سبب إنهاء الخدمة
                                                </th>
                                                <th>
                                                    مرفقات
                                                </th>
                                                <th>
                                                    <button type="button" data-repeater-create
                                                        class="add btn btn-success"><i class="far fa-plus"></i>
                                                        اضافة</button>
                                                </th>
                                            </thead>
                                            <tbody data-repeater-list="e_data">
                                                <tr data-repeater-item>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="e_data_job_title">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="e_data_company_name">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="date"
                                                            name="e_data_job_start">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="date"
                                                            name="e_data_job_end">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="e_data_contract_termination">
                                                    </td>
                                                    <td>
                                                        <input required type="file" accept="application/pdf"
                                                            name="e_data_files">
                                                    </td>
                                                    <th>
                                                        <button data-repeater-delete type="button"
                                                            class="btn btn-danger"><i class="fa fa-trash"></i>
                                                            ازالة</button>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- الخبراتفي المملكة العربية السعودية --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="col-12">
                                    <h4 class="card-title text-center my-4 txt-title"
                                        style="background: rgb(45, 180, 115); color: white">الخبرات في
                                        المملكة العرابية السعودية</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover repeater">
                                            <thead id="saudia" class="">
                                                <th>
                                                    اسم الجهة
                                                </th>
                                                <th>
                                                    مقر العمل
                                                </th>
                                                <th>
                                                    المسمى الوظيفي
                                                </th>
                                                <th>
                                                    سبب انهاء العقد
                                                </th>
                                                <th>
                                                    بداية الخدمة
                                                </th>
                                                <th>
                                                    نهاية الخدمة
                                                </th>
                                                <th>
                                                    مرفقات
                                                </th>
                                                <th>
                                                    <button type="button" data-repeater-create
                                                        class="add btn btn-success"><i class="fa fa-add"></i>
                                                        اضافة</button>
                                                </th>
                                            </thead>
                                            <tbody data-repeater-list="saudia_data">
                                                <tr data-repeater-item>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="saudia_company_name">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="saudia_work_address">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="saudia_job_title">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="text"
                                                            name="saudia_contract_termination">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="date"
                                                            name="saudia_job_start">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" required type="date"
                                                            name="saudia_job_end">
                                                    </td>
                                                    <td>
                                                        <input required type="file" accept="application/pdf"
                                                            name="saudia_data_files">
                                                    </td>
                                                    <th>
                                                        <button data-repeater-delete type="button"
                                                            class="btn btn-danger"><i class="fa fa-trash"></i>
                                                            ازالة</button>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- الخدمة العسكرية --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="col-12">
                                    <h4 class="card-title text-center my-4 txt-title"
                                        style="background: rgb(45, 180, 115); color: white">الخدمة العسكرية
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead class="">
                                                <th>
                                                    ادي الخدمة من
                                                </th>
                                                <th>
                                                    الي
                                                </th>
                                                <th>
                                                    اخر رتبة
                                                </th>
                                                <th>
                                                    حالة التجنيد
                                                </th>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="text" name="start">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" name="end">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" name="rate">
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="military_status">
                                                            <option value="معافى">معافى</option>
                                                            <option value="إنهاء الخدمة">إنهاء الخدمة</option>
                                                            <option value="مؤجل تجنيده">مؤجل تجنيده</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title text-center my-4 txt-title"
                        style="background: rgb(45, 180, 115); color: white;">ارفق
                        السيرة الذاتية الخاصة بك
                    </h4>
                    <h5 style="color: red;" class="txt-title">لن يتم قبول طلبك دون ارفاق السيرة الذاتية</h5>
                    <div class="row mb-4">
                        <div class="col-6">
                            <input type="file" required name="cv" accept="application/pdf">
                        </div>
                    </div>
                    <button type="submit" class="btn pull-right">
                        تقديم طلب
                    </button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection