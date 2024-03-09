<!--begin::User details-->
@if(!empty($booking) && !empty($booking->room))
    <div class="d-flex flex-column">
        <span class="mb-1">
            {{ $booking->room->type->type_name ?? '-' }}
        </span>
        @if(!empty($booking->room->property))
            <span class="mb-1">
                {{ $booking->room->property->property_name ?? '-' }}
            </span>
        @endif
    </div>
@endif
<!--begin::User details-->
