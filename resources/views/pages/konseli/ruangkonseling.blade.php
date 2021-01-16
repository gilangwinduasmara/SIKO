{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
    @php($k = 's')
    {{-- Dashboard 1 --}}
    <div class="container">
        <!--begin::Chat-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px" id="kt_chat_aside" style="display: none">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin:Search-->
                        <div class="input-group input-group-solid">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span class="svg-icon svg-icon-lg">
                                        <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/General/Search.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                            </div>
                            <input type="text" class="form-control py-4 h-auto" placeholder="Cari">
                        </div>
                        <!--end:Search-->
                        <!--begin:Users-->
                        <div class="mt-7 scroll scroll-pull ps ps--active-y" style="height: 12px; overflow: hidden;">
{{--                            @if (count($konselings) == 0)--}}
{{--                                <center>--}}
{{--                                    <span>Belum ada data</span>--}}
{{--                                </center>--}}
{{--                            @endif--}}
{{--                            @foreach ($konselings as $konseling)--}}
{{--                                @php ($konseling = json_decode(json_encode($konseling)))--}}
{{--                            <!--begin:User-->--}}
{{--                                <div class="d-flex align-items-center justify-content-between mb-5">--}}
{{--                                    <div class="d-flex align-items-center">--}}
{{--                                        <div class="symbol symbol-circle symbol-50 mr-3">--}}
{{--                                            <img alt="Pic" src={{"/avatars/".$konseling->konseli->user->avatar}}>--}}
{{--                                        </div>--}}
{{--                                        <div class="d-flex flex-column">--}}
{{--                                            <a id={{"daftarkonseli__".$konseling->id}} href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg">{{$konseling->konseli->nama_konseli}}</a>--}}
{{--                                            @if (count($konseling->chats) > 0)--}}
{{--                                                <span class="text-muted font-weight-bold font-size-sm">{{ base64_decode($konseling->chats[0]->chat_konseling) }}</span>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="d-flex flex-column align-items-end">--}}
{{--                                        <span class="text-muted font-weight-bold font-size-sm">35 mins</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!--end:User-->--}}
{{--                            @endforeach--}}
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 12px; right: -2px;"><div class="ps__thumb-y" tabindex="0" style="top: -28px; height: 40px;"></div></div></div>
                        <!--end:Users-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Aside-->
            <!--begin::Content-->
            <div class="flex-row-fluid ml-lg-8" id="kt_chat_content">
                <!--begin::Chat-->
                <div class="card card-custom" id="chat-container" >
                    <!--begin::Header-->
                    <div class="card-header align-items-center px-4 py-3">
                        <div class="text-left flex-grow-1">
                            <!--begin::Aside Mobile Toggle-->

                            <!--end::Aside Mobile Toggle-->

                        </div>
                        <div class="text-center flex-grow-1">
                            <div class="text-dark-75 font-weight-bold font-size-h5" id="chat__username"></div>
                            {{-- <div>
                                <span class="label label-sm label-dot label-success"></span>
                                <span class="font-weight-bold text-muted font-size-sm">Active</span>
                            </div> --}}
                        </div>
                        <div class="text-right flex-grow-1">
                            <!--begin::Dropdown Menu-->
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" id="button__showpersonalinformation" aria-expanded="false">
                    <span class="svg-icon svg-icon-lg">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo5/dist/assets/media/svg/icons/Communication/Add-user.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                                </button>
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md" style="">
                                    <!--begin::Navigation-->
                                    <ul class="navi navi-hover py-5">
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-drop"></i>
                                </span>
                                                <span class="navi-text">New Group</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-list-3"></i>
                                </span>
                                                <span class="navi-text">Contacts</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-rocket-1"></i>
                                </span>
                                                <span class="navi-text">Groups</span>
                                                <span class="navi-link-badge">
                                    <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                </span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-bell-2"></i>
                                </span>
                                                <span class="navi-text">Calls</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-gear"></i>
                                </span>
                                                <span class="navi-text">Settings</span>
                                            </a>
                                        </li>
                                        <li class="navi-separator my-3"></li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-magnifier-tool"></i>
                                </span>
                                                <span class="navi-text">Help</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-bell-2"></i>
                                </span>
                                                <span class="navi-text">Privacy</span>
                                                <span class="navi-link-badge">
                                    <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Navigation-->
                                </div>
                            </div>
                            <!--end::Dropdown Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Scroll-->
                        <div class="scroll scroll-pull ps ps--active-y" data-mobile-height="350" style="height: 165px; overflow: hidden;">
                            <div class="container-fluid d-flex justify-content-center align-items-center mt-30">
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
                            <div class="mr-3">
                                <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
                                    <i class="flaticon2-photograph icon-lg"></i>
                                </a>
                                <a href="#" class="btn btn-clean btn-icon btn-md">
                                    <i class="flaticon2-photo-camera icon-lg"></i>
                                </a>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                            </div>
                        </div>
                        <!--begin::Compose-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Chat-->

                {{--                @foreach ($konselings as $konseling)--}}
{{--                    @php ($konseling = json_decode(json_encode($konseling)))--}}
{{--                    @include('pages.widgets._personal-information')--}}
{{--                @endforeach--}}
            </div>
            <!--end::Content-->
        </div>
        <!--end::Chat-->
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script>
        {{--var konselings = @json($konselings);--}}
        var selectedKonselingDetail = @json($konseling);
        var user = @json($user);
        var selectedKonseling = selectedKonselingDetail.id;
    </script>
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pages/custom/chat/chat.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/dropdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/list.js') }}" type="text/javascript"></script>
{{--    <script src="{{ asset('js/src/personalinformation.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('js/src/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/src/chat.js') }}" type="text/javascript"></script>
    <script>
        showChat();
    </script>
@endsection
