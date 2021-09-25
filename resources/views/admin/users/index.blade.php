@extends('layouts.master')

@section('content')
<div class="col-md-12 text-right">
    <div class="card card-plain">
        <div class="card-header card-header-success">
            <h4 class="card-title mt-0">المتقدمين</h4>
        </div>
        <div class="card-body">

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
                                {{ $user->spec_title . ' ' . $user->job->job_title }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td>
                                <!--<button type="button" class="btn btn-success" data-toggle="modal"-->
                                <!--    data-target="#edit_{{ $user->id }}">-->
                                <!--    تعديل-->
                                <!--</button>-->
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete_{{ $user->id }}">
                                    حذف
                                </button>
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
