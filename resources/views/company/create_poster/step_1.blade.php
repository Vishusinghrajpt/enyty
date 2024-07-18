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
                    <li class="steps-style fw-bold h5 text-uppercase">1 Payment</li>
                    <li class="steps-style h5 text-uppercase">2 Create poster</li>
                    <li class="steps-style h5 text-uppercase">3 create enyty page</li>
                    <li class="steps-style h5 text-uppercase">4 QR Code Generation</li>
                </ul>

                @include('partials/companyDonationBtn')
        </section>
        <!-- End Hero -->
    </div>
</div>
</div>
<!-- End of Content Wrapper -->
@endsection
@push('js')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{asset('js/stripe.js')}}"></script>
@endpush