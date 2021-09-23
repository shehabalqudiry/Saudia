@extends('layouts.master')

@section('content')
<div class="col-md-12 text-right">
    <div class="card card-plain">
        <div class="card-header card-header-success">
            <h4 class="card-title mt-0">الجنسيات</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn" data-toggle="modal" data-target="#create">
                اضافة جنسية
            </button>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            #
                        </th>
                        <th>
                            الجنسية
                        </th>
                        <th>
                            اعدادات
                        </th>
                    </thead>
                    <tbody>
                        @foreach($nationalities as $na)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $na->name }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#edit_{{ $na->id }}">
                                    تعديل
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete_{{ $na->id }}">
                                    حذف
                                </button>
                            </td>
                        </tr>
                        @include('admin.nationality.actions')
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
                <h5 class="modal-title">اضافة جنسية جديدة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('nationalities.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input class="form-control col" required type="text" name="name" placeholder="الجنسية">
                    </div>
                    <div class="form-group mb-4">
                        <input class="form-control col" required type="text" name="key" placeholder="مفتاح الدولة">
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
