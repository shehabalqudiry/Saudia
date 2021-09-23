@extends('layouts.master2')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center py-5">
                <div class="row">
                    <div class="col-4">
                        <h4 class="card-title">سفارة المملكة العربية السعودية بالقاهرة</h4>
                        <p class="card-category">الملحقية العمالية السعودية</p>
                    </div>
                    <div class="col-4">
                        <h4 class="card-title">عرض طلب المتقدم {{ $user->first_name }}</h4>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('assets/img/Logo.png') }}" width="250" alt="">
                    </div>
                </div>
            </div>
            <div class="card-body text-right">
                <form action="{{ route('jobAplication') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <h4 class="card-title text-center my-4" style="background: rgb(45, 180, 115); color: white">
                            البيانات الشخصية</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">الاسم الاول</label>
                                <input type="text" required class="form-control" name="first_name" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">اسم الاب</label>
                                <input type="text" required class="form-control" name="father_name" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">اسم الجد</label>
                                <input type="email" class="form-control" name="third_name" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="bmd-label-floating">الاسم الاخير</label>
                                <input type="text" required class="form-control" name="forth_name" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">تاريخ الميلاد</label>
                                <input type="date" class="form-control" name="birth_day" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">مكان الميلاد</label>
                                <input type="text" required class="form-control" name="birth_address" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select class="form-control" name="status">
                                    <option value="ذكر">ذكر</option>
                                    <option value="أنثى">أنثى</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="bmd-label-floating">عدد الابناء</label>
                                <input type="text" required class="form-control" name="children" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="religion">
                                    <option value="">الديانة</option>
                                    <option value="مسلم">مسلم</option>
                                    <option value="مسيحي">مسيحي</option>
                                    <option value="غير ذلك">غير ذلك</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="nationality_id">
                                    <option value="">الجنسية</option>
                                    @foreach($nationality as $n)
                                    <option value="{{ $n->id }}">{{ $n->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">الرقم القومي</label>
                                <input type="text" required pattern="[0-9]*14" class="form-control"
                                    name="national_number" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">رقم الهاتف</label>
                                <input type="text" required id="phone" class="form-control" name="phone" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">عنوان العمل</label>
                                <input type="text" required class="form-control" name="work_address" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">البريد الاكتروني</label>
                                <input type="text" required class="form-control" name="email" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">عنوان المنزل</label>
                                <input type="text" required class="form-control" name="home_address" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <select class="form-control" name="city_id">
                                    <option value="">المحافظة</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <select class="form-control" name="job_id">

                                    <option value="استشاري">طبيب استشاري</option>
                                    <option value="اخصائي">اخصائي</option>
                                    <option value="مقيم">طبيب مقيم</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <select class="form-control" name="job_id">
                                    <option value="">الوظيفة المتقدم عليها</option>
                                    @foreach ($jobs as $job)
                                    <option>{{ $job->job_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{-- المؤهلات العلمية --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="col-12">
                                    <h4 class="card-title text-center my-4"
                                        style="background: rgb(45, 180, 115); color: white">المؤهلات
                                        العلمية</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead id="qualHead" class="">
                                                <th>
                                                    المؤهل او الشهاده
                                                </th>
                                                <th>
                                                    التخصص
                                                </th>
                                                <th>
                                                    المدرسة او الكلية
                                                </th>
                                                <th>
                                                    مقر الدراسة
                                                </th>
                                                <th>
                                                    عدد السنوات
                                                </th>
                                                <th>
                                                    سنة التخرج
                                                </th>
                                                <th>
                                                    التقدير
                                                </th>
                                                <th>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-sm btn-success addRowQ">+</a>
                                                </th>
                                            </thead>
                                            <tbody id="qualBody">
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="qualification_data[qualification_name]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="qualification_data[spec]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="qualification_data[address]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="qualification_data[schoole]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="qualification_data[years_count]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="qualification_data[gradution_year]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="qualification_data[degree]">
                                                    </td>
                                                    <th>
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-sm btn-danger deleteRowQ">-</a>
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
                                    <h4 class="card-title text-center my-4"
                                        style="background: rgb(45, 180, 115); color: white;">الخبرات العملية
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
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
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-sm btn-success addRow">+</a>
                                                </th>
                                            </thead>
                                            <tbody id="e_body">
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="e_data[job_title]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="e_data[company_name]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="e_data[job_start]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text" name="e_data[job_end]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="e_data[contract_termination]">
                                                    </td>
                                                    <th>
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-sm btn-danger deleteRow">-</a>
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
                                    <h4 class="card-title text-center my-4"
                                        style="background: rgb(45, 180, 115); color: white">الخبرات في
                                        المملكة العرابية السعودية</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
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
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-sm btn-success addRow">+</a>
                                                </th>
                                            </thead>
                                            <tbody id="saudiaBody">
                                                <tr>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="saudia_data[company_name]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="saudia_data[work_address]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="saudia_data[job_title]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="saudia_data[contract_termination]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="saudia_data[job_start]">
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="text"
                                                            name="saudia_data[job_end]">
                                                    </td>
                                                    <th>
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-sm btn-danger deleteRow">-</a>
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
                                    <h4 class="card-title text-center my-4"
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
                                                            <option value="معافى نهائي">معافى نهائي</option>
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
