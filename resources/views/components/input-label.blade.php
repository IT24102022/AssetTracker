@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-mono text-xs font-bold uppercase tracking-widest text-ink mb-1.5']) }}>
    {{ $value ?? $slot }}
</label>
