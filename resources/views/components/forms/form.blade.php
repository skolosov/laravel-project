<form method="{{$method}}" action="{{$action}}">
    @csrf
    @method($methodAttribute === '' ? $method : $methodAttribute)
    {{$slot}}
</form>
