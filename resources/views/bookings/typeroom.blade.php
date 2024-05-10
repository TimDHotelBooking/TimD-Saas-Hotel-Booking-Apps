@foreach ($type as $typ)
    <div class="col-lg-4">
        <?php
        // echo "<pre>";
        // print_r($room->availableDates());
        //  echo "</pre>";
        ?>

        <input type="radio" class="btn-check room_list " name="room_id" value="{{ $typ->type_id }}"
            id="room_{{ $typ->type_id }}" data-best_price="" />
        <label class="btn text-start btn-outline btn-outline-dashed btn-active-light-primary p-5 mb-10 room_list_all"
            for="room_{{ $typ->type_id }}" data-id="{{ $typ->type_id }}">
            <i class="fas fa-hotel fs-2x mb-4"></i>
            <span class="d-block fw-semibold text-start">
                <span class="text-gray-900 fw-bold d-block fs-4 mb-2">{{ $typ->property->property_name }}</span>
                <span class="text-gray-900 fw-bold d-block fs-6 mb-2">{{ $typ->type_name }}</span>
                {{-- @if (count($room->availableDates()) == 0 && count($room->bookings) > 0)
                    <span class="text-danger fw-bold d-block fs-6 mb-2">No
                        Dates Available</span>
                @endif --}}
            </span>
        </label>

    </div>
@endforeach

@foreach ($data as $room)
    <div class="room_list_all_class" id="room_list_all_div_{{ $room->room_type_id }}" style="display: none;">
        <h6>{{ $room->type->type_name }}</h6>
        {{-- <input type="hidden" value="" id="type_id"> --}}
        <table class="table">
            <tr>
                <th>Floor</th>
                <th>Room Number</th>
            </tr>

            @foreach ($data as $room2)
                @if ($room->type->type_id == $room2->room_type_id)
                    <tr>
                        <td>{{ $room2->floor }}</td>
                        <td>{{ $room2->room_number }}</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>
@endforeach

<script>
    $("input.room_list").off('click');
    $("input.room_list").on('click', function() {
        let value = $(this).val();
        if (value != undefined) {
            $("input[type=hidden]#room_id").val(value);
        }
    });

    $(".room_list_all").on('click', function() {
        var room_id = $(this).data('id');
        //alert(room_id);
        $('.room_list_all_class').hide();
        // $('#type_id').val(room_id);
        $('#room_list_all_div_' + room_id).show();
    });
</script>
