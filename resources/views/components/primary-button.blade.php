<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-brutal-primary']) }}>
    {{ $slot }}
</button>
