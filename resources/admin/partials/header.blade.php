<div id="kt_header" class="kt-header kt-grid__item kt-header--fixed " >
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel" data-ktmenu-submenu-toggle="click" aria-haspopup="true">
                    <a href="{{route('admin.home')}}" class="kt-menu__link " target="_blank">
                        <span class="kt-menu__link-text">{{__('base.control_panel')}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="kt-header__topbar">
        @php($user=auth()->user())
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-username kt-hidden-mobile">{{config('app.name')}}</span>
                    <img class="kt-hidden" alt="Pic" src="{{asset('assets/media/users/300_25.jpg')}}" />
                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">ا</span>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{asset('assets/media/misc/bg-1.jpg')}})">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic" src="{{asset('assets/media/users/300_25.jpg')}}" />
                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">E</span>
                    </div>
                    <div class="kt-user-card__name"> {{config('app.name')}} </div>
                </div>
                <!--end: Head -->
                <!--begin: Navigation -->
                <div class="kt-notification">
                    <a href="{{route('admin.admins.profile.get')}}" class="kt-notification__item">
                        <div class="kt-notification__item-icon"> <i class="flaticon2-calendar-3 kt-font-success"></i> </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold"> {{__('base.profile')}} </div>
                            <div class="kt-notification__item-time"> {{__('base.settings')}} </div>
                        </div>
                    </a>
                    <div class="kt-notification__custom kt-space-between"> <a href="{{route('admin.logout')}}" class="btn btn-label btn-label-brand btn-sm btn-bold">تسجيل الخروج</a> </div>
                </div>
                <!--end: Navigation -->
            </div>
        </div>
    </div>
</div>
