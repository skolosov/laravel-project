@if($inputType !== 'hidden')
    <label for="exampleInputEmail1" class="form-label">{{ $labelTitle }}</label>
@endif
<input
    id="{{"{$nameInput}Input"}}"
    type="{{ $inputType }}"
    class="form-control"
    aria-describedby="emailHelp"
    name="{{$nameInput}}"
    value="{{$value}}"
>
@if($inputType !== 'hidden')
    <div id="emailHelp" class="form-text">{{ $placeholder }}</div>
@endif
