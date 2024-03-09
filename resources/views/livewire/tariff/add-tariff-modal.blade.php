<div class="modal fade" id="kt_modal_add_tariff" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_tariff_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if($edit_mode == true)
                        Edit Tariff
                    @else
                        Add Tariff
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
                <form id="kt_modal_add_tariff_form" class="form" action="#" wire:submit="submit" enctype="multipart/form-data">
                    <input type="hidden" wire:model="tariff_id" name="tariff_id" value="{{ $tariff_id }}"/>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_tariff_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_tariff_header" data-kt-scroll-wrappers="#kt_modal_add_tariff_scroll" data-kt-scroll-offset="300px">
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
                            <label class="required fw-semibold fs-6 mb-2">Start Date</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" wire:model="start_date" name="start_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Start Date"/>
                            <!--end::Input-->
                            @error('start_date')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">End Date</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" wire:model="end_date" name="end_date" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="End Date"/>
                            <!--end::Input-->
                            @error('end_date')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Price</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="price" name="price" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Price"/>
                            <!--end::Input-->
                            @error('price')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Holiday Price</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="holiday_price" name="holiday_price" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Holiday Price"/>
                            <!--end::Input-->
                            @error('holiday_price')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Promotional Price</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="promotional_price" name="promotional_price" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Promotional Price"/>
                            <!--end::Input-->
                            @error('promotional_price')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-5">Status</label>
                            <!--end::Label-->
                            @error('status')
                            <span class="text-danger">{{ $message }}</span> @enderror
                            <!--begin::Roles-->
                            <!--begin::Input row-->
                            <div class="d-flex fv-row">

                                <div class="form-check form-check-custom form-check-solid mx-5">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="kt_modal_update_tariff_option_1" wire:model="status" name="status" type="radio" value="1" checked="checked"/>
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_tariff_option_1">
                                        <div class="fw-bold text-gray-800">
                                            Active
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="form-check form-check-custom form-check-solid mx-5">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="kt_modal_update_tariff_option_0" wire:model="status" name="status" type="radio" value="0" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_tariff_option_0">
                                        <div class="fw-bold text-gray-800">
                                            In Active
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                            </div>
                            <!--end::Input row-->
                            <!--end::Roles-->
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
