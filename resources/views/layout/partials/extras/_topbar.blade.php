{{-- Topbar --}}
<div class="topbar pr-8">
{{--
    @if (config('layout.extras.search.display'))
        @if (config('layout.extras.search.layout') == 'offcanvas')
            <div class="topbar-item">
                <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_search_toggle">
                    {{ Metronic::getSVG("media/svg/icons/General/Search.svg", "svg-icon-xl svg-icon-primary") }}
                </div>
            </div>
        @else
            <div class="dropdown" id="kt_quick_search_toggle">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
                       {{ Metronic::getSVG("media/svg/icons/General/Search.svg", "svg-icon-xl svg-icon-primary") }}
                    </div>
                </div>

                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    @include('layout.partials.extras.dropdown._search-dropdown')
                </div>
            </div>
        @endif
    @endif

    @if (config('layout.extras.notifications.display'))
        @if (config('layout.extras.notifications.layout') == 'offcanvas')
            <div class="topbar-item">
                <div class="btn btn-icon btn-clean btn-lg mr-1 pulse pulse-primary" id="kt_quick_notifications_toggle">
                    {{ Metronic::getSVG("media/svg/icons/Code/Compiling.svg", "svg-icon-xl svg-icon-primary") }}
                    <span class="pulse-ring"></span>
                </div>
            </div>
        @else
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        {{ Metronic::getSVG("media/svg/icons/Code/Compiling.svg", "svg-icon-xl svg-icon-primary") }}
                        <span class="pulse-ring"></span>
                    </div>
                </div>

                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <form>
                        @include('layout.partials.extras.dropdown._notifications')
                    </form>
                </div>
            </div>
        @endif
    @endif

    @if (config('layout.extras.quick-actions.display'))
        @if (config('layout.extras.quick-actions.layout') == 'offcanvas')
            <div class="topbar-item">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1" id="kt_quick_actions_toggle">
                    {{ Metronic::getSVG("media/svg/icons/Media/Equalizer.svg", "svg-icon-xl svg-icon-primary") }}
                </div>
            </div>
        @else
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                        {{ Metronic::getSVG("media/svg/icons/Media/Equalizer.svg", "svg-icon-xl svg-icon-primary") }}
                    </div>
                </div>

                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    @include('layout.partials.extras.dropdown._quick-actions')
                </div>
            </div>
        @endif
    @endif

    @if (config('layout.extras.cart.display'))
        <div class="dropdown">
            <div class="topbar-item"  data-toggle="dropdown" data-offset="10px,0px">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                    {{ Metronic::getSVG("media/svg/icons/Shopping/Cart3.svg", "svg-icon-xl svg-icon-primary") }}
                </div>
            </div>

            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
                <form>
                    @include('layout.partials.extras.dropdown._cart')
                </form>
            </div>
        </div>
    @endif

    @if (config('layout.header.topbar.quick-panel.display'))
        <div class="topbar-item">
            <div class="btn btn-icon btn-clean btn-lg mr-1" id="kt_quick_panel_toggle">
                {{ Metronic::getSVG("media/svg/icons/Layout/Layout-4-blocks.svg", "svg-icon-xl svg-icon-primary") }}
            </div>
        </div>
    @endif --}}

    {{-- Languages --}}
    @if (true)
        <div class="dropdown">
            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                    <i class="flaticon2-notification position-relative" >
                        <div id="notif-badge"  class="bg-primary p-2 rounded-lg position-absolute" style="top: -5px; right: -5px; display: none"></div>
                    </i>
                </div>
            </div>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                <ul class="navi navi-hover py-4" id="dropdown-notif">
                    <li class="navi-item">
                        <div class="navi-text">
                            <div class="font-weight-bold text-center">Belum ada chat</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dropdown">
            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                    <i class="flaticon-chat position-relative" >
                        <div id="chat-badge" class="bg-primary p-2 rounded-lg position-absolute" style="top: -5px; right: -5px; display: none"></div>
                    </i>
                </div>
            </div>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                <ul class="navi navi-hover py-4" id="dropdown-chat">
                    <li class="navi-item">
                        <div class="navi-text">
                            <div class="font-weight-bold text-center">Belum ada chat</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dropdown">
            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                <div class="btn btn-icon btn-dropdown w-auto btn-clean d-flex align-items-center btn-lg px-2">
                    <div class="symbol symbol-25">
                        <img class="img-fit" src={{"/avatars/default.jpg"}} alt="image">
                    </div>
                </div>
            </div>
            <div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                <ul class="navi navi-hover py-4">
                    <li class="navi-item">
                        <a href="#" class="navi-link">
                            <div class="navi-text">
                                <div class="font-weight-bold">Ganti Password</div>
                            </div>
                        </a>
                    </li>
                    <li class="navi-item">
                        <a href="/logout" class="navi-link">
                            <div class="navi-text">
                                <div class="font-weight-bold">Logout</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endif

    {{-- User --}}
    {{-- @if (config('layout.extras.user.display'))
        @if (config('layout.extras.user.layout') == 'offcanvas')
            <div class="topbar-item">
                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                    <div class="symbol symbol-25">
                        <img src="/avatars/default.jpg" alt="image">
                    </div>
                </div>
            </div>
        @else
            <div class="dropdown">
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Sean</span>
                        <span class="symbol symbol-35 symbol-light-success">
                            <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                        </span>
                    </div>
                </div>
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    @include('layout.partials.extras.dropdown._user')
                </div>
            </div>
        @endif
    @endif --}}
</div>
