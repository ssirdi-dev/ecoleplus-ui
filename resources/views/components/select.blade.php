@props([
    'options' => [],
    'selected' => null,
    'label' => null,
    'error' => null,
    'help' => null,
    'prefix' => null,
    'suffix' => null,
])

<div>
    @if($label)
        <label class="{{ $labelClasses() }}">
            {{ $label }}
        </label>
    @endif

    <div class="{{ $wrapperClasses() }}">
        @if($prefix)
            <div class="{{ $prefixClasses() }}">
                {{ $prefix }}
            </div>
        @endif

        <select {{ $attributes->merge(['class' => $classes()]) }}>
            @foreach($options as $value => $label)
                <option
                    value="{{ $value }}"
                    {{ $selected == $value ? 'selected' : '' }}
                >
                    {{ $label }}
                </option>
            @endforeach
        </select>

        @if($suffix)
            <div class="{{ $suffixClasses() }}">
                {{ $suffix }}
            </div>
        @endif
    </div>

    @if($help && !$error)
        <p class="{{ $helpClasses() }}">{{ $help }}</p>
    @endif

    @if($error)
        <p class="{{ $errorClasses() }}">{{ $error }}</p>
    @endif
</div>
