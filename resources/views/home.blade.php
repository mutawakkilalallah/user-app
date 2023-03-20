@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $userCount }}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
@endsection
