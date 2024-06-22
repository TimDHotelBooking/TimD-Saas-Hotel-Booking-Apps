@extends('layout.master')
@section('title', 'Add Booking')
@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Multi-steps-->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep"
            id="kt_create_account_stepper">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
                <div class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center"
                    style="background-image:url('{{ asset('assets/media/misc/auth-bg.png') }}')">
                    <!--begin::Header-->
                    <div class="d-flex flex-center py-10 py-lg-20">
                        <!--begin::Logo-->

                        <a href="{{ route('dashboard') }}">
                            <img alt="Logo" src="{{ asset('assets/media/logos/TIMD logo_RGB.png') }}" class="h-70px" />
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
                            <div class="stepper-item" data-tab-index="3" data-kt-stepper-element="nav"
                                data-tab-head="payment_information">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon rounded-3">
                                        <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title fs-2">Payment Information</h3>
                                        <div class="stepper-desc fw-normal">Pay
                                        </div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Line-->
                                <div class="stepper-line h-40px"></div>
                                <!--end::Line-->
                            </div>

                            <div class="stepper-item " data-tab-index="4" data-kt-stepper-element="nav"
                                data-tab-head="booking_confirmed">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon">
                                        <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Booking Preview</h3>
                                        <div class="stepper-desc fw-normal">Your all details</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                                <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item " data-tab-index="5" data-kt-stepper-element="nav"
                                data-tab-head="confirmation">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon">
                                        <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">6</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Confirmation</h3>
                                        <div class="stepper-desc fw-normal">A successfull confirm</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Line-->
                                {{-- <div class="stepper-line h-40px"></div> --}}
                                <!--end::Line-->
                            </div>

                            {{-- <div class="stepper-item " data-tab-index="4" data-kt-stepper-element="nav"
                                data-tab-head="select_payment_meth">
                                <!--begin::Wrapper-->
                                <div class="stepper-wrapper">
                                    <!--begin::Icon-->
                                    <div class="stepper-icon">
                                        <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Label-->
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">Select Payment Mode</h3>
                                        <div class="stepper-desc fw-normal">Complete your payment</div>
                                    </div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Wrapper-->
                            </div> --}}

                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-center flex-wrap px-5 py-10">
                        <!--begin::Links-->
                        <div class="d-flex fw-normal">
                            <a href="#" class="text-success px-5">Terms</a>
                            <a href="#" class="text-success px-5">Plans</a>
                            <a href="#" class="text-success px-5">Contact Us</a>
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
                        <form class="my-auto pb-5" novalidate="novalidate" id="kt_create_account_form"
                            enctype="multipart/form-data">

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
                                            </span>
                                        </h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <div class="text-danger" id="error_room_id"></div>
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <!--begin::Label-->
                                    <label class="fw-semibold fs-6 mb-2">Amenity & Facility</label>
                                    <!--end::Label-->

                                    <select class="form-control form-control-solid  mb-3 mb-lg-0" name="amenity_id[]"
                                        multiple="multiple" id="amenity_id">
                                        <option aria-hidden="true" aria-disabled="true" value="">Select Amenity &
                                            Facility</option>
                                        @if (!empty($aminities) && count($aminities) > 0)
                                            @foreach ($aminities as $amenity)
                                                <option value="{{ $amenity->amenity_id }}">{{ $amenity->amenity_name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <button type="button" class="btn btn-lg btn-primary mt-4 mb-4"
                                        onclick="search()">Search
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        </i></button>
                                    <div class="mb-5 d-none" id="search">
                                        <span class="text-danger error">Please Select Aminity</span>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row" id="property">
                                        <!--begin::Row-->

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
                                                {{-- <input type="number"
                                                       class="form-control form-control-lg form-control-solid" min="0"
                                                       name="no_of_guests" id="no_of_guests" placeholder="" value=""/> --}}
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
                                                {{-- <input type="number"
                                                       class="form-control form-control-lg form-control-solid" min="0"
                                                       name="no_of_rooms" id="no_of_rooms" placeholder="" value=""/> --}}
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
                                                    name="check_in_date" id="check_in_date" />
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
                                                    name="check_out_date" id="check_out_date" />
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
                                                <textarea class="form-control" id="special_requests" name="special_requests" placeholder="Special Requests"></textarea>
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

                                        <div class="col-md-12">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Phone Number</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="phone_number" id="phone_number" placeholder="Phone Number"
                                                    value="" />
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_phone_number"></div>
                                                <div class="f-group" id="chk_btn">

                                                    <button type="button" class="btn btn-success mt-2"
                                                        style="border-radius: 0 0.25rem 0.25rem 0; padding: 10px 20px"
                                                        onclick='checkcustomer()'>Check
                                                        Customer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-none" id="cus_details">
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
                                                        name="first_name" id="first_name" placeholder="First Name"
                                                        value="" />
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
                                                        name="last_name" id="last_name" placeholder="Last Name"
                                                        value="" />
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
                                                        name="email" id="email" placeholder="Email"
                                                        value="" />
                                                    <!--end::Input-->
                                                    <div class="text-danger" id="error_email"></div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-md-6">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">
                                                <!--begin::Label-->
                                                <label class="form-label mb-3">Phone Number</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="tel"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="phone_number" id="phone_number" placeholder="Phone Number"
                                                    value="" />
                                                <!--end::Input-->
                                                <div class="text-danger" id="error_phone_number"></div>
                                            </div>
                                        </div> --}}

                                            <div class="col-md-6">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="form-label mb-3">Company Name</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-solid"
                                                        name="company_name" id="company_name" placeholder="Company Name"
                                                        value="" />
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
                                                        name="gst" id="gst" placeholder="GST"
                                                        value="" />
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
                                                    <textarea type="tel" class="form-control form-control-lg form-control-solid" name="address" id="address"
                                                        placeholder="Address"></textarea>
                                                    <!--end::Input-->
                                                    <div class="text-danger" id="error_address"></div>
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>


                                </div>
                                <!--end::Wrapper-->
                            </div>

                            <div class="tab_content " data-kt-stepper-element="content" data-tab="payment_information">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-10 pb-lg-15">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold text-gray-900">Update Payment Info</h2>
                                        <!--end::Title-->
                                        <!--begin::Notice-->
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <div class="row">









                                        <!--end::Input group-->
                                        <div class="col-md-12">
                                            <div class="col d-flex flex-stack flex-grow-1">
                                                <div class="fw-semibold">
                                                    <div class="fs-6 text-gray-700">Total Amount
                                                    </div>
                                                    <h4 class="text-gray-900 fw-bold" id="label_final_amount_2"></h4>

                                                </div>
                                            </div>
                                            <!--begin::Input group-->
                                            <div class="mb-0 fv-row">

                                                <div class="row mb-2">
                                                    <div class="col-6">
                                                        <!--begin::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="form-label mb-3">Amount Paid</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="number"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="amount_paid" id="amount_paid"
                                                                placeholder="Amount Paid" value="" />
                                                            <!--end::Input-->
                                                            <div class="text-danger" id="error_amount_paid"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <!--begin::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="form-label mb-3">Transaction Reference</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text"
                                                                class="form-control form-control-lg form-control-solid"
                                                                name="transaction_reference " id="transaction_reference"
                                                                placeholder="Transaction Reference" value="" />
                                                            <!--end::Input-->
                                                            <div class="text-danger" id="error_transaction_reference">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--begin::Options-->
                                                <div class="row mb-2">
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
                                                                        class="fw-bold text-gray-800 text-hover-primary fs-5">Bank
                                                                        Transfer</span>

                                                                </span>
                                                                <!--end:Description-->
                                                            </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_method" value="bank_transfer"
                                                                    id="payment_method_bank_transfer" />
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
                                                                    <span
                                                                        class="fw-bold text-gray-800 text-hover-primary fs-5">Cash</span>

                                                                </span>
                                                                <!--end:Description-->
                                                            </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <span class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="radio"
                                                                    checked="checked" name="payment_method"
                                                                    id="payment_method_cash" value="cash" />
                                                            </span>
                                                            <!--end:Input-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                </div>
                                                <!--end::Options-->
                                                <!--begin::Options-->
                                                <div class="row mb-2">
                                                    <div class="col-md-12">
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
                                                                        class="fw-bold text-gray-800 text-hover-primary fs-5">Upload
                                                                        Screen Shot</span>

                                                                </span>
                                                                <!--end:Description-->
                                                            </span>
                                                            <!--end:Label-->
                                                            <!--begin:Input-->
                                                            <input type="file" name="ss" id="ss"
                                                                onchange="readURL(this,'blah_2');"
                                                                class="form-control form-control-lg form-control-solid" />
                                                            <!--end:Input-->
                                                        </label>
                                                    </div>

                                                </div>
                                                <!--end::Options-->

                                            </div>
                                            <!--end::Input group-->
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
                                        <h2 class="fw-bold text-gray-900">Please Confirm your Booking</h2>

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

                                            <hr />
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

                                            <hr />
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
                                                            <input type="hidden" name="price"
                                                                class="text-gray-900 fw-bold" id="price">
                                                            <input type="hidden" name="holiday_price"
                                                                class="text-gray-900 fw-bold" id="holiday_price">
                                                            <input type="hidden" name="promotional_price"
                                                                class="text-gray-900 fw-bold" id="promotional_price">
                                                            <input type="hidden" name="is_holiday_price"
                                                                class="text-gray-900 fw-bold" id="is_holiday_price">
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Total Room
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_total_room"></h4>
                                                        <input type="hidden" name="total_room"
                                                            class="text-gray-900 fw-bold" id="total_room">
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Total Nights
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_total_nights"></h4>
                                                        <input type="hidden" name="total_nights"
                                                            class="text-gray-900 fw-bold" id="total_nights">
                                                    </div>
                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Final Amount
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_final_amount"></h4>
                                                        <input type="hidden" name="final_amount"
                                                            class="text-gray-900 fw-bold" id="final_amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <h2 class="fw-bold text-gray-900 my-3">Payment Information</h2>
                                            <div class="row row-cols-md-2">
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Paid Amount
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold">
                                                            <span id="label_amount_paid"></span>

                                                        </h4>
                                                    </div>
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Transaction Reference
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold"
                                                            id="label_transaction_reference"></h4>

                                                    </div>
                                                    <div class="fw-semibold">
                                                        <div class="fs-6 text-gray-700">Payment Method
                                                        </div>
                                                        <h4 class="text-gray-900 fw-bold" id="label_payment_method"></h4>

                                                    </div>


                                                </div>
                                                <div class="col d-flex flex-stack flex-grow-1">
                                                    <img src="" width="200" id="blah_2" />

                                                </div>



                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab_content " data-kt-stepper-element="content" data-tab="confirmation">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-8 pb-lg-10">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold text-gray-900">Your Booking Confirm</h2>

                                        <!--end::Title-->
                                        <!--end::Notice-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Body-->
                                    <div class="mb-0" id="show1">
                                        
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab_content " data-kt-stepper-element="content" id="confirmation"
                                data-tab="confirmation">
                                <!--begin::Wrapper-->
                                <div class="w-100">
                                    <!--begin::Heading-->
                                    <div class="pb-8 pb-lg-10">
                                        <!--begin::Title-->
                                        <h2 class="fw-bold text-gray-900">Success</h2>
                                        There is
                                        <!--end::Title-->
                                        <!--end::Notice-->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--begin::Input group-->
                                            <div class="mb-10 fv-row">

                                                <div id="success_message_after_confirm"></div>
                                                <div id="success_message_after_confir"></div>

                                            </div>
                                            <!--end::Input group-->
                                        </div>





                                    </div> --}}

                                </div>
                            </div>

                            {{-- <div class="tab_content " data-kt-stepper-element="content" data-tab="select_payment_meth">
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
                                                                class="fw-bold text-gray-800 text-hover-primary fs-5">Bank
                                                                Transfer</span>
                                                            <span class="fs-6 fw-semibold text-muted">Use images to enhance
                                                                your post flow</span>
                                                        </span>
                                                        <!--end:Description-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio"
                                                            name="payment_method" value="bank_transfer" />
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
                                                            <span
                                                                class="fw-bold text-gray-800 text-hover-primary fs-5">Credit
                                                                Card</span>
                                                            <span class="fs-6 fw-semibold text-muted">Use images to your
                                                                post time</span>
                                                        </span>
                                                        <!--end:Description-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio" checked="checked"
                                                            name="payment_method" value="credit_card" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <div class="col-12 mt-5 text-end">
                                                <button type="button" class="btn btn-success">Update Payment Info

                                                </button>
                                            </div>
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div> --}}

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
                                        <span class="indicator-label">Confirm Booking
                                            <i class="ki-duotone ki-arrow-right fs-4 ms-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i></span>

                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
            $(document).ready(function() {
                $("button.btn_previous").off('click');
                $("button.btn_previous").on('click', function() {
                    showPreviousTab();
                });

                var checkInDatepicker = $("#check_in_date").flatpickr({
                    enableTime: false,
                    dateFormat: "Y-m-d",
                    minDate: "today",
                    onChange: function(selectedDates, dateStr, instance) {
                        // When the check-in date is selected, update the minDate of the check-out datepicker
                        if (selectedDates.length > 0) {
                            var minCheckOutDate = selectedDates[0];
                            checkOutDatepicker.set("minDate", minCheckOutDate);
                        }
                    }
                });

                var checkOutDatepicker = $("#check_out_date").flatpickr({
                    enableTime: false,
                    dateFormat: "Y-m-d",

                });

                // $(".room_list_all").on('click', function() {
                //     var room_id = $(this).data('id');
                //     alert(room_id);
                //     $('.room_list_all_class').hide();
                //     $('#room_list_all_div_' + room_id).show();
                // });

                $("select#no_of_guests").off("change");
                // $("select#no_of_guests").on("change", function() {
                //     let value = $(this).val();
                //     value = parseInt(value);
                //     var roomsNeeded = Math.ceil(value / 2);
                //     $('select#no_of_rooms').val(roomsNeeded);
                // });

                $("button.btn_continue").off('click');
                $("button.btn_continue").on('click', function() {
                    let current_tab_name = $("div.tab_content.current").data('tab');
                    let current_tab_index = $("div[data-tab-head=" + current_tab_name + "]").data('tab-index');
                    //alert(current_tab_index);
                    //alert(current_tab_name);
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
                                    success: function(response, status, xhr) {
                                        let availableDates = response.data.availableDates ||
                                            undefined;
                                        let room = response.data.room || undefined;
                                        if (availableDates !== undefined && availableDates.length >
                                            0) {
                                            var enabledDates = [];
                                            availableDates.forEach(function(availableDate) {
                                                let startDate = new Date(availableDate
                                                    .start_date);
                                                startDate.setDate(startDate
                                                    .getDate()
                                                ); // Adjusting start date to make it inclusive

                                                let endDate = new Date(availableDate
                                                    .end_date);

                                                // Push start date and end date to the array
                                                enabledDates.push({
                                                    from: startDate,
                                                    to: endDate
                                                });

                                                // Loop through each date range and push dates to the array
                                                let currentDate = new Date(startDate);
                                                while (currentDate < endDate) {
                                                    enabledDates.push(new Date(
                                                        currentDate));
                                                    currentDate.setDate(currentDate
                                                        .getDate() + 1);
                                                }
                                            });
                                            // checkInDatepicker.set('enable', enabledDates);
                                            //checkOutDatepicker.set('enable', enabledDates);
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
                                            let max_occu = parseInt(room.type.maximum_occupancy);
                                            let no_of_guests = no_of_rooms * max_occu;
                                            for (var i = 1; i <= no_of_guests; i++) {
                                                $('select#no_of_guests').append($('<option>', {
                                                    value: i,
                                                    text: i
                                                }));
                                            }
                                            //$("select#no_of_guests").off("change");
                                            $("select#no_of_guests").on("change", function() {
                                                let value = $(this).val();
                                                value = parseInt(value);
                                                var roomsNeeded = Math.ceil(value /
                                                    max_occu);
                                                $('select#no_of_rooms').val(roomsNeeded);
                                            });
                                        }
                                    },
                                    error: function(response) {
                                        toastr.error(
                                            "Please try it again later.",
                                            "Something went wrong!", {
                                                timeOut: 0,
                                                extendedTimeOut: 0,
                                                closeButton: true,
                                                closeDuration: 0
                                            }
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
                        //let

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


                            alert('availability');
                            // $.ajax({
                            //     type: "GET",
                            //     url: '/rooms/get-room-tariffs/' + room_id,
                            // success: function(response, status, xhr) {
                            //     let availableDates = response.data.availableDates ||
                            //         undefined;
                            //     let room = response.data.room || undefined;
                            //     if (availableDates !== undefined && availableDates.length >
                            //         0) {
                            //         var enabledDates = [];
                            //         availableDates.forEach(function(availableDate) {
                            //             let startDate = new Date(availableDate
                            //                 .start_date);
                            //             startDate.setDate(startDate
                            //                 .getDate()
                            //             ); // Adjusting start date to make it inclusive

                            //             let endDate = new Date(availableDate
                            //                 .end_date);

                            //             // Push start date and end date to the array
                            //             enabledDates.push({
                            //                 from: startDate,
                            //                 to: endDate
                            //             });

                            //             // Loop through each date range and push dates to the array
                            //             let currentDate = new Date(startDate);
                            //             while (currentDate < endDate) {
                            //                 enabledDates.push(new Date(
                            //                     currentDate));
                            //                 currentDate.setDate(currentDate
                            //                     .getDate() + 1);
                            //             }
                            //         });
                            //         //checkInDatepicker.set('enable', enabledDates);
                            //         //checkOutDatepicker.set('enable', enabledDates);
                            //     }


                            //     let no_of_rooms = room.no_of_rooms;
                            //     if (no_of_rooms != undefined) {
                            //         no_of_rooms = parseInt(no_of_rooms);
                            //         for (var i = 1; i <= no_of_rooms; i++) {
                            //             $('select#no_of_rooms').append($('<option>', {
                            //                 value: i,
                            //                 text: i
                            //             }));
                            //         }
                            //         let max_occu = parseInt(room.type.maximum_occupancy);
                            //         let no_of_guests = no_of_rooms * max_occu;
                            //         for (var i = 1; i <= no_of_guests; i++) {
                            //             $('select#no_of_guests').append($('<option>', {
                            //                 value: i,
                            //                 text: i
                            //             }));
                            //         }
                            //         $("select#no_of_guests").on("change", function() {
                            //             let value = $(this).val();
                            //             value = parseInt(value);
                            //             var roomsNeeded = Math.ceil(value / max_occu);
                            //             $('select#no_of_rooms').val(roomsNeeded);
                            //         });
                            //     }
                            // },
                            // error: function(response) {
                        } else {
                            toastr.error(
                                "Please try it again later.",
                                "Something went wrong!", {
                                    timeOut: 0,
                                    extendedTimeOut: 0,
                                    closeButton: true,
                                    closeDuration: 0
                                }
                            );
                        }
                        // },
                        // });

                        showNextTab(current_tab_name, current_tab_index);

                    } else if (current_tab_index == 2) {
                        let first_name = $("#first_name").val();
                        let last_name = $("#last_name").val();
                        let email = $("#email").val();
                        let phone_number = $("#phone_number").val();
                        let address = $("#address").val();

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
                            let final_amount = $("input[type=hidden]#final_amount").val();
                            // alert(final_amount);
                            showNextTab(current_tab_name, current_tab_index);
                        }
                    } else if (current_tab_index == 3) {
                        let amount_paid = $("#amount_paid").val();


                        let transaction_reference = $("#transaction_reference").val();
                        let payment_method = '';

                        if ($("#payment_method_bank_transfer").is(":checked")) {
                            payment_method = 'Bank Transfer'
                        }
                        if ($("#payment_method_cash").is(":checked")) {
                            payment_method = 'Cash'
                        }

                        // alert(payment_method);



                        let is_error = false;
                        if (amount_paid == undefined || amount_paid == null || amount_paid == "" ||
                            amount_paid == 0 || amount_paid < 0) {
                            is_error = true;
                            $("#error_amount_paid").text("This field is required and positive value")
                        }
                        if (!is_error) {
                            $("#label_amount_paid").text(amount_paid);
                            $("#label_transaction_reference").text(transaction_reference);
                            $("#label_payment_method").text(payment_method);

                            showNextTab(current_tab_name, current_tab_index);
                        }


                    } else if (current_tab_index == 4) {
                        showNextTab(current_tab_name, current_tab_index);
                    }
                });

                $("button.btn_submit").off('click');
                $("button.btn_submit").on('click', function() {
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
                    let payment_method = '';

                    if ($("#payment_method_bank_transfer").is(":checked")) {
                        payment_method = 'Bank Transfer'
                    }
                    if ($("#payment_method_cash").is(":checked")) {
                        payment_method = 'Cash'
                    }
                    let price = $("input[type=hidden]#price").val();
                    let holiday_price = $("input[type=hidden]#price").val();
                    let is_holiday_price = $("input[type=hidden]#is_holiday_price").val();
                    let total_nights = $("input[type=hidden]#total_nights").val();
                    let total_room = $("input[type=hidden]#total_room").val();
                    let final_amount = $("input[type=hidden]#final_amount").val();

                    let amount_paid = $("#amount_paid").val();
                    let transaction_reference = $("#transaction_reference").val();

                    var fd = new FormData();
                    var files = $('#ss')[0].files[0];
                    fd.append('ss', files);
                    fd.append('room_id', room_id);
                    fd.append('no_of_guests', no_of_guests);
                    fd.append('no_of_rooms', no_of_rooms);
                    fd.append('check_in_date', check_in_date);
                    fd.append('check_out_date', check_out_date);
                    fd.append('special_requests', special_requests);
                    fd.append('first_name', first_name);
                    fd.append('last_name', last_name);
                    fd.append('email', email);
                    fd.append('phone_number', phone_number);
                    fd.append('payment_method', payment_method);
                    fd.append('company_name', company_name);
                    fd.append('gst', gst);
                    fd.append('address', address);
                    fd.append('price', price);
                    fd.append('holiday_price', holiday_price);
                    fd.append('is_holiday_price', is_holiday_price);
                    fd.append('total_nights', total_nights);
                    fd.append('total_room', total_room);
                    fd.append('final_amount', final_amount);
                    fd.append('amount_paid', amount_paid);
                    fd.append('transaction_reference', transaction_reference);


                    //alert(fd);
                    //alert(JSON.stringify(fd));

                    $.ajax({
                        type: "POST",
                        url: "{{ route('bookings.store') }}",
                        contentType: false,
                        processData: false,
                        data: fd
                            /*{
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
                                                        'amount_paid': amount_paid,
                                                        'transaction_reference': transaction_reference
                                                    }*/
                            ,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content') // Include CSRF token in the headers
                        },
                        success: function(response) {
                            //alert('success');
                            // alert(JSON.stringify(response));
                            // if (response.status == 'success') {
                            //     toastr.success(
                            //         "Booking successfully register for customer", {
                            //             timeOut: 0,
                            //             extendedTimeOut: 0,
                            //             closeButton: true,
                            //             closeDuration: 0
                            //         }
                            //     );
                                /*
                                setTimeout(function() {
                                    window.location.href = "{{ route('bookings.index') }}"
                                }, 500);
                                */
                                // $("button.btn_submit").hide();
                                // $("button.btn_continue").hide();
                                // $("button.btn_previous").hide();

                                // showNextTab('confirmation', 5);

                                // $('#booking_confirmed').hide();
                                // $('#show').show();
                                    // $('#show').html(response);

                                //var mesg = `<h5>Your Booking ID is ${response.booking_id} </h5>`;
                                //$('#success_message_after_confirm').html(mesg);
                                //var mesg1 = `<h5>Your Payment is ${response.payment_method} </h5>`;
                                //$('#success_message_after_confir').html(mesg1);
                                //var mesg2 = `${response.no_of_guests}`;
                                // $('#bookedguest').val(response.data.no_of_guests);
                                // $('#booked_rooms').val(response.data.no_of_rooms);


                            // } else if (response.status == "bill_generate") {
                            //     console.log("bill")
                            // } else {
                            //     toastr.error(
                            //         response.msg, {
                            //             timeOut: 0,
                            //             extendedTimeOut: 0,
                            //             closeButton: true,
                            //             closeDuration: 0
                            //         }
                            //     );
                            // }
                            // if (response.status === 'success'){
                                
                                $("#show1").html(response);
                                showNextTab('booking_confirmed', 4);
                                $("button.btn_submit").hide();
                                $("button.btn_continue").hide();
                                $("button.btn_previous").hide();
                                
                            // }
                            
                        },
                        error: function(response) {
                            //alert('error');
                            //alert(JSON.stringify(response));
                            toastr.error(
                                "Please try it again later.",
                                "Something went wrong!", {
                                    timeOut: 0,
                                    extendedTimeOut: 0,
                                    closeButton: true,
                                    closeDuration: 0
                                }
                            );
                        },
                    });
                });

                // $("input.room_list").off('click');
                // $("input.room_list").on('click', function() {
                //     let value = $(this).val();
                //     alert (value);
                //     if (value != undefined) {
                //         $("input[type=hidden]#room_id").val(value);
                //     }
                // });
            });

            function checkcustomer() {
                var phone = document.getElementById('phone_number').value;
                $('#chk_btn').hide();
                //console.log(phone);
                $.ajax({
                    type: "GET",
                    url: "{{ route('customer.phone', ['phone' => ':phone']) }}".replace(':phone',
                        phone),
                    success: function(response) {
                        if (response == 'null') {
                            $("#cus_details").removeClass("d-none");
                        } else {
                            $("#cus_details").removeClass("d-none");
                            $('#first_name, #last_name, #email, #company_name, #gst, #dob, #address, #phone_number')
                                .prop('readonly', true);
                            $('#first_name').val(response.first_name);
                            $('#last_name').val(response.last_name);
                            $('#email').val(response.email);
                            $('#company_name').val(response.company_name);
                            $('#gst').val(response.gst);
                            $('#address').val(response.address);

                        }
                    }
                });

            }

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

                if (prev_tab_index < 5) {

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
                if (next_tab_index == 4) {
                    $("button.btn_continue").hide();
                    $("button.btn_submit").show();

                }
                if (next_tab_index == 3) {

                    showBookingConfirmed();
                }
            }

            function toggle_outer_div(id) {
                //$('#outer_div_' + id).toggle();
                //alert(id);
                let prop_id = id;
                let amenitiesSelect = document.getElementById('amenity_id');
                let selectedAmenities = Array.from(amenitiesSelect.selectedOptions).map(option => option.value);
                $.ajax({
                    type: "post",
                    url: "{{ route('room.type', ['prop_id' => ':prop_id']) }}".replace(':prop_id', prop_id),
                    data: {
                        amenities: selectedAmenities
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token in the headers
                    },
                    success: function(response) {
                        //console.log(response);
                        //$('#outer_div_property').toggle();
                        $('#outer_div_property').html(response);
                    }
                });
            }

            function readURL(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#' + id).attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function showBookingConfirmed() {
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
                    url: "{{ route('bookings.calculate_total_bill_amount') }}",
                    data: {
                        "room_id": $("#room_id").val(),
                        "check_in_date": $("#check_in_date").val(),
                        "check_out_date": $("#check_out_date").val(),
                        "no_of_guests": $("#no_of_guests").val(),
                        "no_of_rooms": $("#no_of_rooms").val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token in the headers
                    },
                    success: function(response, status, xhr) {
                        let data = response.data || undefined;
                        if (response.status == "success") {
                            if (data != undefined) {
                                if (data.is_holiday_price) {
                                    $("#label_strike_price").text(data.rate_per_night);
                                    $("#label_holiday_price").text(data.holiday_rate_per_night);
                                    $("input[type=hidden]#price").val(data.holiday_rate_per_night);
                                    $("input[type=hidden]#holiday_price").val(data.holiday_rate_per_night);
                                } else {
                                    $("#label_price").text(data.rate_per_night);
                                    $("input[type=hidden]#price").text(data.rate_per_night);
                                }
                                $("input[type=hidden]#is_holiday_price").val(data.is_holiday_price);

                                $("#label_total_nights").text(data.total_night);
                                $("input[type=hidden]#total_nights").val(data.total_night);


                                $("#label_total_room").text(data.total_rooms);
                                $("input[type=hidden]#total_room").val(data.total_rooms);


                                $("#label_final_amount").text(data.total_amount);
                                $("#label_final_amount_2").text(data.total_amount);
                                $("input[type=hidden]#final_amount").val(data.total_amount);
                            }
                        } else {
                            toastr.error(
                                response.msg, {
                                    timeOut: 0,
                                    extendedTimeOut: 0,
                                    closeButton: true,
                                    closeDuration: 0
                                }
                            );
                        }
                    },
                    error: function(response) {
                        toastr.error(
                            "Please try it again later.",
                            "Something went wrong!", {
                                timeOut: 0,
                                extendedTimeOut: 0,
                                closeButton: true,
                                closeDuration: 0
                            }
                        );
                    },
                });

            }

            function search() {
                let amenitiesSelect = document.getElementById('amenity_id');
                let selectedAmenities = Array.from(amenitiesSelect.selectedOptions).map(option => option.value);
                //console.log(selectedAmenities);

                if (selectedAmenities.length === 0) {
                    let errorDiv = document.querySelector('#search');
                    if (errorDiv) {
                        errorDiv.classList.remove('d-none');
                    }
                } else {

                    $.ajax({
                        type: "POST",
                        url: "{{ route('property.list') }}",
                        data: {
                            amenities: selectedAmenities
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content') // Include CSRF token in the headers
                        },
                        success: function(response) {
                            $('#property').html(response);
                        }
                    });
                }
            }
        </script>
    @endpush
@endsection
