<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10 h-lg-100" >
    @if(!empty($total_properties))
        <div class="card-header pt-5">
            <div class="card-title d-flex flex-column">
                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $total_properties }}</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Properties</span>
            </div>
        </div>
    @endif
    @if(!empty($total_property_admin))
        <div class="card-header pt-5">
            <div class="card-title d-flex flex-column">
                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $total_property_admin }}</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Property Admin</span>
            </div>
        </div>
    @endif
    @if(!empty($total_property_agent))
        <div class="card-header pt-5">
            <div class="card-title d-flex flex-column">
                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $total_property_agent }}</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Property Agent</span>
            </div>
        </div>
    @endif
</div>
