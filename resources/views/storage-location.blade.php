@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-secondary" href="{{route('storageLocation.create')}}">Создать новое место хранения</a>
        </div>
        <h1>Места хранения</h1>
        {{--        @dump($storageLocation)--}}
        <table class="table table-hover" id="table_storage_location">
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
                    <td>
                        <x-forms.form method="get" action="{{route('storageLocation.edit',['id'=>$item->id])}}">
                            <x-forms.button>&#9998</x-forms.button>
                        </x-forms.form>
                    </td>
                    <td>
                        <x-forms.form method="post" method-attribute="delete" action="{{route('storageLocation.destroy',['id'=>$item->id])}}">
                            <x-forms.button>&#10006</x-forms.button>
                        </x-forms.form>
                    </td>
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
