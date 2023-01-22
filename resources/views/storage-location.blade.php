@extends('layouts.app')
@section('content')
    <div>
        <a href="{{route('storageLocation.store')}}">Создать новое место хранения</a>
    </div>
    <div class="container">
        <h1>Места хранения</h1>
        {{--        @dump($storageLocation)--}}
        <table class="table" id="table_storage_location">
            <thead>
            <tr>
                <th scope="col">№ п\п</th>
                <th scope="col">Наименование</th>
                <th scope="col">Кол-во хранимых вещественных доказательств</th>
            </tr>
            </thead>
            <tbody>
            @foreach($storageLocation as $key=>$item)
                <tr data-href="{{route('evidences',['storageId' => $item->id])}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->evidences_count}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        const table = document.querySelector('#table_storage_location');
        const rows = table.querySelectorAll('tr[data-href]');
        for (const row of rows) {
            row.addEventListener('click', () => {
                document.location = row.getAttribute("data-href")
            });
        }
    </script>
@endsection
