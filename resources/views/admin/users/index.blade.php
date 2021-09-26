@extends('layouts.master')

@section('content')
<div class="col-md-12 text-right">
    <div class="card card-plain">
        <div class="card-header ">
            <h4 class="card-title mt-0">المتقدمين</h4>
        </div>
        <div class="card-body">
            <a class="btn btn-success" href="{{ route('users.export') }}">تصدير البيانات</a>
            {{-- <a class="btn btn-success" href="{{ route('users.import') }}">استيراد البيانات</a> --}}
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#import">
                استيراد البيانات
            </button>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            #
                        </th>
                        <th>
                            الاسم
                        </th>
                        <th>
                            الرقم القومي
                        </th>
                        <th>
                            الوظيفة المتقدم لها
                        </th>
                        <th>
                            الهاتف
                        </th>
                        <th>
                            اعدادات
                        </th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $user->first_name . ' ' . $user->father_name . ' ' . $user->third_name . ' ' . $user->last_name }}
                            </td>
                            <td>
                                {{ $user->national_number }}
                            </td>
                            <td>
                                {{ $user->job_id != null ? $user->spec_title . ' ' . $user->job->job_title : '' }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button
                                        class="btn btn-sm @if($user->status == 0) btn-warrinig @elseif($user->status == 2) btn-danger @else btn-success @endif dropdown-toggle"
                                        type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        {{ $user->status == null ? 'لم يتتم التحديد' : 'حالة المتقدم' }}
                                    </button>
                                    <div class="dropdown-menu">

                                        <form id="status-form" action="{{ route('users.update', $user->id) }}"
                                            method="POST" class="dropdown-item bg-light">
                                            @csrf
                                            @method('put')
                                            <select class="form-control"
                                                onchange="event.preventDefault();document.getElementById('status-form').submit();"
                                                name="status" id="status">
                                                <option {{ $user->status == 0 ? 'selected' : '' }} value="0">مرفوض
                                                </option>
                                                <option {{ $user->status == 1 ? 'selected' : '' }} value="1">ناجح
                                                </option>
                                                <option {{ $user->status == 2 ? 'selected' : '' }} value="2">راسب
                                                </option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @include('admin.users.actions')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection