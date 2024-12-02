@props([])

<div {{ $attributes->merge(['class' => $classes()]) }}>
    {{ $slot }}
</div>
