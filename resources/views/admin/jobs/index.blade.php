@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card card-plain text-right">
        <div class="card-header card-header-success">
            <h4 class="card-title mt-0"> التخصصات</h4>
        </div>
        <div class="card-body">
                        <button type="button" class="btn btn" data-toggle="modal" data-target="#create">
                اضاف تخصص
            </button>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            #
                        </th>
                        <th>
                            التخصص
                        </th>
                        <th>
                            الحالة
                        </th>
                        <th>
                            اعدادات
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $job)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $job->job_title }}
                            </td>
                            <td>
                                {{ $job->status == 1 ? 'مفعل' : 'غير مفعل'  }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#edit_{{ $job->id }}">
                                    تعديل
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete_{{ $job->id }}">
                                    حذف
                                </button>
                            </td>
                            @include('admin.jobs.actions')
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">اضافة تخصص جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('jobs.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input class="form-control col" required type="text" name="job_title" placeholder="التخصص">
                    </div>
                    <div class="form-group mb-4">
                        <select class="form-control col" required type="text" name="status">
                            <option value="1">مفعل</option>
                            <option value="0">غير مفعل</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">حفظ</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
