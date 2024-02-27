<div class="modal fade" id="kt_modal_add_property_agents" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_property_agents_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if($edit_mode == true)
                        Edit Property Agent
                    @else
                        Add Property Agent
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
                <form id="kt_modal_add_property_agents_form" class="form" action="#" wire:submit="submit"
                      enctype="multipart/form-data">
                    <input type="hidden" wire:model="property_agent_id" name="property_agent_id"
                           value="{{ $property_agent_id }}"/>
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_property_agents_scroll"
                         data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                         data-kt-scroll-dependencies="#kt_modal_add_property_agents_header"
                         data-kt-scroll-wrappers="#kt_modal_add_property_agents_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Property</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="property_id"
                                    wire:model="property_id">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Property</option>
                                @if(!empty($properties) && count($properties) > 0)
                                    @foreach($properties as $property)
                                        <option
                                            value="{{ $property->property_id }}">{{ $property->property_name }}</option>
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
                            <label class="required fw-semibold fs-6 mb-2">Agent</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="agent_id"
                                    wire:model="agent_id">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Property</option>
                                @if(!empty($agents) && count($agents) > 0)
                                    @foreach($agents as $agent)
                                        <option
                                            value="{{ $agent->user_id }}">{{ $agent->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            @error('agent_id')
                            <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!--end::Input group-->
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
