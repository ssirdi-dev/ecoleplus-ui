@props([
    'label' => null,
    'help' => null,
    'error' => null,
])

<div {{ $attributes->merge(['class' => $classes()]) }}>
    @if($label)
        <label class="{{ $labelClasses() }}">
            {{ $label }}
        </label>
    @endif

    {{ $slot }}

    @if($help && !$error)
        <p class="{{ $helpClasses() }}">{{ $help }}</p>
    @endif

    @if($error)
        <p class="{{ $errorClasses() }}">{{ $error }}</p>
    @endif
</div>
