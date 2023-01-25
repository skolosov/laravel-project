@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Место хранения</h1>
        <x-forms.form method="post" method-attribute="patch" action="{{route('storageLocation.update',['id'=>$storageLocation->id])}}">
            <x-forms.input input-type="text" name-input="name"
                           label-title="Наименование места хранения"
                           placeholder="Наименование места хранения"
                           value="{{$storageLocation->name ?? ''}}"/>
            <x-forms.select :options="$divisions" :selected="$storageLocation->division_id" :is-submit="false" name="division_id"/>
            <x-forms.button>Обновить</x-forms.button>
        </x-forms.form>
    </div>
@endsection
