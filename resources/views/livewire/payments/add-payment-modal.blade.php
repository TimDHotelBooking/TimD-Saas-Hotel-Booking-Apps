<div class="modal fade" id="kt_modal_add_payment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_payment_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if($edit_mode == true)
                        Edit Payment
                    @else
                        Add Payment
                    @endif
                </h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" wire:click="dismiss" data-bs-dismiss="modal"
                     aria-label="Close">
                    {!! getIcon('cross','fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_payment_form" class="form" action="#" wire:submit="submit"
                      enctype="multipart/form-data">
                    <input type="hidden" wire:model="payment_id" name="payment_id" value="{{ $payment_id }}"/>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_payment_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_payment_header"
                         data-kt-scroll-wrappers="#kt_modal_add_payment_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Booking</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="booking_id"
                                    wire:model="booking_id">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Booking</option>
                                @if(!empty($bookings) && count($bookings) > 0)
                                    @foreach($bookings as $booking)
                                        <option value="{{ $booking->booking_id }}">{{ $booking->full_details }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            @error('booking_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Amount Paid</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="amount_paid" name="amount_paid"
                                   class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Amount Paid"/>
                            <!--end::Input-->
                            @error('amount_paid')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Payment Date</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="datetime-local" wire:model="payment_date" name="payment_date"
                                   class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Payment Date"/>
                            <!--end::Input-->
                            @error('payment_date')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Payment Method</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="payment_method"
                                    wire:model="payment_method">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Payment Method</option>
                                <option value="online">Online</option>
                                <option value="card">Debit/Credit Card</option>
                                <option value="cash">Cash</option>
                            </select>
                            <!--end::Input-->
                            @error('payment_method')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Transaction Reference</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="transaction_reference" name="transaction_reference"
                                   class="form-control form-control-solid mb-3 mb-lg-0"
                                   placeholder="Transaction Reference"/>
                            <!--end::Input-->
                            @error('transaction_reference')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" wire:click="dismiss" class="btn btn-light me-3" data-bs-dismiss="modal"
                                aria-label="Close" wire:loading.attr="disabled">Discard
                        </button>
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
