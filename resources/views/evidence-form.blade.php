@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Вещественные доказательства</h1>
        <x-forms.form method="get" action="{{route('evidence.create')}}">
            {{-- get $types from EvidenceFormController and set $options=$types ($types it's a result of select * from evidence_type--}}
            <x-forms.select :options="$types" :selected="$type"/>
        </x-forms.form>
{{--        @dump($type)--}}
        <x-forms.form method="post" action="{{route('evidences.store')}}">
            <x-forms.input input-type="text" name-input="type_name"
                           label-title="Наименование вещественного доказательства"
                           placeholder="Наименование вещественного доказательства"/>
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
                <x-forms.input input-type="text" name-input="unit_name" label-title="Имя устройства"
                               placeholder="Имя устройства"></x-forms.input>
                <x-forms.input input-type="text" name-input="name" label-title="Наименование"
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
            <x-forms.button>Submit</x-forms.button>
        </x-forms.form>
    </div>
@endsection
