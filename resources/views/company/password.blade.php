@extends('layouts.company')
@section('title') Create Page - Enyty @endsection
@section('css')

@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.company.sidebar') @endsection
@section('content')

<style>
#selectpicker-input .selectpicker-input {
    margin: 0px 0px 0px 11px !important;
}

#selectpicker-input .col-4 {
    width: 32% !important;
}
</style>
@php
$item ="";

@endphp
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section id="hero" class="d-flex flex-column justify-content-center ">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success">
                <h2 class="text-capitalize page_titel mb-5" style="">Change Password</h2>
                <form action="{{route('password_update')}}" class="" id="change-password" method="post"
                    onsubmit="add_update_data(this, event, this.id);">
                    @csrf
                    <div class="form-group">
                        {{ html()->password('crunnet_password')->required()->placeholder('Currant Password')->class('bg-white form-control mb-3 rounded-3') }}
                    </div>
                    <div class="form-group">
                        {{ html()->password('new_password')->required()->placeholder('New Password')->class('bg-white form-control mb-3 rounded-3') }}
                    </div>
                    <div class="form-group">
                        {{ html()->password('repeat_password')->required()->placeholder('Repeat Password')->class('bg-white form-control mb-3 rounded-3') }}
                    </div>
                    <button style="background-color: #456297; height: 65px;" id="submit-btn"
                        class="btn submit_btn_ rounded-3 mb-3 mt-2 text-white w-100 py-2" type="submit">
                        Save Setting
                    </button>
                </form>
            </div>
        </section>
        <!-- End Hero -->
    </div>
</div>
</div>
<!-- End of Content Wrapper -->
@endsection