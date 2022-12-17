<label for="exampleInputEmail1" class="form-label">{{ $labelTitle ?? '' }}</label>
<input id="{{"{$nameInput}Input"}}" type="{{ $inputType }}" class="form-control" aria-describedby="emailHelp" name="{{$nameInput}}">
<div id="emailHelp" class="form-text">{{ $placeholder ?? '' }}</div>
