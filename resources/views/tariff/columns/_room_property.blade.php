<!--begin::User details-->
@if(!empty($tariff) && !empty($tariff->room))
    <div class="d-flex flex-column">
        <a href="{{ route('rooms.index') }}" target="_blank" class="text-gray-800 text-hover-primary mb-1">
            {{ $tariff->room->room_type ?? '-' }}
        </a>
        @if(!empty($tariff->room->property))
            <a href="{{ route('property.index') }}" target="_blank" class="text-gray-800 text-hover-primary mb-1">
                {{ $tariff->room->property->property_name ?? '-' }}
            </a>
        @endif
    </div>
@endif
<!--begin::User details-->
