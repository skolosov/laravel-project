@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Evidence-Form</h1>
        <x-forms.form method="get" action="{{route('form')}}">
            <x-forms.select :options="$types" :selected="$type"/>
        </x-forms.form>
        @dump($type)
        <x-forms.form method="post" action="{{route('evidences.store')}}">
            <x-forms.input input-type="text" name-input="type_name" label-title="type_name" placeholder="type_name"/>
            <x-forms.input input-type="hidden" name-input="resource_type" label-title="resource_type" placeholder="resource_type" :value="$type"/>
            @if($type == 1)
                <x-forms.input input-type="number" name-input="liter" label-title="Liter" placeholder="liter"/>
            @elseif($type == 2)
                <x-forms.input input-type="number" name-input="weight" label-title="weight" placeholder="weight"/>
            @elseif($type == 3)
                <x-forms.input input-type="number" name-input="amount" label-title="amount" placeholder="amount"/>
            @elseif($type == 4)
                <x-forms.input input-type="text" name-input="engine_number" label-title="engine_number" placeholder="engine_number"/>
                <x-forms.input input-type="text" name-input="registration_number" label-title="registration_number" placeholder="registration_number"/>
                <x-forms.input input-type="text" name-input="brand" label-title="brand" placeholder="brand"/>
                <x-forms.input input-type="text" name-input="color" label-title="color" placeholder="color"/>
                <x-forms.input input-type="text" name-input="release_date" label-title="release_date" placeholder="release_date"/>
            @endif
            <x-forms.button>Submit</x-forms.button>
        </x-forms.form>
    </div>
@endsection
