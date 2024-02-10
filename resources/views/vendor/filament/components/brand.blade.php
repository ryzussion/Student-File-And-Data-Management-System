@php
    // Fetch your dynamic value from the database (e.g., using your model)
    $dynamicValue = App\Models\Setting::first()->app_name;
@endphp

<!-- <img src="{{ asset('/images/logo.svg') }}" alt="{{ config('app.name') }}" class="mr-2 h-8 w-8" /> -->
<span>{{ $dynamicValue ?? config('app.name') }}</span>