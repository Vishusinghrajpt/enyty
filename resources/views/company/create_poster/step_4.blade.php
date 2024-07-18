@extends('layouts.company')
@section('title') Create Page - Enyty @endsection
@section('css')

@endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.company.sidebar') @endsection
@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section class="d-flex flex-column justify-content-center ">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success">
                <h2 class="text-capitalize page_titel mb-5" style="">Create Poster & Enyty Page</h2>
                <ul class="" style="list-style:none;">
                    <li class="steps-style h5 text-uppercase">1 Payment</li>
                    <li class="steps-style h5 text-uppercase">2 Create poster</li>
                    <li class="steps-style h5 text-uppercase">3 create enyty page</li>
                    <li class="steps-style h5 text-uppercase fw-bold">4 QR Code Generation</li>
                </ul>

            <div class="qr_setion mt-5 text-center">
                <p class="fw-bold">Here below you can download the qr code of {{$user->frist_name}} {{$user->last_name}}, you can still find it in the clients section.</p>
                <img class="mt-3 rounded-4" src="{{ asset('qrcodes/'.$user->QrPath.'.png') }}" height="200" alt="QR Code for {{ $user->frist_name }}">
                <p class="pt-3 fw-bold">qr code of {{$user->frist_name}} {{$user->last_name}}</p>

                <a href="{{ route('company.qrcodeDownload', ['pageName' => $user->QrPath]) }}" class="text-black fw-bold">Download</a>
            </div>


        </section>
        <!-- End Hero -->
    </div>
</div>
</div>

<x-qrContentModal :data="$user"
    id="ModalForsuccessful" image="{{ asset('qrcodes/'.$user->QrPath) }}" />
<!-- End of Content Wrapper -->
@endsection
@if($success)
@push('js')
  <script>
    $('#ModalForsuccessful').modal('show');
  </script>
@endpush
@endif