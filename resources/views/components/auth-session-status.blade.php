@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'stamp stamp-go']) }}>
        {{ $status }}
    </div>
@endif
