<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click"
   data-kt-menu-placement="bottom-end">
    Actions
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div
    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
    data-kt-menu="true">
    <!--begin::Menu item-->
    {{--    <div class="menu-item px-3">--}}
    {{--        <a href="{{ route('property_agents.show', $propertyAgents) }}" class="menu-link px-3">--}}
    {{--            View--}}
    {{--        </a>--}}
    {{--    </div>--}}
    <!--end::Menu item-->

    @can('edit property agent')
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3" data-kt-property_agents-id="{{ $propertyAgents->property_agent_id }}"
               data-bs-toggle="modal" data-bs-target="#kt_modal_add_property_agents" data-kt-action="update_row">
                Edit
            </a>
        </div>
    @endcan
    <!--end::Menu item-->

    @can('delete property agent')
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <a href="#" class="menu-link px-3" data-kt-property_agents-id="{{ $propertyAgents->property_agent_id  }}"
               data-kt-action="delete_row">
                Delete
            </a>
        </div>
        <!--end::Menu item-->
    @endcan
</div>
<!--end::Menu-->
