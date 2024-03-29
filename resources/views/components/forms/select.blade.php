<label class="form-label">{{$labelTitle}}</label>
<select class="form-select" id="actionSelect" name="{{$name}}" >
    @foreach($options as $option)
        @if(!is_null($selected) && $selected == $option['id'])
            <option value="{{$option['id']}}" selected>{{$option['name']}}</option>
        @else
            <option value="{{$option['id']}}">{{$option['name']}}</option>
        @endif
    @endforeach

</select>
@if($isSubmit)
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const select = document.querySelector('#actionSelect');
            const onChange = (e) => {
                e.target.parentNode.submit();
            }
            select.addEventListener('change', onChange);
        });
    </script>
@endif
