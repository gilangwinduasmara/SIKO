<!--begin::Chat-->
<div class="card card-custom" id="chat-container" style="display: none">
    <!--begin::Header-->
    <div class="card-header align-items-center px-4 py-3">
        <div class="text-left flex-grow-1">
            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none" id="kt_app_chat_toggle">
                <span class="svg-icon svg-icon-lg">
                    <i class="fas fa-arrow-left"></i>
                </span>
            </button>
        </div>
        <div class="text-center flex-grow-1">
            <div class="text-dark-75 font-weight-bold font-size-h5" id="chat__username"></div>
            {{-- <div>
                <span class="label label-sm label-dot label-success"></span>
                <span class="font-weight-bold text-muted font-size-sm">Active</span>
            </div> --}}
        </div>
        <div class="text-right flex-grow-1">
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Scroll-->
        <div class="scroll scroll-pull" data-mobile-height="350" style="height: 165px; overflow: hidden;">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <div id="chat-spinner" class="spinner"></div>
            </div>
            <!--begin::Messages-->
            <div class="messages" id="messages-box">

            </div>
            <!--end::Messages-->
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 165px; right: -2px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 40px;"></div></div></div>
        <!--end::Scroll-->
    </div>
    <!--end::Body-->
    <!--begin::Footer-->
    <div class="card-footer align-items-center">
        <!--begin::Compose-->
        <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
        <div class="d-flex align-items-center justify-content-between mt-5">
            {{-- <div class="mr-3">
                <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
                    <i class="flaticon2-photograph icon-lg"></i>
                </a>
                <a href="#" class="btn btn-clean btn-icon btn-md">
                    <i class="flaticon2-photo-camera icon-lg"></i>
                </a>
            </div> --}}
            <div>
                <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
            </div>
        </div>
        <!--begin::Compose-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Chat-->
