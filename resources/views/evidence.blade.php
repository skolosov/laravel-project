@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
{{--            <a class="btn btn-secondary" href="{{route('evidences.create', ['storageLocation' => request()->route()->parameters['storageLocation']])}}">--}}
{{--                Создать новое вещественное доказательство--}}
{{--            </a>--}}
            <button class="btn btn-secondary"
                    data-bs-toggle="modal"
                    data-bs-target="#createEvidence"
            >
                Создать новое вещественное доказательство
            </button>
            <x-modal modalId="createEvidence"
                     title="Создать новое вещественное доказательство"
            >
                <x-forms.form method="get" action="{{route('evidences.create', ['storageLocation' => request()->route()->parameters['storageLocation']])}}">
                    <x-forms.select :options="$types" :selected="$type" />
                </x-forms.form>
                <x-forms.form method="post" action="{{route('evidences.store',['storageLocation' => request()->route()->parameters['storageLocation']])}}">
{{--                    <x-forms.select :options="{{request()->route()->parameters['storageLocation']}}" :is-submit="false" name="storage_location_id"--}}
{{--                                    label-title="Место хранения"/>--}}
                    <x-forms.input input-type="text" name-input="name"
                                   label-title="Наименование вещественного доказательства"
                                   placeholder="Наименование вещественного доказатльства"/>
                    <x-forms.input input-type="hidden" name-input="resource_type" label-title="resource_type"
                                   placeholder="resource_type" :value="$type"/>
                    @if($type == 1)
                        <x-forms.input input-type="number" name-input="liter" label-title="Объем в литрах"
                                       placeholder="Объем в литрах"/>
                    @elseif($type == 2)
                        <x-forms.input input-type="number" name-input="weight" label-title="Вес в граммах"
                                       placeholder="Вес в граммах"/>
                    @elseif($type == 3)
                        <x-forms.input input-type="number" name-input="amount" label-title="Сумма в рублях"
                                       placeholder="Сумма в рублях"/>
                    @elseif($type == 4)
                        <x-forms.input input-type="text" name-input="engine_number" label-title="Номер двигателя"
                                       placeholder="Номер двигателя"/>
                        <x-forms.input input-type="text" name-input="registration_number" label-title="Регистрационный номер"
                                       placeholder="Регистрационный номер"/>
                        <x-forms.input input-type="text" name-input="brand" label-title="Модель" placeholder="Модель"/>
                        <x-forms.input input-type="text" name-input="color" label-title="Цвет" placeholder="Цвет"/>
                        <x-forms.input input-type="text" name-input="release_date" label-title="Год выпуска"
                                       placeholder="Год выпуска"/>
                    @elseif($type == 5)
                        <x-forms.input input-type="text" name-input="brand" label-title="Модель" placeholder="Модель"/>
                        <x-forms.input input-type="text" name-input="series" label-title="Серия" placeholder="Серия"/>
                        <x-forms.input input-type="text" name-input="number" label-title="Номер" placeholder="Номер"/>
                        <x-forms.input input-type="text" name-input="detail" label-title="Наименование детали"
                                       placeholder="Наименование детали"/>
                        <x-forms.input input-type="text" name-input="release_date" label-title="Год выпуска"
                                       placeholder="Год выпуска"/>
                    @elseif($type == 6)
                        <x-forms.input input-type="text" name-input="unit_name" label-title="Единицы измерения"
                                       placeholder="Единицы измерения"></x-forms.input>
                        <x-forms.input input-type="text" name-input="designation" label-title="Наименование"
                                       placeholder="Наименование"/>
                        <x-forms.input input-type="text" name-input="quantity" label-title="Количество"
                                       placeholder="Количество"/>
                        <x-forms.input input-type="text" name-input="amount" label-title="Сумма" placeholder="Сумма"/>
                        <x-forms.input input-type="text" name-input="series" label-title="Серия" placeholder="Серия"/>
                        <x-forms.input input-type="text" name-input="number" label-title="Серийный номер"
                                       placeholder="Серийный номер"/>
                        <x-forms.input input-type="text" name-input="release_date" label-title="Год выпуска"
                                       placeholder="Год выпуска"/>
                    @endif
                    <x-forms.button>Сохранить</x-forms.button>
                </x-forms.form>
            </x-modal>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">№ п\п</th>
                <th scope="col">Наименование</th>
                <th scope="col">Кол-во(Сумма, литры, граммы)</th>
                <th scope="col">Номер</th>
                <th scope="col">Изменить</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evidencesArray as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->resource->name}}</td>
                    <td>{{
                        $item->resource->quantity
                        ?? $item->resource->amount
                        ?? $item->resource->weight
                        ?? $item->resource->liter
                        ?? null
                    }}
                    </td>
                    <td>{{
                        $item->resource->number
                        ?? $item->resource->registration_number
                        ?? null
                    }}
                    </td>
                    <td>
                        <x-forms.form method="get"
                                      action="{{route('evidences.edit',['storageLocation' => $storageLocation, 'id'=>$item->id])}}">
                            <x-forms.button>&#9998</x-forms.button>
                        </x-forms.form>
                    </td>
                    <td>
                        <x-forms.form method="post" method-attribute="delete"
                                      action="{{route('evidences.destroy',['storageLocation' => $storageLocation, 'id'=>$item->id])}}">
                            <x-forms.button>&#10006</x-forms.button>
                        </x-forms.form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
