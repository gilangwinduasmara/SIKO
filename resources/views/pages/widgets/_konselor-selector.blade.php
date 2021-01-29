@php($days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'])
<!--begin::Chat-->
<div class="empty-state h-100">
    <div class="card card-custom row h-100" >
        <!--begin::Header-->
        <div class="card-header align-items-center px-4 py-3">
            <div class="text-left flex-grow-1">
                <!--begin::Aside Mobile Toggle-->

                <!--end::Aside Mobile Toggle-->
                <!--begin::Dropdown Menu-->

                <!--end::Dropdown Menu-->
            </div>
            <div class="text-center flex-grow-1">
                <div class="text-dark-75 font-weight-bold font-size-h5" id="chat__username">{{$title ?? "Daftar Sesi Konseling"}}</div>
                <span class="font-weight-bold text-muted font-size-sm" id="selected_konselor"></span>
                {{-- <div>
                    <span class="label label-sm label-dot label-success"></span>
                    <span class="font-weight-bold text-muted font-size-sm">Active</span>
                </div> --}}
            </div>
            <div class="text-right flex-grow-1">
                <!--begin::Dropdown Menu-->

                <!--end::Dropdown Menu-->
            </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body">

        </div>
    </div>
</div>
<div class="card card-custom row" id="chat-container" style="display: none">
    <!--begin::Header-->
    <div class="card-header align-items-center px-4 py-3">
        <div class="text-left flex-grow-1">
            <!--begin::Aside Mobile Toggle-->

            <!--end::Aside Mobile Toggle-->
            <!--begin::Dropdown Menu-->

            <!--end::Dropdown Menu-->
        </div>
        <div class="text-center flex-grow-1">
            <div class="text-dark-75 font-weight-bold font-size-h5" id="chat__username">{{$title ?? "Daftar Sesi Konseling"}}</div>
            <span class="font-weight-bold text-muted font-size-sm" id="selected_konselor"></span>
            {{-- <div>
                <span class="label label-sm label-dot label-success"></span>
                <span class="font-weight-bold text-muted font-size-sm">Active</span>
            </div> --}}
        </div>
        <div class="text-right flex-grow-1">
            <!--begin::Dropdown Menu-->

            <!--end::Dropdown Menu-->
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <div class="text-center mb-10">Pilih jadwal Konselor yang tersedia</div>

        <div class="row">
            <div class="col">
                <div class="card card-custom gutter-b card-stretch">
                    <div class="card-body p-0">
                        <ul class="dashboard-tabs nav nav-pills nav-warning row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist">
                            @foreach($days as $day)
                            <li id={{"list_hari__".ucwords($day)}} class="nav-item d-flex col-sm flex-grow-1 flex-shrink-0 mr-3 mb-3 mb-lg-0">
                                <a id={{"day_item__".ucwords($day)}} class="nav-link py-3 d-flex flex-grow-1 rounded flex-column align-items-center" data-toggle="" data-value={{ucwords($day)}} >
                                    <span class="font-size-lg py-2 font-weight-bold text-center">{{ucwords($day)}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content m-0 p-0">
                            <div class="tab-pane active" id="forms_widget_tab_1" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_2" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_3" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_4" role="tabpanel"></div>
                            <div class="tab-pane" id="forms_widget_tab_6" role="tabpanel"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-3" id="jadwal">
            <ul class="dashboard-tabs nav nav-pills nav-warning row row-paddingless m-0 p-0 flex-column flex-sm-row" role="tablist" id="ul__days_selector">

            </ul>
        </div>
        </div>
        <form class="row d-flex justify-content-center align-items-center" id={{$submit['form_id']??"form_daftar_sesi"}}>
            <input id="input__konselor_id" type="text" hidden name="konselor_id">
            <input id="input__jadwal_konselor_id" type="text" hidden name="jadwal_konselor_id">

            <div class="col-sm-2">
                <button type="submit" id="button__daftar_sesi" href="/daftarsesi" class="btn btn-warning btn-shadow-hover font-weight-bolder w-100 py-3" disabled>
                    {{$submit['button_title']??"Daftar Sesi"}}
                </button>
            </div>
        </form>
    </div>
</div>
<!--end::Chat-->
