<form method="{{$method}}" action="{{$action}}">
    @csrf
    @method($method)
    {{$slot}}
</form>
