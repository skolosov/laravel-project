<select class="form-select" id="actionSelect" name="type_evidence">
    @foreach($options as $option)
        @if($selected == $option['id'])
            <option value="{{$option['id']}}" selected>{{$option['name']}}</option>
        @else
            <option value="{{$option['id']}}">{{$option['name']}}</option>
        @endif
    @endforeach
</select>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const select = document.querySelector('#actionSelect');
        const onChange = (e) => {
            e.target.parentNode.submit();
        }
        select.addEventListener('change', onChange);
    });
</script>
