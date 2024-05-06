<div class="modal fade" id="kt_modal_add_type" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_type_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if ($edit_mode == true)
                        Edit Room Type
                    @else
                        Add Room Type
                    @endif
                </h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" wire:click="dismiss" data-bs-dismiss="modal"
                    aria-label="Close">
                    {!! getIcon('cross', 'fs-1') !!}
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_type_form" class="form" action="#" wire:submit="submit"
                    enctype="multipart/form-data">
                    <input type="hidden" wire:model="type_id" name="type_id" value="{{ $type_id }}" />
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_type_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_type_header"
                        data-kt-scroll-wrappers="#kt_modal_add_type_scroll" data-kt-scroll-offset="300px">

                         
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="type_name" name="type_name"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Type Name" />
                            <!--end::Input-->
                            @error('type_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea wire:model="description" name="description" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Description"></textarea>
                            <!--end::Input-->
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Amenity</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="amenity_id[]"
                                wire:model="amenity_id" multiple="multiple">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Amenity</option>
                                @if (!empty($amenities) && count($amenities) > 0)
                                    @foreach ($amenities as $amenity)
                                        <option value="{{ $amenity->amenity_id }}">{{ $amenity->amenity_name }}</option>
                                    @endforeach
                                @endif
                            </select>

                            <!--end::Input-->
                            @error('amenity_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Facility</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="facility_id[]"
                                wire:model="facility_id" multiple="multiple">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Facility</option>
                                @if (!empty($amenities) && count($amenities) > 0)
                                    @foreach ($amenities as $amenity)
                                        <option value="{{ $amenity->amenity_id }}">{{ $amenity->amenity_name }}</option>
                                    @endforeach
                                @endif
                            </select>

                            <!--end::Input-->
                            @error('facility_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Maximum Occupancy</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" wire:model="maximum_occupancy" name="maximum_occupancy"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Maximum Occupancy" />
                            <!--end::Input-->
                            @error('maximum_occupancy')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->



                        <div class="mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-5">Status</label>
                            <!--end::Label-->
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--begin::Roles-->
                            <!--begin::Input row-->
                            <div class="d-flex fv-row">

                                <div class="form-check form-check-custom form-check-solid mx-5">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="kt_modal_update_type_option_1"
                                        wire:model="status" name="status" type="radio" value="1"
                                        checked="checked" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_type_option_1">
                                        <div class="fw-bold text-gray-800">
                                            Active
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="form-check form-check-custom form-check-solid mx-5">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="kt_modal_update_type_option_0"
                                        wire:model="status" name="status" type="radio" value="0" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_type_option_0">
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
                        <button type="reset" wire:click="dismiss" class="btn btn-light me-3" data-bs-dismiss="modal"
                            aria-label="Close" wire:loading.attr="disabled">Discard</button>
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
