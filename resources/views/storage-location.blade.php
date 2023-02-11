@extends('layouts.app')
@section('content')
    <div class="container h-100 w-100">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-secondary"
                       href="#"
                       data-bs-toggle="modal"
                       data-bs-target="#createStorageLocation"
                    >
                       Создать новое место хранения
                    </button>
                    <x-modal modalId="createStorageLocation"
                             title="Создание места хранения"
                    >
                        аывпвыпывпывп
                    </x-modal>
        </div>

        <h1>Места хранения</h1>
        <table class="table table-hover table-striped table-md align-middle" id="table_storage_location">
            <thead class="table-dark">
            <tr>
                <th scope="col">№ п\п</th>
                <th scope="col">Наименование</th>
                <th scope="col">Кол-во хранимых вещественных доказательств</th>
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($storageLocation as $key=>$item)
                <tr data-href="{{route('evidences',$item->id)}}">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td class="text-end">{{$item->evidences_count}}</td>
                    <td class="text-center">
                        <x-forms.form method="get" action="{{route('storageLocation.edit',['id'=>$item->id])}}">
                            <x-forms.button>&#9998</x-forms.button>
                        </x-forms.form>
                    </td>
                    <td class="text-center">
                        <x-forms.form method="post" method-attribute="delete"
                                      action="{{route('storageLocation.destroy',['id'=>$item->id])}}">
                            <x-forms.button>&#10006</x-forms.button>
                        </x-forms.form>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-success" href="{{route('evidences', $item->id)}}">Открыть</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{--    <div class="container h-100 w-100">--}}
    {{--        <div class="card">--}}
    {{--            <div class="card-header">--}}
    {{--                <div class="row align-items-center align-content-between">--}}
    {{--                    <div class="col">--}}
    {{--                        <h3>Места хранения</h3>--}}
    {{--                    </div>--}}
    {{--                    <div class="col-3 d-flex justify-content-end">--}}
    {{--                        <storage-locations-create--}}
    {{--                            :divisions-options="{{$divisions}}"--}}
    {{--                        ></storage-locations-create>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="card-body p-2">--}}
    {{--                <storage-locations-table--}}
    {{--                    :data-rows="{{$storageLocation}}"--}}
    {{--                ></storage-locations-table>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
