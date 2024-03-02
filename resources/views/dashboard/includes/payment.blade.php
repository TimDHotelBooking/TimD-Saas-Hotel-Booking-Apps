<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10 h-lg-100">
    @if(!empty($no_of_payments))
        <div class="card-header pt-5">
            <div class="card-title d-flex flex-column">
                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $no_of_payments }}</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">No of Payments</span>
            </div>
        </div>
    @endif
    @if(!empty($sum_of_payments))
        <div class="card-header pt-5">
            <div class="card-title d-flex flex-column">
                <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">{{ $sum_of_payments }}</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">Total Payment Amount</span>
            </div>
        </div>
    @endif
</div>
