<!--begin:: Avatar -->
<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
    <a href="{{ route('offers.show', $offer) }}">
        <div class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', $property->property_name) }}">
            {{-- {{ substr($property->property_name, 0, 1) }} --}}
        </div>
    </a>
</div>
<!--end::Avatar-->
<!--begin::Property details-->
<div class="d-flex flex-column">
    <a href="{{ route('offers.show', $property) }}" class="text-gray-800 text-hover-primary mb-1">
        {{ $property->property_name }}
    </a>
</div>
<!--begin::Property details-->