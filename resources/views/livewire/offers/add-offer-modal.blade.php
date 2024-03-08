<div class="modal fade" id="kt_modal_add_offer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_offer_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if($edit_mode == true)
                        Edit Offer
                    @else
                        Add Offer
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
                <form id="kt_modal_add_offer_form" class="form" action="#" wire:submit="submit" enctype="multipart/form-data">
                    <input type="hidden" wire:model="offer_id" name="offer_id" value="{{ $offer_id }}"/>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_offer_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_offer_header" data-kt-scroll-wrappers="#kt_modal_add_offer_scroll" data-kt-scroll-offset="300px">
                        {{-- @if(!Auth::user()->isPropertyAdmin())
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-semibold fs-6 mb-2"> Admin</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-control form-control-solid  mb-3 mb-lg-0" name="admin_id" wire:model="admin_id">
                                    <option aria-hidden="true" aria-disabled="true" value="">Select Property</option>
                                    @if(!empty($property_admins) && count($property_admins) > 0)
                                        @foreach($property_admins as $property_admin)
                                            <option @if(!empty($property_admin->property_admin_id == $property_admin->user_id)) selected @endif value="{{ $property_admin->user_id }}" >{{ $property_admin->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <!--end::Input-->
                                @error('admin_id')
                                <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!--end::Input group-->
                        @else
                            <input type="hidden" wire:model="admin_id" name="admin_id" value="{{ Auth::user()->user_id }}"/>
                        @endif --}}
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Offer Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="offer_name" name="offer_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Offer Name"/>
                            <!--end::Input-->
                            @error('offer_name')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Discount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="discount" name="discount" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Discount"/>
                            <!--end::Input-->
                            @error('discount')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Max_amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="max_amount" name="max_amount" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Max_amount"/>
                            <!--end::Input-->
                            @error('max_amount')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Min_amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="min_amount" name="min_amount" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Min_amount"/>
                            <!--end::Input-->
                            @error('min_amount')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Coupon_code</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="coupon_code" name="coupon_code" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Coupon_code"/>
                            <!--end::Input-->
                            @error('coupon_code')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" wire:model="description" name="description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Description"/>
                            <!--end::Input-->
                            @error('description')
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
