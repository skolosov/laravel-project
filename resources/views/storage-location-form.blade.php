@extends('layouts.app')
@section('content')
    <div class="container">
        <x-forms.button>Submit</x-forms.button>
        <h1>Места хранения</h1>
        @dump($storageLocation)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">№ п\п</th>
                <th scope="col">Наименование</th>
                <th scope="col">Кол-во хранимых вещественных доказательств</th>
            </tr>
            </thead>
            <tbody>
            @foreach($storageLocation as $key=>$item)
                <tr onclick="window.location.href='{{route('evidences')}}'; return false">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
{{--                    <td>{{$storageLocationEvidencesCount}}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
