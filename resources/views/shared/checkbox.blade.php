@php

    $class ??=null;

@endphp
<div @class(["form-check form-switch"],$class)>
    <input type="hidden" value="0" name="{{$name}}">
    <input @chekbox( old($name,$value ?? false)) type="checkbox" value="1" name="{{$name}}" role="switch" id="{{$name}}" class="form-check-input" @error($name) is-invalid @enderror">
    <lable class="form-check-label" for="{{$name}}" >{{$label}}</lable>

</div>
@error($name)
<div class="invalid-feedback">
    {{$message}}
</div>
@enderror
