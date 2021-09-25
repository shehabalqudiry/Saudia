@extends('layouts.master')
@section('content')
<!-- row -->
<div class="row">
    <div class="d-flex my-xl-auto right-content">
        @can('admin-create')
        <a class="btn btn-success" href="{{ route('admins.create') }}"> إضافة مستخدم جديد</a>
        @endcan
    </div>
    <div class="col-xl-12">
        <div class="card">
            {{-- @include('layouts.alert') --}}
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">المستخدمين</h4>
                    <i class="mdi mdi-dots-horizontal text-gray"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mg-b-0 text-md-nowrap text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الإسم</th>
                                <th>البريد الالكتروني</th>
                                <th>نوع المستخدم</th>
                                <th width="280px">اعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    @if(!empty($admin->getRoleNames()))
                                    @foreach($admin->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                    @can('admin-edit')
                                    <a class="btn btn-success" href="{{ route('admins.edit',$admin->id) }}">تعديل</a>
                                    @endcan
                                    @can('admin-delete')
                                    <form action="{{ route('admins.destroy', $admin->id) }}" method="post"
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
                        {{-- {!! $data->render() !!} --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
