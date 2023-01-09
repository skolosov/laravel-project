@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Вещественные доказательства</h1>
        @dump($evidence)
        <x-forms.form method="patch" action="{{route('evidences.update',['id'=>$evidence->id])}}">
            <x-forms.input input-type="text" name-input="name"
                           label-title="Наименование вещественного доказательства"
                           placeholder="Наименование вещественного доказательства"
                           value="{{$evidence->resource->name ?? ''}}"/>
            <x-forms.input input-type="hidden" name-input="resource_type" label-title="resource_type"
                           placeholder="resource_type" :value="$type"/>
            @if($type == 1)
                <x-forms.input input-type="number" name-input="liter" label-title="Объем в литрах"
                               placeholder="Объем в литрах" value="{{$evidence->resource->liter ?? ''}}"/>
            @elseif($type == 2)
                <x-forms.input input-type="number" name-input="weight" label-title="Вес в граммах"
                               placeholder="Вес в граммах" value="{{$evidence->resource->weight ?? ''}}"/>
            @elseif($type == 3)
                <x-forms.input input-type="number" name-input="amount" label-title="Сумма в рублях"
                               placeholder="Сумма в рублях" value="{{$evidence->resource->amount ?? ''}}"/>
            @elseif($type == 4)
                <x-forms.input input-type="text" name-input="engine_number" label-title="Номер двигателя"
                               placeholder="Номер двигателя" value="{{$evidence->resource->engine_number ?? ''}}"/>
                <x-forms.input input-type="text" name-input="registration_number" label-title="Регистрационный номер"
                               placeholder="Регистрационный номер" value="{{$evidence->resource->registration_number ?? ''}}"/>
                <x-forms.input input-type="text" name-input="brand" label-title="Модель" placeholder="Модель" value="{{$evidence->resource->brand ?? ''}}"/>
                <x-forms.input input-type="text" name-input="color" label-title="Цвет" placeholder="Цвет" value="{{$evidence->resource->color ?? ''}}"/>
                <x-forms.input input-type="text" name-input="release_date" label-title="Год выпуска"
                               placeholder="Год выпуска" value="{{$evidence->resource->release_date ?? ''}}"/>
            @elseif($type == 5)
                <x-forms.input input-type="text" name-input="brand" label-title="Модель" placeholder="Модель" value="{{$evidence->resource->brand ?? ''}}"/>
                <x-forms.input input-type="text" name-input="series" label-title="Серия" placeholder="Серия" value="{{$evidence->resource->series ?? ''}}"/>
                <x-forms.input input-type="text" name-input="number" label-title="Номер" placeholder="Номер" value="{{$evidence->resource->number ?? ''}}"/>
                <x-forms.input input-type="text" name-input="detail" label-title="Наименование детали"
                               placeholder="Наименование детали" value="{{$evidence->resource->detail ?? ''}}"/>
                <x-forms.input input-type="text" name-input="release_date" label-title="Год выпуска"
                               placeholder="Год выпуска" value="{{$evidence->resource->release_date ?? ''}}"/>
            @elseif($type == 6)
                <x-forms.input input-type="text" name-input="unit_name" label-title="Единицы измерения"
                               placeholder="Единицы измерения" value="{{$evidence->resource->unit_name ?? ''}}"></x-forms.input>
                <x-forms.input input-type="text" name-input="designation" label-title="Наименование"
                               placeholder="Наименование" value="{{$evidence->resource->designation ?? ''}}"/>
                <x-forms.input input-type="text" name-input="quantity" label-title="Количество"
                               placeholder="Количество" value="{{$evidence->resource->quantity ?? ''}}"/>
                <x-forms.input input-type="text" name-input="amount" label-title="Сумма" placeholder="Сумма" value="{{$evidence->resource->amount ?? ''}}"/>
                <x-forms.input input-type="text" name-input="series" label-title="Серия" placeholder="Серия" value="{{$evidence->resource->series ?? ''}}"/>
                <x-forms.input input-type="text" name-input="number" label-title="Серийный номер"
                               placeholder="Серийный номер" value="{{$evidence->resource->number ?? ''}}"/>
                <x-forms.input input-type="text" name-input="release_date" label-title="Год выпуска"
                               placeholder="Год выпуска" value="{{$evidence->resource->release_date ?? ''}}"/>
            @endif
            <x-forms.button>Submit</x-forms.button>
        </x-forms.form>
    </div>
@endsection
