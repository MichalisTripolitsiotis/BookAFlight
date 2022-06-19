@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-large text-sm text-white']) }}>
    {{ $value ?? $slot }}
</label>
