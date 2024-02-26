<div class="modal fade" id="kt_modal_add_customer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_customer_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if($edit_mode == true)
                        Edit Customer
                    @else
                        Add Customer
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
                <form id="kt_modal_add_customer_form" class="form" action="#" wire:submit="submit" enctype="multipart/form-data">
                    <input type="hidden" wire:model="customer_id" name="customer_id" value="{{ $customer_id }}"/>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">First Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="first_name" name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="First name"/>
                            <!--end::Input-->
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Last Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="last_name" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Last Name"/>
                            <!--end::Input-->
                            @error('last_name')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" wire:model="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email"/>
                            <!--end::Input-->
                            @error('email')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Phone Number</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="phone_number" name="phone_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Phone Number"/>
                            <!--end::Input-->
                            @error('phone_number')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

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
                                    <input class="form-check-input me-3" id="kt_modal_update_role_option_1" wire:model="status" name="status" type="radio" value="1" checked="checked"/>
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_1">
                                        <div class="fw-bold text-gray-800">
                                            Active
                                        </div>
                                    </label>
                                    <!--end::Label-->
                                </div>

                                <div class="form-check form-check-custom form-check-solid mx-5">
                                    <!--begin::Input-->
                                    <input class="form-check-input me-3" id="kt_modal_update_role_option_0" wire:model="status" name="status" type="radio" value="0" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <label class="form-check-label" for="kt_modal_update_role_option_0">
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
