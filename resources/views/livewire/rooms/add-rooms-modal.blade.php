<div class="modal fade" id="kt_modal_add_rooms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-hidden="true" wire:ignore.self>
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-lg modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_rooms_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">
                    @if ($edit_mode == true)
                        Edit Room
                    @else
                        Add Room
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
                <form id="kt_modal_add_rooms_form" class="form" action="#" wire:submit="submit"
                    enctype="multipart/form-data">
                    <input type="hidden" wire:model="room_id" name="room_id" value="{{ $room_id }}" />
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_rooms_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_rooms_header"
                        data-kt-scroll-wrappers="#kt_modal_add_rooms_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Property</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="property_id"
                                wire:model="selectedProperty" wire:change="updateData">
                                <option aria-hidden="true" aria-disabled="true" value="">Select Property</option>
                                @if (!empty($properties) && count($properties) > 0)
                                    @foreach ($properties as $property)
                                        <option value="{{ $property->property_id }}">{{ $property->property_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                         
                            <!--end::Input-->
                            @error('selectedProperty')
                                <span  class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Room Type</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-control form-control-solid  mb-3 mb-lg-0" name="room_type_id"
                                wire:model="room_type_id" >
                                <option aria-hidden="true" aria-disabled="true" value="">Select Room Type</option>
                                @if (!empty($room_types) && count($room_types) > 0)
                                    @foreach ($room_types as $room_type)
                                        <option value="{{ $room_type->type_id }}">{{ $room_type->type_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            <!--end::Input-->
                            @error('room_type_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">No of Rooms</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select class="form-control form-control-solid  mb-3 mb-lg-0" id="selected_number"
                                name="selected_number" wire:model="selected_number">
                                <option aria-hidden="true" aria-disabled="true" value="">No of Rooms</option>
                                @for ($ii = 1; $ii < 30; $ii++)
                                    <option value="{{ $ii }}">{{ $ii }}</option>
                                @endfor
                            </select>
                            <!--end::Input-->
                            @error('no_of_rooms')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <div type="button" class="btn btn-primary" wire:click="updateData">Generate </div>



                      
                        <?php 
                        if($selected_number > 0) {
                            ?>
                            <table width="100%" class="table mt-2"/>
                            <tr><td>Sl No</td><td>Floor</td><td>Room No</td></tr>
                            <?php 
                            for($aa=1; $aa <= $selected_number;$aa++ )
                             {
                                $index = $aa - 1;
                                ?>
                                <tr>
                                    <td>{{$aa}}</td>
                                    <td><select name="floor[]" wire:model="formData.{{ $index }}.floor"  class="form-control form-control-solid  mb-3 mb-lg-0"><option value="">Select</option><option value="Ground">Ground</option><option value="First">First</option><option value="Second">Second</option><option value="Third">Third</option><option value="Fourth">Fourth</option><option value="Fifth">Fifth</option></select>
                                        @error("formData.$index.floor") <span class="text-danger">Select Floor</span> @enderror
                                    </td>
                                    <td><input type="text" name="room_number[]" wire:model="formData.{{ $index }}.room_number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Room Number" />
                                        @error("formData.$index.room_number") <span class="text-danger">Type Room Number</span> @enderror
                                    </td></tr>
                                <?php 
                             } 
                             ?>
                             </table>
                             <?php 
                            } ?>
                               


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

