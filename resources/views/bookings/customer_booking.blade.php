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
                            <div class="stepper-item current" data-tab-index="0" data-kt-stepper-element="nav"
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

                            <div class="stepper-item" data-tab-index="1" data-kt-stepper-element="nav"
                                 data-tab-head="booking_details">
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

                            <div class="stepper-item" data-tab-index="2" data-kt-stepper-element="nav"
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

                            <div class="stepper-item " data-tab-index="3" data-kt-stepper-element="nav"
                                 data-tab-head="booking_confirmed">
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

                            <div class="tab_content current" data-kt-stepper-element="content"
                                 data-tab="property_selection">
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
                                        <div class="text-danger" id="error_room_id"></div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="fv-row">
                                        <!--begin::Row-->
                                        <input type="hidden" class="btn-check" name="room_id" value=""
                                               id="room_id"/>
                                        @if(!empty($properties) && count($properties) > 0)
                                            @foreach($properties as $property)
                                                @if(!empty($property->rooms) && count($property->rooms) > 0)
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
                                                    <div class="row">
                                                        @foreach($property->rooms as $room)
                                                            <div class="col-lg-4">
                                                                <input type="radio" class="btn-check room_list"
                                                                       name="room_id" value="{{ $room->room_id }}"
                                                                       id="room_{{ $room->room_id }}"
                                                                       data-best_price="{{ $room->price }}"
                                                                       @if(count($room->availableDates()) == 0 && count($room->bookings) > 0) disabled @endif/>
                                                                <label
                                                                    class="btn text-start btn-outline btn-outline-dashed btn-active-light-primary p-5 mb-10"
                                                                    for="room_{{ $room->room_id }}">
                                                                    <i class="fas fa-hotel fs-2x mb-4"></i>
                                                                    <span class="d-block fw-semibold text-start">
                                                                     <span
                                                                         class="text-gray-900 fw-bold d-block fs-4 mb-2">{{ $property->property_name }}</span>
                                                                     <span
                                                                         class="text-gray-900 fw-bold d-block fs-6 mb-2">{{ $room->type->type_name }}</span>
                                                                        @if(count($room->availableDates()) == 0 && count($room->bookings) > 0)
                                                                            <span class="text-danger fw-bold d-block fs-6 mb-2">No Dates Available</span>
                                                                        @endif
                                                                </span>
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="mb-5">
                                                <span class="text-danger error">No Properties Available</span>
                                            </div>
                                        @endif
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <div class="tab_content " data-kt-stepper-element="content" data-tab="booking_details">
                                <div class="w-100">
                                    <div class="pb-10 pb-lg-15">
                                        <h2 class="fw-bold text-gray-900">Guest Details</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Number of Guests</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                {{--<input type="number"
                                                       class="form-control form-control-lg form-control-solid" min="0"
                                                       name="no_of_guests" id="no_of_guests" placeholder="" value=""/>--}}
                                                <select class="form-control form-control-lg form-control-solid"
                                                        name="no_of_guests" id="no_of_guests">
                                                </select>

                                                <!--end::Input-->
                                                <div class="text-danger" id="error_no_of_guests"></div>
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
                                                {{--<input type="number"
                                                       class="form-control form-control-lg form-control-solid" min="0"
                                                       name="no_of_rooms" id="no_of_rooms" placeholder="" value=""/>--}}
                                                <select class="form-control form-control-lg form-control-solid"
                                                        name="no_of_rooms" id="no_of_rooms">
                                                </select>
                                                <div class="text-danger" id="error_no_of_rooms"></div>
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
                                                <div class="text-danger" id="error_check_in_date"></div>
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
                                                <div class="text-danger" id="error_check_out_date"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Special Requests (if any)</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea class="form-control" id="special_requests"
                                                          name="special_requests"
                                                          placeholder="Special Requests"></textarea>
                                                <!--end::Input-->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <div class="tab_content " data-kt-stepper-element="content" data-tab="customer_information">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-15">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold text-gray-900">Primary Customer Details</h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <div class="row">
                                        <div class="col-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">First Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text"
                                                       class="form-control form-control-lg form-control-solid"
                                                       name="first_name" id="first_name" placeholder="First Name" value=""/>
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_first_name"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Last Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text"
                                                       class="form-control form-control-lg form-control-solid"
                                                       name="last_name" id="last_name" placeholder="Last Name" value=""/>
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_last_name"></div>
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
                                                       name="email" id="email" placeholder="Email" value=""/>
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_email"></div>
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
                                                       name="phone_number" id="phone_number" placeholder="Phone Number" value=""/>
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_phone_number"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Company Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text"
                                                       class="form-control form-control-lg form-control-solid"
                                                       name="company_name" id="company_name" placeholder="Company Name" value=""/>
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_company_name"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">GST</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text"
                                                       class="form-control form-control-lg form-control-solid"
                                                       name="gst" id="gst" placeholder="GST" value=""/>
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_gst"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Address</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <textarea type="tel"
                                                       class="form-control form-control-lg form-control-solid"
                                                          name="address" id="address" placeholder="Address"></textarea>
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_address"></div>
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
                                                                        <span
                                                                            class="fw-bold text-gray-800 text-hover-primary fs-5">Bank Transfer</span>
                                                                        <span class="fs-6 fw-semibold text-muted">Use images to enhance your post flow</span>
                                                                    </span>
                                                                <!--end:Description-->
													        </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="radio"
                                                                       name="payment_method"
                                                                       value="bank_transfer"/>
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
                                                               name="payment_method" value="credit_card"/>
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

                            <div class="tab_content " data-kt-stepper-element="content" data-tab="booking_confirmed">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-8 pb-lg-10">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold text-gray-900">Your booking confirmed!</h2>
                                        <!--end::Title-->
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Body-->
                                    <div class="mb-0">
                                        <div
                                            class="notice bg-light-warning rounded border-warning border border-dashed p-6">
                                            <h2 class="fw-bold text-gray-900">Guest Details</h2>
                                            <div class="row row-cols-md-2">
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">No of Guests
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_no_of_guests"></h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">No of Rooms
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_no_of_rooms"></h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Check In Date
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_check_in_date"></h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Check Out Date
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_check_out_date"></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr/>
                                            <h2 class="fw-bold text-gray-900 my-3">Primary Customer Details</h2>
                                            <div class="row row-cols-md-2">
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Name
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_name"></h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Email
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_email"></h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Phone Number
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_phone"></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr/>
                                            <h2 class="fw-bold text-gray-900 my-3">Total Bill</h2>
                                            <div class="row row-cols-md-2">
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Room Price
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold">
                                                            <span id="label_price"></span>
                                                            <span id="label_strike_price"></span>
                                                            <span id="label_holiday_price"></span>
                                                            <span id="label_promotional_price"></span>
                                                            <input type="hidden" name="price" class="text-gray-900 fw-bold" id="price">
                                                            <input type="hidden" name="holiday_price" class="text-gray-900 fw-bold" id="holiday_price">
                                                            <input type="hidden" name="promotional_price" class="text-gray-900 fw-bold" id="promotional_price">
                                                            <input type="hidden" name="is_holiday_price" class="text-gray-900 fw-bold" id="is_holiday_price">
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Total Room
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_total_room"></h4>
                                                        <input type="hidden" name="total_room" class="text-gray-900 fw-bold" id="total_room">
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Total Nights
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_total_nights"></h4>
                                                        <input type="hidden" name="total_nights" class="text-gray-900 fw-bold" id="total_nights">
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Final Amount
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_final_amount"></h4>
                                                        <input type="hidden" name="final_amount" class="text-gray-900 fw-bold" id="final_amount">
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

                var checkInDatepicker = $("#check_in_date").flatpickr({
                    enableTime: true,
                    dateFormat: "Y-m-d",
                });

                var checkOutDatepicker = $("#check_out_date").flatpickr({
                    enableTime: true,
                    dateFormat: "Y-m-d",
                });

                $("select#no_of_guests").off("change");
                $("select#no_of_guests").on("change", function () {
                    let value = $(this).val();
                    value = parseInt(value);
                    var roomsNeeded = Math.ceil(value / 2);
                    $('select#no_of_rooms').val(roomsNeeded);
                });

                $("button.btn_continue").off('click');
                $("button.btn_continue").on('click', function () {
                    let current_tab_name = $("div.tab_content.current").data('tab');
                    let current_tab_index = $("div[data-tab-head=" + current_tab_name + "]").data('tab-index');
                    if (current_tab_index == 0) {
                        if ($(".room_list").length > 0) {
                            let room_id = $("input#room_id").val();
                            if (room_id.length == 0) {
                                $("#error_room_id").text("Please choose one property room")
                            } else {
                                $("#error_room_id").text("");
                                $.ajax({
                                    type: "GET",
                                    url: '/rooms/get-room-tariffs/' + room_id,
                                    success: function (response, status, xhr) {
                                        let availableDates = response.data.availableDates || undefined;
                                        let room = response.data.room || undefined;
                                        if (availableDates !== undefined && availableDates.length > 0) {
                                            var enabledDates = [];
                                            availableDates.forEach(function (availableDate) {
                                                let startDate = new Date(availableDate.start_date);
                                                startDate.setDate(startDate.getDate()); // Adjusting start date to make it inclusive

                                                let endDate = new Date(availableDate.end_date);

                                                // Push start date and end date to the array
                                                enabledDates.push({from: startDate, to: endDate});

                                                // Loop through each date range and push dates to the array
                                                let currentDate = new Date(startDate);
                                                while (currentDate < endDate) {
                                                    enabledDates.push(new Date(currentDate));
                                                    currentDate.setDate(currentDate.getDate() + 1);
                                                }
                                            });
                                            checkInDatepicker.set('enable', enabledDates);
                                            checkOutDatepicker.set('enable', enabledDates);
                                        }


                                        let no_of_rooms = room.no_of_rooms;
                                        if (no_of_rooms != undefined) {
                                            no_of_rooms = parseInt(no_of_rooms);
                                            for (var i = 1; i <= no_of_rooms; i++) {
                                                $('select#no_of_rooms').append($('<option>', {
                                                    value: i,
                                                    text: i
                                                }));
                                            }
                                            let no_of_guests = no_of_rooms * 2;
                                            for (var i = 1; i <= no_of_guests; i++) {
                                                $('select#no_of_guests').append($('<option>', {
                                                    value: i,
                                                    text: i
                                                }));
                                            }
                                        }
                                    },
                                    error: function (response) {
                                        toastr.error(
                                            "Please try it again later.",
                                            "Something went wrong!",
                                            {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                                        );
                                    },
                                });
                                showNextTab(current_tab_name, current_tab_index);
                            }
                        }
                    } else if (current_tab_index == 1) {
                        let no_of_guests = $("#no_of_guests").val();
                        let no_of_rooms = $("#no_of_rooms").val();
                        let check_in_date = $("#check_in_date").val();
                        let check_out_date = $("#check_out_date").val();
                        let special_requests = $("#special_requests").val();

                        let is_error = false;
                        if (no_of_guests == undefined || no_of_guests == null || no_of_guests == "") {
                            is_error = true;
                            $("#error_no_of_guests").text("This field is required")
                        }
                        if (no_of_rooms == undefined || no_of_rooms == null || no_of_rooms == "") {
                            is_error = true;
                            $("#error_no_of_rooms").text("This field is required")
                        }
                        if (check_in_date == undefined || check_in_date == null || check_in_date == "") {
                            is_error = true;
                            $("#error_check_in_date").text("This field is required")
                        }
                        if (check_out_date == undefined || check_out_date == null || check_out_date == "") {
                            is_error = true;
                            $("#error_check_out_date").text("This field is required")
                        }
                        if (!is_error) {
                            showNextTab(current_tab_name, current_tab_index);
                        }
                    } else if (current_tab_index == 2) {
                        let first_name = $("#first_name").val();
                        let last_name = $("#last_name").val();
                        let email = $("#email").val();
                        let phone_number = $("#phone_number").val();
                        let address = $("#address").val();
                        let payment_method = $("input[name=payment_method]").val();

                        let is_error = false;
                        if (first_name == undefined || first_name == null || first_name == "") {
                            is_error = true;
                            $("#error_first_name").text("This field is required")
                        }
                        if (last_name == undefined || last_name == null || last_name == "") {
                            is_error = true;
                            $("#error_last_name").text("This field is required")
                        }
                        if (email == undefined || email == null || email == "") {
                            is_error = true;
                            $("#error_email").text("This field is required")
                        }
                        if (phone_number == undefined || phone_number == null || phone_number == "") {
                            is_error = true;
                            $("#error_phone_number").text("This field is required");
                        }
                        if (address == undefined || address == null || address == "") {
                            is_error = true;
                            $("#error_address").text("This field is required");
                        }
                        if (!is_error) {
                            showNextTab(current_tab_name, current_tab_index);
                        }
                    }
                });

                $("button.btn_submit").off('click');
                $("button.btn_submit").on('click', function () {
                    let room_id = $("input#room_id").val();
                    let no_of_guests = $("#no_of_guests").val();
                    let no_of_rooms = $("#no_of_rooms").val();
                    let check_in_date = $("#check_in_date").val();
                    let check_out_date = $("#check_out_date").val();
                    let special_requests = $("#special_requests").val();
                    let first_name = $("#first_name").val();
                    let last_name = $("#last_name").val();
                    let email = $("#email").val();
                    let phone_number = $("#phone_number").val();
                    let company_name = $("#company_name").val();
                    let gst = $("#gst").val();
                    let address = $("#address").val();
                    let payment_method = $("input[name=payment_method]").val();
                    let holiday_price = $("input[type=hidden]#price").val();
                    let is_holiday_price = $("input[type=hidden]#is_holiday_price").val();
                    let total_nights = $("input[type=hidden]#total_nights").val();
                    let total_room = $("input[type=hidden]#total_room").val();
                    let final_amount = $("input[type=hidden]#final_amount").val();
                    $.ajax({
                        type: "POST",
                        url: "{{ route("bookings.store") }}",
                        data: {
                            'room_id': room_id,
                            'no_of_guests': no_of_guests,
                            'no_of_rooms': no_of_rooms,
                            'check_in_date': check_in_date,
                            'check_out_date': check_out_date,
                            'special_requests': special_requests,
                            'first_name': first_name,
                            'last_name': last_name,
                            'email': email,
                            'phone_number': phone_number,
                            'payment_method': payment_method,
                            'company_name': company_name,
                            'gst': gst,
                            'address': address,
                            'price': price,
                            'holiday_price': holiday_price,
                            'is_holiday_price': is_holiday_price,
                            'total_nights': total_nights,
                            'total_room': total_room,
                            'final_amount': final_amount,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token in the headers
                        },
                        success: function (response, status, xhr) {
                            if (response.status == 'success') {
                                toastr.success(
                                    "Booking successfully register for customer",
                                    {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                                );
                                setTimeout(function () {
                                    window.location.href = "{{ route("bookings.index") }}"
                                }, 500);
                            }else if(response.status == "bill_generate"){
                                console.log("bill")
                            }else{
                                toastr.error(
                                    response.msg,
                                    {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                                );
                            }
                        },
                        error: function (response) {
                            toastr.error(
                                "Please try it again later.",
                                "Something went wrong!",
                                {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                        },
                    });
                });

                $("input.room_list").off('click');
                $("input.room_list").on('click', function () {
                    let value = $(this).val();
                    if (value != undefined) {
                        $("input[type=hidden]#room_id").val(value);
                    }
                });
            });

            function showPreviousTab() {
                let current_tab_name = $("div.tab_content.current").data('tab');
                let current_tab_element = $("div[data-tab-head=" + current_tab_name + "]");
                let current_tab_index = current_tab_element.data('tab-index');
                let current_tab_content_element = $("div[data-tab=" + current_tab_name + "].tab_content");
                let prev_tab_index = parseInt(current_tab_index) - 1;
                let prev_tab_element = $("div[data-tab-index=" + prev_tab_index + "]");
                let prev_tab_head = prev_tab_element.data('tab-head');
                let prev_tab_content_element = $("div[data-tab=" + prev_tab_head + "].tab_content");
                current_tab_element.removeClass("current mark-completed");
                current_tab_content_element.removeClass("current");
                // prev_tab_element.addClass("current");
                prev_tab_content_element.addClass("current");
                if (prev_tab_index == 0) {
                    $("button.btn_previous").hide();
                }
                if (prev_tab_index < 3) {
                    $("button.btn_submit").hide();
                    $("button.btn_continue").show();
                }
            }

            function showNextTab(current_tab_name, current_tab_index) {
                let current_tab_element = $("div[data-tab-head=" + current_tab_name + "]");
                let current_tab_content_element = $("div[data-tab=" + current_tab_name + "].tab_content");
                let next_tab_index = parseInt(current_tab_index) + 1;
                let next_tab_element = $("div[data-tab-index=" + next_tab_index + "]");
                let next_tab_head = next_tab_element.data('tab-head');
                let next_tab_content_element = $("div[data-tab=" + next_tab_head + "].tab_content");
                current_tab_element.addClass("current mark-completed");
                current_tab_content_element.removeClass("current");
                next_tab_element.addClass("current");
                next_tab_content_element.addClass("current");
                $("button.btn_previous").show();
                if (next_tab_index == 3) {
                    $("button.btn_continue").hide();
                    $("button.btn_submit").show();
                    showBookingConfirmed();
                }
            }

            function showBookingConfirmed(){
                let first_name = $("#first_name").val();
                let last_name = $("#last_name").val();
                let email = $("#email").val();
                let phone_number = $("#phone_number").val();
                $("#label_name").text(first_name + " " + last_name);
                $("#label_email").text(email);
                $("#label_phone").text(phone_number);

                let no_of_rooms = $("#no_of_rooms").val();
                let no_of_guests = $("#no_of_guests").val();
                let check_in_date = $("#check_in_date").val();
                let check_out_date = $("#check_out_date").val();
                $("#label_no_of_rooms").text(no_of_rooms);
                $("#label_no_of_guests").text(no_of_guests);
                $("#label_check_in_date").text(check_in_date);
                $("#label_check_out_date").text(check_out_date);


                $.ajax({
                    type: "POST",
                    url: '/bookings/calculate-room-booking-amount/',
                    data:{
                      "room_id" : $("#room_id").val(),
                      "check_in_date" : $("#check_in_date").val(),
                      "check_out_date" : $("#check_out_date").val(),
                      "no_of_guests" : $("#no_of_guests").val(),
                      "no_of_rooms" : $("#no_of_rooms").val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token in the headers
                    },
                    success: function (response, status, xhr) {
                        let data = response.data || undefined;
                        if(response.status == "success"){
                            if(data != undefined){
                                if(data.is_holiday_price){
                                    $("#label_strike_price").text(data.rate_per_night);
                                    $("#label_holiday_price").text(data.holiday_rate_per_night);
                                    $("input[type=hidden]#price").val(data.holiday_rate_per_night);
                                    $("input[type=hidden]#holiday_price").val(data.holiday_rate_per_night);
                                }else{
                                    $("#label_price").text(data.rate_per_night);
                                    $("input[type=hidden]#price").text(data.rate_per_night);
                                }
                                $("input[type=hidden]#is_holiday_price").val(data.is_holiday_price);

                                $("#label_total_nights").text(data.total_night);
                                $("input[type=hidden]#total_nights").val(data.total_night);


                                $("#label_total_room").text(data.total_rooms);
                                $("input[type=hidden]#total_room").val(data.total_rooms);


                                $("#label_final_amount").text(data.total_amount);
                                $("input[type=hidden]#final_amount").val(data.total_amount);
                            }
                        }else{
                            toastr.error(
                                response.msg,
                                {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                        }
                    },
                    error: function (response) {
                        toastr.error(
                            "Please try it again later.",
                            "Something went wrong!",
                            {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                        );
                    },
                });

            }

        </script>
    @endpush
@endsection
