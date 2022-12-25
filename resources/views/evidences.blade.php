@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Вещественные доказательства</h1>
        <x-forms.form method="get" action="{{route('evidences')}}">
            @dd($evidances);
        </x-forms.form>
    </div>
@endsection
