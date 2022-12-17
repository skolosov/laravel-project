@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Evidence-Form</h1>
        <x-forms.select />
        <x-forms.form method="get" action="{{route('evidence-form')}}">
            <x-forms.input input-type="text" name-input="name" label-title="name" placeholder="name" />
            <x-forms.input input-type="hidden" name-input="type" />
            <x-forms.button>Submit</x-forms.button>
        </x-forms.form>
    </div>
@endsection
