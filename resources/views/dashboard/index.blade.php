<x-default-layout>

    @section('title')
        Dashboard
    @endsection

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        @if (!empty($total_properties) || !empty($total_property_admin) || !empty($total_property_agent))
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                @include('dashboard.includes.total_property')
            </div>
        @endif
        @if (!empty($total_users))
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                @include('dashboard.includes.total_users')
            </div>
        @endif
        @if (!empty($no_of_bookings) && !empty($sum_of_bookings))
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                @include('dashboard.includes.booking')
            </div>
        @endif
        @if (!empty($no_of_payments) && !empty($sum_of_payments))
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                @include('dashboard.includes.payment')
            </div>
        @endif
        @if (!empty($no_of_tariff))
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                @include('dashboard.includes.tariff')
            </div>
        @endif
        @if (!empty($no_of_customers))
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                @include('dashboard.includes.customer')
            </div>
        @endif

        @if (!empty($all_properties))
            @include('dashboard.includes.all_property')
        @endif


    </div>
</x-default-layout>
