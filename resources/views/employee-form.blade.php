@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Должностное лицо</h1>
        <x-forms.form method="post" action="{{route('employee.store')}}">
            <x-forms.input input-type="text" name-input="fio"
                           label-title="ФИО"
                           placeholder="Фамилия Имя Отчество"/>
            <x-forms.input input-type="text" name-input="post"
                           label-title="Должность"
                           placeholder="Должность"/>
            <x-forms.input input-type="text" name-input="department"
                           label-title="Подразделение"
                           placeholder="Служба/Подразделение/Организация"/>
            <x-forms.input input-type="text" name-input="phone"
                           label-title="Телефон"
                           placeholder="Телефон"/>
            <x-forms.button>Сохранить</x-forms.button>
        </x-forms.form>
    </div>
@endsection
