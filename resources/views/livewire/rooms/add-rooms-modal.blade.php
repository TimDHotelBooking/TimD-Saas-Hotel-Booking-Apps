<div class="modal fade" id="kt_modal_add_rooms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_rooms_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if($edit_mode == true)
                        Edit Room
                    @else
                        Add Room
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
                <form id="kt_modal_add_rooms_form" class="form" action="#" wire:submit="submit" enctype="multipart/form-data">
                    <input type="hidden" wire:model="room_id" name="room_id" value="{{ $room_id }}"/>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_rooms_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_rooms_header" data-kt-scroll-wrappers="#kt_modal_add_rooms_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Property</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="property_id" wire:model="property_id">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Property</option>
                                @if(!empty($properties) && count($properties) > 0)
                                    @foreach($properties as $property)
                                        <option value="{{ $property->property_id }}" >{{ $property->property_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            @error('property_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Room Type</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="room_type" name="room_type" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Room Type"/>
                            <!--end::Input-->
                            @error('room_type')
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

                        <div class="mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-5">Availability Status</label>
                            <!--end::Label-->
                            @error('availability_status')
                            <span class="text-danger">{{ $message }}</span> @enderror
                            <!--begin::Roles-->
                            <!--begin::Input row-->
                            <div class="d-flex flex-column fv-row">

                                <div class="form-check form-check-custom form-check-solid mx-5 my-2">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="{{  \App\Models\Rooms::AVAILABLE_STATUS }}" wire:model="availability_status" name="availability_status" type="radio" value="{{ \App\Models\Rooms::AVAILABLE_STATUS }}" checked="checked"/>
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="{{  \App\Models\Rooms::AVAILABLE_STATUS }}">
                                        <div class="fw-bold text-gray-800">
                                            {{  \App\Models\Rooms::AVAILABLE_STATUS }}
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="form-check form-check-custom form-check-solid mx-5 my-2">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="{{  \App\Models\Rooms::BOOKED_STATUS }}" wire:model="availability_status" name="availability_status" type="radio" value="{{  \App\Models\Rooms::BOOKED_STATUS }}" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="{{  \App\Models\Rooms::BOOKED_STATUS }}">
                                        <div class="fw-bold text-gray-800">
                                            {{  \App\Models\Rooms::BOOKED_STATUS }}
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="form-check form-check-custom form-check-solid mx-5 my-2">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="{{  \App\Models\Rooms::OCCUPIED_STATUS }}" wire:model="availability_status" name="availability_status" type="radio" value="{{  \App\Models\Rooms::OCCUPIED_STATUS }}" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="{{  \App\Models\Rooms::OCCUPIED_STATUS }}">
                                        <div class="fw-bold text-gray-800">
                                            {{  \App\Models\Rooms::OCCUPIED_STATUS }}
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="form-check form-check-custom form-check-solid mx-5 my-2">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="{{  \App\Models\Rooms::MAINTENANCE_STATUS }}" wire:model="availability_status" name="availability_status" type="radio" value="{{  \App\Models\Rooms::MAINTENANCE_STATUS }}" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="{{  \App\Models\Rooms::MAINTENANCE_STATUS }}">
                                        <div class="fw-bold text-gray-800">
                                            {{  \App\Models\Rooms::MAINTENANCE_STATUS }}
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="form-check form-check-custom form-check-solid mx-5 my-2">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="{{  \App\Models\Rooms::CLEANING_STATUS }}" wire:model="availability_status" name="availability_status" type="radio" value="{{  \App\Models\Rooms::CLEANING_STATUS }}" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="{{  \App\Models\Rooms::CLEANING_STATUS }}">
                                        <div class="fw-bold text-gray-800">
                                            {{  \App\Models\Rooms::CLEANING_STATUS }}
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>
                            </div>
                            <!--end::Input row-->
                            <!--end::Roles-->
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
                                    <input class="form-check-input me-3" id="kt_modal_update_rooms_option_1" wire:model="status" name="status" type="radio" value="1" checked="checked"/>
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_rooms_option_1">
                                        <div class="fw-bold text-gray-800">
                                            Active
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="form-check form-check-custom form-check-solid mx-5">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="kt_modal_update_rooms_option_0" wire:model="status" name="status" type="radio" value="0" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_rooms_option_0">
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
