<div class="modal fade" id="kt_modal_add_booking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_booking_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if($edit_mode == true)
                        Edit Booking
                    @else
                        Add Booking
                    @endif
                </h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" wire:click="dismiss" data-bs-dismiss="modal" aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_booking_form" class="form" action="#" wire:submit="submit" enctype="multipart/form-data">
                    <input type="hidden" wire:model="booking_id" name="booking_id" value="{{ $booking_id }}"/>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_booking_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_booking_header" data-kt-scroll-wrappers="#kt_modal_add_booking_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Customer</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="customer_id" wire:model="customer_id">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Customer</option>
                                @if(!empty($customers) && count($customers) > 0)
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->customer_id }}" >{{ $customer->full_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            @error('customer_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Room</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="room_id" wire:model="room_id">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Room</option>
                                @if(!empty($rooms) && count($rooms) > 0)
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->room_id }}" >{{ (!empty($room->property) ? $room->property->property_name.' - '. $room->room_type : $room->room_type) }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            @error('room_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Check In Date</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" wire:model="check_in_date" name="check_in_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Check In Date" />
                            <!--end::Input-->
                            @error('check_in_date')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Check Out Date</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" wire:model="check_out_date" name="check_out_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Check Out Date"/>
                            <!--end::Input-->
                            @error('check_out_date')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Total Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="total_amount" name="total_amount" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Total Amount"/>
                            <!--end::Input-->
                            @error('total_amount')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" wire:click="dismiss" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close" wire:loading.attr="disabled">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label" wire:loading.remove>Submit</span>
                            <span class="indicator-progress" wire:loading wire:target="submit">
                                Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
