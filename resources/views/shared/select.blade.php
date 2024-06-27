@php
 $name ??= '';
 $value ??= '';
$label ??= ucfirst($name);
$class ??= '';
    @endphp

<div class="form-check form-switch">
    <label class="form-label" for="{{$name}}">{{$label}}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" class="form-select" multiple>
        @foreach($options as $k => $v)
            <option value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror

</div>
