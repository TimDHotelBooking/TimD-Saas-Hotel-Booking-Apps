@extends('layout.master')
@section('title','Add Booking')
@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Multi-steps-->
        <div
            class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep"
            id="kt_create_account_stepper">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
                <div
                    class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center"
                    style="background-image:url('{{ asset('assets/media/misc/auth-bg.png') }}')">
                    <!--begin::Header-->
                    <div class="d-flex flex-center py-10 py-lg-20">
                        <!--begin::Logo-->
                        <a href="{{ route("dashboard") }}">
                            <img alt="Logo" src="{{ asset('assets/media/logos/custom-1.png') }}" class="h-70px"/>
                        </a>
                        <!--end::Logo-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="d-flex flex-row-fluid justify-content-center p-10">
                        <!--begin::Nav-->
                        <div class="stepper-nav">
                            <div class="stepper-item current" data-kt-stepper-element="nav"
                                 data-tab-head="property_selection">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon rounded-3">
                                        <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-2">Property Selection</h3>
                                        <div class="stepper-desc fw-normal">Select your Property</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Line-->
                                <div class="stepper-line h-40px"></div>
                                <!--end::Line-->
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav" data-tab-head="booking_details">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon rounded-3">
                                        <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-2">Guest Details &amp; Booking</h3>
                                        <div class="stepper-desc fw-normal">Select your Guest Details &amp; Booking
                                        </div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Line-->
                                <div class="stepper-line h-40px"></div>
                                <!--end::Line-->
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav"
                                 data-tab-head="customer_information">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon rounded-3">
                                        <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-2">Customer Information</h3>
                                        <div class="stepper-desc fw-normal">Customer Information, Payment, and Booking
                                            Confirmation
                                        </div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Line-->
                                <div class="stepper-line h-40px"></div>
                                <!--end::Line-->
                            </div>

                            <div class="stepper-item " data-kt-stepper-element="nav" data-tab-head="booking_confirmed">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon">
                                        <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Booking Confirmation</h3>
                                        <div class="stepper-desc fw-normal">Your booking completed</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                            </div>

                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-center flex-wrap px-5 py-10">
                        <!--begin::Links-->
                        <div class="d-flex fw-normal">
                            <a href="https://keenthemes.com" class="text-success px-5" target="_blank">Terms</a>
                            <a href="https://devs.keenthemes.com" class="text-success px-5" target="_blank">Plans</a>
                            <a href="https://1.envato.market/EA4JP" class="text-success px-5" target="_blank">Contact
                                Us</a>
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form">

                            <div class="current" data-kt-stepper-element="content" data-tab="property_selection">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-15">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold d-flex align-items-center text-gray-900">Choose Your Property
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                  title="Billing is issued based on your selected account typ">
												<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</span></h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                            <a href="#" class="link-primary fw-bold">Help Page</a>.
                                        </div>
                                        <div class="text-danger" id="error_property_id"></div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <input type="hidden" class="btn-check" name="property_id" value=""
                                                   id="property_id"/>
                                            @if(!empty($properties) && count($properties) > 0)
                                                @foreach($properties as $property)
                                                    <div class="mb-5">
                                                        <span
                                                            class="text-gray-900 fw-bold d-block fs-4 mb-2">{{ $property->property_name }}</span>
                                                        <span
                                                            class="text-muted fw-semibold fs-6 d-flex align-items-start">
                                                        <i class="fas fa-map-marker-alt text-muted me-2 mt-1"></i>
                                                        {{ $property->location }}
                                                    </span>
                                                        <span
                                                            class="text-muted fw-semibold fs-6 d-flex align-items-start">
                                                        <i class="fas fa-phone text-muted me-2 mt-1"></i>
                                                        {{ $property->contact_information }}
                                                    </span>
                                                    </div>
                                                    @if(!empty($property->rooms) && count($property->rooms) > 0)
                                                        @foreach($property->rooms as $room)
                                                            <div class="col-lg-6">
                                                                <input type="radio" class="btn-check property_list"
                                                                       name="property" value="{{ $room->room_id }}"
                                                                       id="room_{{ $room->room_id }}"/>
                                                                <label
                                                                    class="btn text-start btn-outline btn-outline-dashed btn-active-light-primary p-5 mb-10"
                                                                    for="room_{{ $room->room_id }}">
                                                                    <i class="fas fa-hotel fs-2x mb-4"></i>
                                                                    <span class="d-block fw-semibold text-start">
                                                                     <span
                                                                         class="text-gray-900 fw-bold d-block fs-4 mb-2">{{ $property->property_name }}</span>
                                                                     <span
                                                                         class="text-gray-900 fw-bold d-block fs-6 mb-2">{{ $room->room_type }}</span>
                                                                </span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <div class="" data-kt-stepper-element="content" data-tab="booking_details">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-15">
                                        <h2 class="fw-bold text-gray-900">Guest Details</h2>
                                        <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                            <a href="#" class="link-primary fw-bold">Help Page</a>.
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Number of Guests</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number"
                                                       class="form-control form-control-lg form-control-solid" min="0"
                                                       name="account_name" placeholder="" value=""/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="col-md-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Number of Rooms</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="number"
                                                       class="form-control form-control-lg form-control-solid" min="0"
                                                       name="account_name" placeholder="" value=""/>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Check-in Date</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="Pick a date"
                                                       name="check_in_date" id="check_in_date"/>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Check-Out Date</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder="Pick a date"
                                                       name="check_out_date" id="check_out_date"/>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Special Requests (if any)</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea class="form-control"
                                                          placeholder="Special Requests"></textarea>
                                                <!--end::Input-->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <div class="" data-kt-stepper-element="content" data-tab="customer_information">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-15">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold text-gray-900">Customer Details</h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-muted fw-semibold fs-6">If you need more info, please check out
                                            <a href="#" class="link-primary fw-bold">Help Page</a>.
                                        </div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <div class="row">
                                        <div class="col-12">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Customer Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text"
                                                       class="form-control form-control-lg form-control-solid"
                                                       name="account_name" placeholder="" value=""/>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Email</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email"
                                                       class="form-control form-control-lg form-control-solid"
                                                       name="account_name" placeholder="" value=""/>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Phone Number</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel"
                                                       class="form-control form-control-lg form-control-solid"
                                                       name="account_name" placeholder="" value=""/>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <div class="col-md-12">
                                            <!--begin::Input group-->
                                            <div class="mb-0 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center form-label mb-5">Payment Method
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                          title="Monthly billing will be based on your account plan">
												<i class="ki-duotone ki-information-5 text-gray-500 fs-6">
													<span class="path1"></span>
													<span class="path2"></span>
													<span class="path3"></span>
												</i>
											</span></label>
                                                <!--end::Label-->
                                                <!--begin::Options-->
                                                <div class="row mb-0">
                                                    <div class="col-md-6">
                                                        <!--begin:Option-->
                                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
														<!--begin::Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label">
																<i class="ki-duotone ki-bank fs-1 text-gray-600">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
														</span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
														<span class="d-flex flex-column">
															<span class="fw-bold text-gray-800 text-hover-primary fs-5">Bank Transfer</span>
															<span class="fs-6 fw-semibold text-muted">Use images to enhance your post flow</span>
														</span>
                                                                <!--end:Description-->
													</span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" name="account_plan"
                                                               value="1"/>
													</span>
                                                            <!--end:Input-->
                                                        </label>
                                                    </div>
                                                    <!--end::Option-->
                                                    <div class="col-md-6">
                                                        <!--begin:Option-->
                                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                            <!--begin:Label-->
                                                            <span class="d-flex align-items-center me-2">
														<!--begin::Icon-->
														<span class="symbol symbol-50px me-6">
															<span class="symbol-label">
																<i class="ki-duotone ki-chart fs-1 text-gray-600">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
														</span>
                                                                <!--end::Icon-->
                                                                <!--begin::Description-->
														<span class="d-flex flex-column">
															<span class="fw-bold text-gray-800 text-hover-primary fs-5">Credit Card</span>
															<span class="fs-6 fw-semibold text-muted">Use images to your post time</span>
														</span>
                                                                <!--end:Description-->
													</span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
														<input class="form-check-input" type="radio" checked="checked"
                                                               name="account_plan" value="2"/>
													</span>
                                                            <!--end:Input-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="mt-5 text-end">
                                            <button type="button" class="btn btn-success">Update Payment Info

                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <div class="" data-kt-stepper-element="content" data-tab="booking_confirmed">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-8 pb-lg-10">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold text-gray-900">Your booking confirmed!</h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-muted fw-semibold fs-6">If you need more info, please
                                            <a href="authentication/layouts/corporate/sign-in.html"
                                               class="link-primary fw-bold">Sign In</a>.
                                        </div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Body-->
                                    <div class="mb-0">
                                        <!--begin::Text-->
                                        <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as much
                                            an art as it is a science and probably warrants its own post, but for all
                                            advise is with what works for your great & amazing audience.
                                        </div>
                                        <!--end::Text-->
                                        <!--begin::Alert-->
                                        <!--begin::Notice-->
                                        <div
                                            class="notice bg-light-warning rounded border-warning border border-dashed p-6">
                                            <!--begin::Icon-->
                                            <!--
                                                                                            <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                                                                                <span class="path1"></span>
                                                                                                <span class="path2"></span>
                                                                                                <span class="path3"></span>
                                                                                            </i>
                                            -->
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="row row-cols-md-2">
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Name
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold">ashhas nashusa</h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Email
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold">xbfxd@cdf.com</h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Phone Number
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold">54544 544454</h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Rooms Booked
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold">5</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-stack pt-15">
                                <div class="mr-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3 btn_previous"
                                            data-kt-stepper-action="previous">
                                        <i class="ki-duotone ki-arrow-left fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>Previous
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-lg btn-primary btn_submit"
                                            data-kt-stepper-action="submit">
											<span class="indicator-label">Submit
											<i class="ki-duotone ki-arrow-right fs-4 ms-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i></span>
                                        <span class="indicator-progress">Please wait...
											<span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <button type="button" class="btn btn-lg btn-primary btn_continue"
                                            data-kt-stepper-action="next">Continue
                                        <i class="ki-duotone ki-arrow-right fs-4 ms-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i></button>
                                </div>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Multi-steps-->
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                $("button.btn_previous").off('click');
                $("button.btn_previous").on('click', function () {
                    showPreviousTab();
                });

                $("button.btn_continue").off('click');
                $("button.btn_continue").on('click', function () {
                    let current_tab_name = $("div.stepper-item.current").data('tab-head');
                    if (current_tab_name == 'property_selection') {
                        let property_id = $("input#property_id").val();
                        if (property_id.length == 0) {
                            $("#error_property_id").text("Please choose one property")
                        } else {
                            $("#error_property_id").text("");
                            /*$.ajax({
                                type: "GET",
                                url: '/bookings/get-property-rooms/' + property_id,
                                success: function (response, status, xhr) {
                                    console.log(response);
                                },
                                error: function (response) {
                                    toastr.error(
                                        "Please try it again later.",
                                        "Something went wrong!",
                                        {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                                    );
                                },
                            });*/
                            showNexTab();
                        }
                    }
                    //showNexTab(current_tab_name);
                });

                $("button.btn_submit").off('click');
                $("button.btn_submit").on('click', function () {
                    alert("hjere");
                });

                $("#check_in_date").flatpickr({
                    enableTime: true,
                    dateFormat: "Y-m-d",
                });
                $("#check_out_date").flatpickr({
                    enableTime: true,
                    dateFormat: "Y-m-d",
                });

                $("input.property_list").off('click');
                $("input.property_list").on('click', function () {
                    let value = $(this).val();
                    if (value != undefined) {
                        $("input[type=hidden]#property_id").val(value);
                    }
                });
            });

            function showPreviousTab() {
                let current_tab_element = $('div.stepper-item.current:not(.mark-completed)');
                let get_prev_element = $("div.stepper-item.current:not([class*=' '])");
                let current_tab_name = current_tab_element.data("tab-head");
                current_tab_element.removeClass("current mark-completed").prev().addClass("current");
                $("div[data-tab='" + current_tab_name + "']").removeClass("current").prev().addClass("current");
                if (current_tab_name == 'booking_confirmed') {
                    $("button.btn_continue").show();
                    $("button.btn_submit").hide();
                }
                if ($("div.stepper-item:first").length == 1 && ) {
                    $("button.btn_previous").hide();
                }
            }

            function showNexTab() {
                let current_tab_element = $('div.stepper-item.current:not(.mark-completed)');
                let current_tab_name = current_tab_element.data("tab-head");
                current_tab_element.addClass("mark-completed").next().addClass("current");
                $("div[data-tab='" + current_tab_name + "'].current").removeClass("current").next().addClass("current");
                $("button.btn_previous").show();
                if ($("div.stepper-item:last").length == 1 && $("div.stepper-item:last").hasClass("current")) {
                    $("button.btn_continue").hide();
                    $("button.btn_submit").show();
                }
            }
        </script>
    @endpush
@endsection
