<!--begin::User details-->
@if(!empty($tariff) && !empty($tariff->room_type))
    <div class="d-flex flex-column">
        <a href="{{ route('type.index') }}" target="_blank" class="text-gray-800 text-hover-primary mb-1">
            {{ $tariff->room_type->type_name ?? '-' }}
        </a>
       
    </div>
@endif
<!--begin::User details-->
