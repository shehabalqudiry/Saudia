@extends('layouts.master')

@section('content')
<div class="col-md-12 text-right">
    <div class="card card-plain">
        <div class="card-header card-header-success">
            <h4 class="card-title mt-0">المحافظات</h4>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primry" data-toggle="modal" data-target="#create">
                اضافة محافظة
            </button>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            #
                        </th>
                        <th>
                            المحافظة
                        </th>
                        <th>
                            الجنسية
                        </th>
                        <th>
                            اعدادات
                        </th>
                    </thead>
                    <tbody>
                        @foreach($cities as $city)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $city->name }}
                            </td>
                            <td>
                                {{ $city->nationality->name }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#edit_{{ $city->id }}">
                                    تعديل
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#delete_{{ $city->id }}">
                                    حذف
                                </button>
                            </td>
                        </tr>
                        @include('admin.cities.actions')
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
            <form action="{{ route('cities.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input class="form-control col" required type="text" name="name" placeholder="المحافظة">
                    </div>
                    <div class="form-group">
                        <select class="form-control col" name="nationality_id">
                            @foreach ($nationalities as $nationality)
                            <option value="{{ $nationality->id}}">
                                {{$nationality->name }}</option>
                            @endforeach
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
