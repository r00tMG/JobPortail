@php
$class ??= '';
$name ??= '';
$type ??= 'text';
$value ??= '';
$label ??= ucfirst($name);
$var ??='';
@endphp
<div class='input-group input-group-static mb-3'>
    <label class=""  for="{{ $name }}">{{ $label }}</label>
    @if( $name === 'description' )
        <textarea class = "form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}">{{ old($name,$value) }}</textarea>
        @error($name)
        <div class="invalid-feedback">
        {{$message}}
        </div>
        @enderror
    @else
        {{-- <labe for="{{ $name }}">{{ $label }}</labe> --}}
        <input
            class = "form-control @error($name) is-invalid @enderror"
            id="{{ $name }}" type="{{ $type }}"
            name="{{ $name }}"
            value="{{ old($name,$value) }}"
            {{$var}}
             />
        @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    @endif
</div>

