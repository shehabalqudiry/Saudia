@extends('layouts.master2')
@section('content')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('user-login') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="national_number">
                </div>
            </form>
        </div>
    </div>
@endsection
