@extends('layouts.company')
@section('title') Create Page - Enyty @endsection
@section('bottom_navbar') @include('include.bottom_navbar') @endsection
@section('sidebar') @include('include.company.sidebar') @endsection
@section('content')

@push('css')
<style>
table.dataTable thead .sorting_asc{
  background: unset !important;
}
th,td  {
    text-align: center;
}

</style>
@endpush
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <section class="d-flex flex-column justify-content-center ">
            <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success">
                <h2 class="text-capitalize page_titel mb-5" style="">Invoices</h2>
              
                @include("partials/search",[ 'dataTable' => "#invoices-table", 'dataFor' => "/company/invoices",'shortBy'=>false, 'class'=>'end'])
                <table class="table table-bordered w-100" id="invoices-table">
                    <thead>
                        <tr>
                            <th>Creation Date</th>
                            <th>Name</th>
                            <th>invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- End Hero -->
    </div>
</div>
</div>

@endsection
@push('js')
<script>
$(document).ready(function () {
    console.log('asfasdf');
    $('#invoices-table').DataTable({
        processing: true,
        serverSide: true,
        dom: 'tp',
        language: {
            paginate: {
                previous: '<<',
                next: '>>',
                zeroRecords: "Nothing found - sorry",
            },
        },
        ajax: {
            url: "/company/invoices",
            type: "GET",
        },
        drawCallback: function (json) {
            var api = this.api();
            console.log('test');
            if (json.json.recordsTotal <= 10) {
                $(api.table().container()).find('.dataTables_paginate').hide();
            } else {
                $(api.table().container()).find('.dataTables_paginate').show();
            }
        },
        columns: [
            { data: 'creation_at', name: 'creation_at' },
            { data: 'name', name: 'name' },
            { data: 'download', name: 'download' },
        ]
    });

});
</script>

@endpush