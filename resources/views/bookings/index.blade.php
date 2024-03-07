<x-default-layout>

    @section('title')
        Booking
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                           class="form-control form-control-solid w-250px ps-13" placeholder="Search booking"
                           id="mySearchInput"/>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            @can("create booking")
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Add booking-->
                        @if(\Illuminate\Support\Facades\Auth::user()->isPropertyAgent())
                            <a href="{{ route('bookings.create') }}" class="btn btn-primary" >
                                {!! getIcon('plus', 'fs-2', '', 'i') !!}
                                Add Booking
                            </a>
                        @else
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_booking">
                                {!! getIcon('plus', 'fs-2', '', 'i') !!}
                                Add Booking
                            </button>
                        @endif
                        <!--end::Add booking-->
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::Modal-->
                    <livewire:bookings.add-booking-modal></livewire:bookings.add-booking-modal>
                    <!--end::Modal-->
                </div>
            @endcan
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['booking-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_booking').modal('hide');
                    window.LaravelDataTables['booking-table'].ajax.reload();
                });
            });
        </script>
    @endpush

</x-default-layout>
