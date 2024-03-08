<!--begin::sidebar menu-->
<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <!--begin::Menu wrapper-->
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true"
         data-kt-scroll-activate="true" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
         data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3 fw-semibold fs-6" id="#kt_app_sidebar_menu"
             data-kt-menu="true" data-kt-menu-expand="false">
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('dashboard') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        <span class="menu-icon">{!! getIcon('element-7', 'fs-2') !!}</span>
                        <span class="menu-title">Dashboards</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            {{--<div class="menu-item pt-5">
                <!--begin:Menu content-->
                <div class="menu-content">
                    <span class="menu-heading fw-bold text-uppercase fs-7">Apps</span>
                </div>
                <!--end:Menu content-->
            </div>--}}
            <!--end:Menu item-->

            @canany('view property')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('property') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    @can('view property')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('property') ? 'active' : '' }}"
                               href="{{ route('property.index') }}">
                                <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                                <span class="menu-title">Property</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu link-->
                </div>
            @endcanany

            @canany('view room')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('rooms') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    @can('view room')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('rooms') ? 'active' : '' }}"
                               href="{{ route('rooms.index') }}">
                                <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                                <span class="menu-title">Rooms</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu link-->
                </div>
            @endcanany

            @canany('view tariff')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('tariff') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    @can('view tariff')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('tariff') ? 'active' : '' }}"
                               href="{{ route('tariff.index') }}">
                                <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                                <span class="menu-title">Tariff</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan()
                    <!--end:Menu link-->
                </div>
            @endcanany


            @canany('view offer')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('offers') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    @can('view offer')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('offers') ? 'active' : '' }}"
                               href="{{ route('offers.index') }}">
                                <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                                <span class="menu-title">Offers</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan()
                    <!--end:Menu link-->
                </div>
            @endcanany

            @canany('view type')
            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('type') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                @can('view type')
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ request()->routeIs('type') ? 'active' : '' }}"
                           href="{{ route('type.index') }}">
                            <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                            <span class="menu-title">Room Type</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                @endcan()
                <!--end:Menu link-->
            </div>
        @endcanany


            @canany('view property agent')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('property_agents') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    @can('view property agent')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('property_agents') ? 'active' : '' }}"
                               href="{{ route('property_agents.index') }}">
                                <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                                <span class="menu-title">Property Agents</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu link-->
                </div>
            @endcanany

            @canany('view customer')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('customers') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    @can('view customer')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('customers') ? 'active' : '' }}"
                               href="{{ route('customers.index') }}">
                                <span class="menu-icon">{!! getIcon('people', 'fs-2') !!}</span>
                                <span class="menu-title">Customers</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu link-->
                </div>
            @endcanany

            @canany('view booking')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('bookings') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    @can('view customer')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('bookings') ? 'active' : '' }}"
                               href="{{ route('bookings.index') }}">
                                <span class="menu-icon">{!! getIcon('element-2', 'fs-2') !!}</span>
                                <span class="menu-title">Bookings</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu link-->
                </div>
            @endcanany

            @canany('view payment')
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('payments') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    @can('view payment')
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link {{ request()->routeIs('payments') ? 'active' : '' }}"
                               href="{{ route('payments.index') }}">
                                <span class="menu-icon">{!! getIcon('paypal', 'fs-2') !!}</span>
                                <span class="menu-title">Payments</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                    @endcan
                    <!--end:Menu link-->
                </div>
            @endcanany

            {{--<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('agents') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->routeIs('agents') ? 'active' : '' }}" href="{{ route('agents.index') }}">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                        <span class="menu-title">Reports & Analytics</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu link-->
            </div>--}}

            <!--begin:Menu item-->
            @if(auth()->user()->isSuperAdmin() || (auth()->user()->can('view user') || auth()->user()->can('view role') || auth()->user()->can('view permission')))
                <div data-kt-menu-trigger="click"
                     class="menu-item menu-accordion {{ request()->routeIs('users.*','roles.*','permissions.*') ? 'here show' : '' }}">
                    <!--begin:Menu link-->
                    <span class="menu-link">
					<span class="menu-icon">{!! getIcon('user-square', 'fs-2') !!}</span>
					<span
                        class="menu-title">{{ \Illuminate\Support\Facades\Auth::user()->isSuperAdmin() ? 'Users & roles' : 'Users'}}</span>
					<span class="menu-arrow"></span>
				</span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        @if(auth()->user()->isSuperAdmin() || (auth()->user()->can('view user')))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                                   href="{{ route('users.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Users</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        <!--begin:Menu item-->
                        @if(auth()->user()->isSuperAdmin() || (auth()->user()->can('view role')))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ request()->routeIs('roles.*') ? 'active' : '' }}"
                                   href="{{ route('roles.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Roles</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        @if(auth()->user()->isSuperAdmin() || (auth()->user()->can('view permission')))
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link {{ request()->routeIs('permissions.*') ? 'active' : '' }}"
                                   href="{{ route('permissions.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Permissions</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        @endif
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
            @endif

            {{--<div data-kt-menu-trigger="click"
            class="menu-item menu-accordion {{ request()->routeIs('users.*','roles.*','permissions.*') ? 'here show' : '' }}">
            <!--begin:Menu link-->
            <span class="menu-link">
            <span class="menu-icon">{!! getIcon('abstract-28', 'fs-2') !!}</span>
            <span class="menu-title">Settings</span>
            <span class="menu-arrow"></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <div class="menu-sub menu-sub-accordion">
            <!--begin:Menu item-->
            <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
               href="{{ route('users.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Admin Settings</span>
            </a>
            <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('roles.*') ? 'active' : '' }}"
               href="{{ route('roles.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">System Configuration</span>
            </a>
            <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ request()->routeIs('permissions.*') ? 'active' : '' }}"
               href="{{ route('permissions.index') }}">
                <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                </span>
                <span class="menu-title">Audit Logs</span>
            </a>
            <!--end:Menu link-->
            </div>
            <!--end:Menu item-->
            </div>
            <!--end:Menu sub-->
            </div>--}}
            <!--end:Menu item-->

            <div data-kt-menu-trigger="click"
                 class="menu-item menu-accordion {{ request()->routeIs('logout') ? 'here show' : '' }}">
                <!--begin:Menu link-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="button-ajax menu-link px-5" href="#" data-action="{{ route('logout') }}"
                       data-method="post" data-csrf="{{ csrf_token() }}" data-reload="true">
                        <span class="menu-icon">{!! getIcon('element-11', 'fs-2') !!}</span>
                        Sign Out
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu link-->
            </div>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Menu wrapper-->
</div>
<!--end::sidebar menu-->
