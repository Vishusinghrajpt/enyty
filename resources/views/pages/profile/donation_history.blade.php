
@extends('layouts.backend.default')
@section('title') Donation History - Enyty @endsection
@section('css') 
@endsection
@section('bottom_navbar') @include('include.bottom_navbar')  @endsection
@section('sidebar') @include('include.backend.sidebar')  @endsection
  @section('content')
        <!-- Content Wrapper -->
       <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                    <section id="hero" class="d-flex flex-column justify-content-center ">
                         <div class="rounded-4 p-4 p-lg-5 col-12 col-sm-8 col-md-8 m-sm-5 m-md-5 m-lg-5 col-lg-8 msg-success" >
                          <h2 class="text-capitalize page_titel mb-5" style="    ">Donation History</h2>
                          @if($user == null)
                          <p class="text-capitalize text-gray " style="    color: gray;     font-size: 21px;   ">YOU DON'T HAVE MADE ANY DONATIONS YET</p>
                          @endif 
                          @if($user != null)
                               <table class="table">
                                    <thead>
                                      <tr class="text-muted">
                                        <th>DONATION DATE</th>
                                        <th>DONATION ID</th>
                                        <th>AMOUNT</th>
                                        <th>STATUS</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    
                                    @foreach($user as $user)
                                      <tr>
                                        <td>{{ date('m-d-Y', strtotime($user->created_at)) }}</td>
                                        <td>{{$user->id}}</td>
                                        <td> {{number_format($user->amount, 2);}} $</td>
                                        <td>{{$user->status}}</td>
                                      </tr>
                                    @endforeach 
                                    
                                    </tbody>
                                  </table>
                           @endif  
                        </div>
                    </section>
                      <!-- End Hero -->
            </div>
       </div>
    </div>
        <!-- End of Content Wrapper -->
@endsection