<input type="hidden" class="btn-check" name="room_id" value="" id="room_id" />
@if (!empty($properties) && count($properties) > 0)
    @foreach ($properties as $property)
        @if (!empty($property->rooms_list) && count($property->rooms_list) > 0)
            <div class="mb-5" onclick="toggle_outer_div({{ $property->property_id }})">
                <span class="text-gray-900 fw-bold d-block fs-4 mb-2">{{ $property->property_name }}</span>
                <span class="text-muted fw-semibold fs-6 d-flex align-items-start">
                    <i class="fas fa-map-marker-alt text-muted me-2 mt-1"></i>
                    {{ $property->location }}
                </span>
                <span class="text-muted fw-semibold fs-6 d-flex align-items-start">
                    <i class="fas fa-phone text-muted me-2 mt-1"></i>
                    {{ $property->contact_information }}
                </span>
            </div>
        @endif
    @endforeach
    <div class="row" style="" id="outer_div_property">
        {{-- @foreach ($property->rooms as $room)
                                                    <div class="col-lg-4">
                                                        <?php
                                                        // echo "<pre>";
                                                        // print_r($room->availableDates());
                                                        //  echo "</pre>";
                                                        ?>

                                                        <input type="radio" class="btn-check room_list " name="room_id"
                                                            value="{{ $room->room_id }}" id="room_{{ $room->room_id }}"
                                                            data-best_price="{{ $room->price }}" />
                                                        <label
                                                            class="btn text-start btn-outline btn-outline-dashed btn-active-light-primary p-5 mb-10 room_list_all"
                                                            for="room_{{ $room->room_id }}"
                                                            data-id="{{ $room->room_id }}">
                                                            <i class="fas fa-hotel fs-2x mb-4"></i>
                                                            <span class="d-block fw-semibold text-start">
                                                                <span
                                                                    class="text-gray-900 fw-bold d-block fs-4 mb-2">{{ $property->property_name }}</span>
                                                                <span
                                                                    class="text-gray-900 fw-bold d-block fs-6 mb-2">{{ $room->type->type_name }}</span>
                                                                @if (count($room->availableDates()) == 0 && count($room->bookings) > 0)
                                                                    <span class="text-danger fw-bold d-block fs-6 mb-2">No
                                                                        Dates Available</span>
                                                                @endif
                                                            </span>
                                                        </label>

                                                    </div>
                                                @endforeach

                                                @foreach ($property->rooms as $room2)
                                                    <div class="room_list_all_class"
                                                        id="room_list_all_div_{{ $room2->room_id }}"
                                                        style="display: none;">
                                                        <h6>{{ $room2->type->type_name }}</h6>
                                                        <table class="table">
                                                            <tr>
                                                                <th>Floor</th>
                                                                <th>Room Number</th>
                                                            </tr>
                                                            @foreach ($room2->roomlist as $r_list)
                                                                <tr>
                                                                    <td>{{ $r_list->floor }}</td>
                                                                    <td>{{ $r_list->room_number }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>

                                                    </div>
                                                @endforeach --}}
    </div>
@else
    <div class="mb-5">
        <span class="text-danger error">No Properties Available</span>
    </div>
@endif
