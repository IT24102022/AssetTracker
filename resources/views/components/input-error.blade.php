@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'space-y-1 font-mono text-xs font-bold uppercase tracking-wide text-signal']) }}>
        @foreach ((array) $messages as $message)
            <li>! {{ $message }}</li>
        @endforeach
    </ul>
@endif
