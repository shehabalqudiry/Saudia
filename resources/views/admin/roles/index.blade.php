@extends('layouts.master')
@section('content')
<!-- row -->
<div class="row">
    <div class="d-flex my-xl-auto right-content">
        <div class="pull-right">
            {{-- @can('role-create') --}}
            <a class="btn btn-success" href="{{ route('roles.create') }}"> إضافة دور جديد</a>
            {{-- @endcan --}}
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            {{-- @include('layouts.alert') --}}
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">أدوار المشرفين</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>مسمى الدور</th>
                                <th width="280px">اعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('role-edit')
                                    <a class="btn btn-info" href="{{ route('roles.edit',$role->id) }}">تعديل</a>
                                    @endcan
                                    @can('role-delete')
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {!! $roles->render() !!}
</div>
@endsection