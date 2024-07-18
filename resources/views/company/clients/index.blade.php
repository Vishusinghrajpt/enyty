@extends('layouts.company')
@section('title') Create Page - Enyty @endsection
@section('css')
<style>
#users-table_wrapper table.dataTable thead .sorting_asc {
    background: unset !important;
}

#users-table {
    width: 100% !important;
}

.fa.fa-edit {
    color: #465A7B;
}

#profile-section-images,
#collapseOne {
    width: 100%;
}

.hide-eternity-div {
    width: 97%;
}
</style>
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
                <h2 class="text-capitalize page_titel mb-5" style="">Clients</h2>

                @include("partials/search",[ 'dataTable' => "#users-table", 'dataFor' =>
                "/company/clients",'shortBy'=>false, 'class'=>'end'])

                <table class="table table-bordered table-responsive" id="users-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Creation Date</th>
                            <th>Name</th>
                            <th>Commemoration Page</th>
                            <th>Poster</th>
                            <th>QR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <div id="collapseOne" class="accordion-collapse collapse mt-5" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body ">
                        <div class="d-flex text-center flex-column">
                            <p class="text-capitalize"> <i class="fa fa-long-arrow-left mr-4" onclick="collapsHide()"
                                    style="color:red; cursor: pointer;"></i> Profile of fred b. Jonson</p>
                        </div>
                        <div class="newPosterData">
                            @include("partials.userAndCopnayPos",['user'=>$user,'poster'=> $companyUser])

                        </div>
                    </div>
                </div>


            </div>
        </section>
        <!-- End Hero -->
    </div>
</div>
</div>


<!-- End of Content Wrapper -->
@endsection

@push('js')
<script>
function collapsHide() {
    $('.fa.fa-edit').each(function() {
        $(this).css('color', '#465A7B');
    });
    $('#collapseOne').hide();

}

function newUserData(id) {
    $('.fa.fa-edit').each(function() {
        $(this).css('color', '#465A7B');
    });
    var userId = id;
    $.ajax({
        url: "{{route('company.fetch_user_data')}}",
        method: 'get',
        data: {
            userId: userId
        },
        success: function(response) {
            $('.editBtn' + userId).css('color', 'red');
            var newUserHTML = response;
            $('.newPosterData').html(newUserHTML);
            var paginateDiv = $('#users-table_paginate');
            var usersTableDiv = $('#users-table');
            var collapseOneDiv = $('#collapseOne');
            collapseOneDiv.insertAfter(usersTableDiv);
            $('#collapseOne').show()

        },
        error: function(xhr, status, error) {
            console.error('Error fetching user data:', error);
        }
    });
}
</script>
@endpush