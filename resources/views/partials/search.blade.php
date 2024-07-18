@push('css')
<style>
    ul.dropdown-menu {
    background: #F5F5F5;
    width: 300px;
    left: unset !important;
    right: 0 !important;
}
</style>

@endpush
<div class="row" style="justify-content: space-between;">
    <div class="col-12 col-xl-8 col-sm-6 col-md-6" style=" position: relative;">
        <form action="" method="post" data-type="table-filter" class="form"
            data-table=" {{$dataTable ?? '#user_poster'}} " data-for="{{$dataFor ?? 'commemorations'}}">
            <input type="hidden" name="_token" value="PVMuCvQD0eHqnNAxzjQRFlmR9bkU7d8JSb0Mhip7" autocomplete="off">
            <input type="text" class="form-control mb-3 rounded-4 searchbox" name="searchName" placeholder="Search"
                id="input_name" aria-label="notification" aria-describedby="basic-addon4" onkeyup="$('.form').submit()"
                autocomplete="off" style="width: 260px;">

            <img class="search-img" src="{{asset('Assets/iconoir_search.png')}}" height="22"
                style="position: absolute; top:19px;left: 223px;">

            <input type="hidden" class="form-control input-event input-elevated search" name="section"
                placeholder="Search" id="input_section" aria-label="notification" aria-describedby="basic-addon4"
                autocomplete="off">

            <input type="hidden" class="form-control input-event input-elevated search" name="weekly"
                placeholder="Search" id="input_weekly" aria-label="notification" aria-describedby="basic-addon4"
                autocomplete="off">

            <input type="hidden" class="form-control input-event input-elevated search" name="monthly"
                placeholder="Search" id="input_monthly" aria-label="notification" aria-describedby="basic-addon4"
                autocomplete="off">

            <input type="hidden" class="form-control input-event input-elevated search" name="loadMore"
                placeholder="Search" id="input_loadMore" aria-label="notification" aria-describedby="basic-addon4"
                autocomplete="off">

            <input type="hidden" class="form-control input-event input-elevated search" name="NameAscDesc"
                placeholder="Search" id="NameAscDesc" aria-label="notification" aria-describedby="basic-addon4"
                autocomplete="off">

            <input type="hidden" class="form-control input-event input-elevated search" name="AscDesc"
                placeholder="Search" id="created_at" aria-label="notification" aria-describedby="basic-addon4"
                autocomplete="off">

            <input type="hidden" class="form-control input-event input-elevated search" name="location" id="searchLocation" aria-label="notification" aria-describedby="basic-addon4" autocomplete="off">
            <input type="hidden" class="form-control input-event input-elevated search" name="emptyTableMass" id="emptyTableMass" aria-label="notification" aria-describedby="basic-addon4" autocomplete="off">


        </form>
    </div>
    <div class="d-flex d-flex justify-content-{{$class ?? 'end'}} col-12 col-xl-4 col-sm-5 col-md-5 " id="filter">
        <div class="Filter1 me-3" style="width: 115px; position: relative;">
            <button class="form-control mb-3 rounded-4 px-2" type="button" id="Filter-dropdown"
                style="height:65px;padding-left: 22px !important; padding-right: 22px !important; text-align: justify;">Filter
                <img src="{{asset('Assets/setting_1.svg')}}" height="22" width=""
                    style="position: absolute;margin-left:22px; ">
            </button>
            <div class="dropdown">
                <ul class=" filter dropdown-menu p-3" style="display: none;">
                    <div class="d-flex justify-content-between " style="font-size:20px;">Filter
                        <img src="{{asset('Assets/setting_1.svg')}}" height="22" width="" style="">
                    </div>
                    <div class="">
                        <li class="d-flex justify-content-between  fw-bold" style="font-size:20px;">
                            <div class="p-3 justify-content-between w-100 cursor-pointer"
                                onclick="showHidefuc('#name__form_sec','#name_m')" id="name_m" style="display: flex;">
                                <span>Name</span>
                                <img src="{{asset('Assets/ep_arrow-down.svg')}}" height="22" width="" style="">
                            </div>
                            <div class="apend-data Name p-3 bg-white rounded-4 my-1 w-100" id="name__form_sec"
                                style="display: none;">
                                <div class="d-flex justify-content-between"
                                    onclick="showHidefuc('#name_m','#name__form_sec')" style="color: gray;">
                                    Name
                                    <img class="cursor-pointer" src="/Assets/ep_arrow-down.svg" height="22" width=""
                                        style="transform: rotate(180deg);">
                                </div>
                                <form action="" method="post" style="position: relative;">
                                    <input type="hidden" value="Name" id="Name" name="filtertype">
                                    <input type="text" id="Name" data-id="Name" onkeyup="searchdata('#input_name',$(this).val())"
                                        class="form-control mb-3 rounded-3" placeholder="Search"
                                        style="height: 58px; background: #F5F5F5;     border: none;">
                                    <img class="search-img" src="/Assets/iconoir_search.png" height="22"
                                        style="position: absolute; top:17px;left: 190px;">
                                </form>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between fw-bold dropdown" style="font-size:20px;">
                            <div class="p-3 justify-content-between w-100 cursor-pointer"
                                onclick="showHidefuc('#location__form_sec','#Location_m')" id="Location_m"
                                style="display: flex;">
                                <span>Location</span>
                                <img src="{{asset('Assets/ep_arrow-down.svg')}}" height="22" width="" style="">
                            </div>

                            <div class="apend-data Location p-3 bg-white rounded-4 my-1 w-100" id="location__form_sec"
                                style="display: none;">
                                <div class="d-flex justify-content-between" id="lo_li"
                                    onclick="showHidefuc('#Location_m','#location__form_sec')" style="color: gray;">
                                    Location
                                    <img class="cursor-pointer" src="/Assets/ep_arrow-down.svg" height="22" width=""
                                        style="transform: rotate(180deg);">
                                </div>
                                <form class="m-0 city_form_sec" action="" method="post" style="position: relative;">
                                    <input type="hidden" value="Location" id="Location" name="filtertype">
                                    <select id="selectpicker" placeholder="Search" class="form-control select2-hidden-accessible" onchange="searchdata('#searchLocation',$(this).val())" multiple=""
                                        style="width: 100%;" data-select2-id="selectpicker" tabindex="-1"
                                        aria-hidden="true">

                                    </select>

                                    <img class="search-img" src="/Assets/iconoir_search.png" height="22"
                                        style="position: absolute; top: 17px;left: 190px;">
                                    <span class="selected-values" id="selected-values"></span>
                                </form>
                            </div>
                        </li>
                        <div class="collapse bg-white" id="selectarea"></div>
                    </div>
                    <div class="filterBtn12" style="display: none;">
                        <!-- <button><span>Apply filter </span></button> -->
                        <button onclick="clearAllFilter()"><span>Clear All Filters </span></button>
                    </div>
                </ul>
            </div>
        </div>

        @if($shortBy ?? true) 
        <div class="Sort_By" style="width: 141px; position: relative;">
            <button class="form-control mb-3 rounded-4 px-2" type="button" id="Short-dropdown"
                style="height:65px;padding-left: 22px !important; padding-right: 22px !important;     text-align: justify;">Short
                By
                <img src="{{asset('Assets/ep_arrow-down.svg')}}" height="22" width=""
                    style="position: absolute; margin-left:22px;">
            </button>
       
            <div class="dropdown">
                <ul class=" shortBy dropdown-menu p-3" style="display: none;">
                    <div class="d-flex justify-content-between " style="font-size:20px;">Short By
                        <img src="{{asset('Assets/ep_arrow-down.svg')}}" height="22" width=""
                            style="    transform: rotate(180deg); ">
                    </div>
                    <div class="">
                        <li class="d-flex justify-content-between  fw-bold" style="font-size:20px;">
                            <div class="p-3 d-flex justify-content-between cursor-pointer w-100" id="Date"
                                onclick="shortby(this.id)">
                                <span>Date</span>
                                <img src="{{asset('Assets/ep_arrow-down.svg')}}" height="22" width="" style="">
                            </div>
                        </li>
                        <li class="d-flex justify-content-between  fw-bold" style="font-size:20px;">
                            <div class="p-3 d-flex justify-content-between w-100 cursor-pointer" id="Alphabetically"
                                onclick="shortby(this.id)">
                                <span>Alphabetically</span>
                                <img src="{{asset('Assets/ep_arrow-down.svg')}}" height="22" width="" style="">
                            </div>
                        </li>
                    </div>
                </ul>
            </div>
       
        </div>
        @endif
    </div>
</div>