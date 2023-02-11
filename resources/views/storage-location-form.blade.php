@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Место хранения</h1>
        <x-forms.form method="post" action="{{route('storageLocation.store')}}">
            <x-forms.input input-type="text" name-input="name"
                           label-title="Наименование места хранения"
                           placeholder="Наименование места хранения"/>
            <x-forms.select :options="$divisions" :selected="$division" :is-submit="false"
                            name="division_id" label-title="Подразделение"/>
            <x-forms.button>Сохранить</x-forms.button>
        </x-forms.form>
    </div>
@endsection
