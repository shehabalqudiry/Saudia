@extends('layouts.master')

@section('content')
<div class="col-md-12">
    <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0"> Table on Plain Background</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="">
                        <th>
                            #
                        </th>
                        <th>
                            الاسم بالكامل
                        </th>
                        <th>
                            الجنسية
                        </th>
                        <th>
                            المحافظة
                        </th>
                        <th>
                            الوظيفة المقدم عليها
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->first_name }}
                            </td>
                            <td>
                                Dakota Rice
                            </td>
                            <td>
                                Niger
                            </td>
                            <td>
                                Oud-Turnhout
                            </td>
                            <td>
                                $36,738
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
