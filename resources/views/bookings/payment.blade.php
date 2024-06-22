<div class="notice bg-light-warning rounded border-warning border border-dashed p-6 tab_content "
    data-kt-stepper-element="content" data-tab="confirmation">
    <h2 class="fw-bold text-gray-900">Guest Details</h2>
    <div class="row row-cols-md-2">
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">No of Guests
                </div>
                <h4 class="text-gray-900 fw-bold" id="bookedguest">{{ $booking->no_of_guests }}</h4>
            </div>
        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">No of Rooms
                </div>
                <h4 class="text-gray-900 fw-bold" id="booked_rooms">{{ $booking->no_of_rooms }}</h4>
            </div>
        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Check In Date
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_check_in_date">{{ $booking->check_in_date }}</h4>
            </div>
        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Check Out Date
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_check_out_date">{{ $booking->check_out_date }}</h4>
            </div>
        </div>
    </div>

    <hr>
    <h2 class="fw-bold text-gray-900 my-3">Primary Customer Details</h2>
    <div class="row row-cols-md-2">
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Name
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_name">{{$customer->first_name}}</h4>
            </div>
        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Email
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_email">{{$customer->email}}</h4>
            </div>
        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Phone Number
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_phone">{{$customer->phone_number}}</h4>
            </div>
        </div>
    </div>

    <hr>
    <h2 class="fw-bold text-gray-900 my-3">Total Bill</h2>
    <div class="row row-cols-md-2">
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Room Price
                </div>
                <h4 class="text-gray-900 fw-bold">
                    <span id="label_price"></span>
                    <span id="label_strike_price">8000</span>
                    <span id="label_holiday_price">10000</span>
                    <span id="label_promotional_price"></span>
                    <input type="hidden" name="price" class="text-gray-900 fw-bold" id="price" value="10000">
                    <input type="hidden" name="holiday_price" class="text-gray-900 fw-bold" id="holiday_price"
                        value="10000">
                    <input type="hidden" name="promotional_price" class="text-gray-900 fw-bold" id="promotional_price">
                    <input type="hidden" name="is_holiday_price" class="text-gray-900 fw-bold" id="is_holiday_price"
                        value="2">
                </h4>
            </div>
        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Total Room
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_total_room">1</h4>
                <input type="hidden" name="total_room" class="text-gray-900 fw-bold" id="total_room" value="1">
            </div>
        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Total Nights
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_total_nights">6</h4>
                <input type="hidden" name="total_nights" class="text-gray-900 fw-bold" id="total_nights"
                    value="6">
            </div>
        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Final Amount
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_final_amount">44000</h4>
                <input type="hidden" name="final_amount" class="text-gray-900 fw-bold" id="final_amount"
                    value="44000">
            </div>
        </div>
    </div>
    <hr>
    <h2 class="fw-bold text-gray-900 my-3">Payment Information</h2>
    <div class="row row-cols-md-2">
        <div class="col d-flex flex-stack flex-grow-1">
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Paid Amount
                </div>
                <h4 class="text-gray-900 fw-bold">
                    <span id="label_amount_paid">{{$payment->amount_paid}}</span>
                </h4>
            </div>
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Transaction Reference
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_transaction_reference">{{$payment->transaction_reference}}</h4>

            </div>
            <div class="fw-semibold">
                <div class="fs-6 text-gray-700">Payment Method
                </div>
                <h4 class="text-gray-900 fw-bold" id="label_payment_method">{{$booking->payment_method}}</h4>
            </div>


        </div>
        <div class="col d-flex flex-stack flex-grow-1">
            <img src="" width="200" id="blah_2">
        </div>
    </div>
</div>
