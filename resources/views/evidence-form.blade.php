@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Evidence-Form</h1>
        <x-forms.form method="get" action="{{route('form')}}">
            <x-forms.select :options="$types" :selected="$type"/>
        </x-forms.form>
        @dump($type)
        <x-forms.form method="post" action="{{route('evidences.store')}}">
            <x-forms.input input-type="text" name-input="type_name" label-title="Наименование вещественного доказательства" placeholder="Наименование вещественного доказательства"/>
            <x-forms.input input-type="hidden" name-input="resource_type" label-title="resource_type" placeholder="resource_type" :value="$type"/>
            @if($type == 1)
                <x-forms.input input-type="number" name-input="liter" label-title="Объем в литрах" placeholder="Объем в литрах"/>
            @elseif($type == 2)
                <x-forms.input input-type="number" name-input="weight" label-title="Вес в граммах" placeholder="Вес в граммах"/>
            @elseif($type == 3)
                <x-forms.input input-type="number" name-input="amount" label-title="Сумма в рублях" placeholder="Сумма в рублях"/>
            @elseif($type == 4)
                <x-forms.input input-type="text" name-input="engine_number" label-title="engine_number" placeholder="engine_number"/>
                <x-forms.input input-type="text" name-input="registration_number" label-title="registration_number" placeholder="registration_number"/>
                <x-forms.input input-type="text" name-input="brand" label-title="brand" placeholder="brand"/>
                <x-forms.input input-type="text" name-input="color" label-title="color" placeholder="color"/>
                <x-forms.input input-type="text" name-input="release_date" label-title="release_date" placeholder="release_date"/>
            @elseif($type == 5)
                <x-forms.input input-type="text" name-input="brand" label-title="brand" placeholder="brand"/>
                <x-forms.input input-type="text" name-input="series" label-title="series" placeholder="series"/>
                <x-forms.input input-type="text" name-input="number" label-title="number" placeholder="number"/>
                <x-forms.input input-type="text" name-input="detail" label-title="detail" placeholder="detail"/>
                <x-forms.input input-type="text" name-input="release_date" label-title="release_date" placeholder="release_date"/>
            @elseif($type == 6)
                <x-forms.input input-type="text" name-input="quantity" label-title="quantity" placeholder="quantity"/>
                <x-forms.input input-type="text" name-input="series" label-title="series" placeholder="series"/>
                <x-forms.input input-type="text" name-input="unit_name" label-title="unit_name" placeholder="unit_name"/>
                <x-forms.input input-type="text" name-input="name" label-title="name" placeholder="name"/>
                <x-forms.input input-type="text" name-input="amount" label-title="amount" placeholder="amount"/>
                <x-forms.input input-type="text" name-input="release_date" label-title="release_date" placeholder="release_date"/>
                <x-forms.input input-type="text" name-input="number" label-title="number" placeholder="number"/>
            @endif
            <x-forms.button>Submit</x-forms.button>
        </x-forms.form>
    </div>
@endsection
