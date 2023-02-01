@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Должностное лицо</h1>
        <x-forms.form method="post" action="{{route('staff.store')}}">
            <x-forms.input input-type="text" name-input="name"
                           label-title="ФИО"
                           placeholder="Фамилия Имя Отчество"/>
            <x-forms.select :options="$posts" :selected="$post" :is-submit="false"
                            name="post_id" label-title="Должность" placeholder="Должность"/>
            <x-forms.select :options="$departments" :selected="$department" :is-submit="false" name="department_id"/>
            <x-forms.input input-type="text" name-input="phone"
                           label-title="Телефон"
                           placeholder="Телефон"/>
            <x-forms.button>Сохранить</x-forms.button>
        </x-forms.form>
    </div>
@endsection
