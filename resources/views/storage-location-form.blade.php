@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Место хранения</h1>
        <x-forms.form method="post" action="{{route('storageLocation.store')}}">
            <x-forms.input input-type="text" name-input="name"
                           label-title="Наименование места хранения"
                           placeholder="Наименование места хранения"/>
            <x-forms.form method="get" action="{{route('divisions.index')}}">
                <x-forms.select :options="$types" :selected="$type"/>
            </x-forms.form>
            <x-forms.button>Submit</x-forms.button>
        </x-forms.form>
    </div>
@endsection
