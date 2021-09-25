@extends('layouts.master2')
@section('content')
<div class="container mt-5">
    <div class="row align-item-center">
        <div class="col-12">
            <h4 class="card-title text-center my-4" style="background: rgb(45, 180, 115); color: white">
                سجل دخولك لرؤية بياناتك</h4>
        </div>
            <form action="{{ route('login-user') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="national_number">
                </div>
            </form>
    </div>
</div>
@endsection
