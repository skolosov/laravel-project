@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-secondary" href="{{route('employee.create')}}">Создать новое должностное лицо</a>
            <x-forms.form method="post" action="{{route('storageLocation.store')}}">
                <x-forms.input input-type="text" name-input="name"
                               label-title="Наименование места хранения"
                               placeholder="Наименование места хранения"/>
                <x-forms.select :options="$divisions"
                                :selected="$division"
                                :is-submit="false"
                                name="division_id" label-title="Подразделение"/>
                <x-forms.button>Сохранить</x-forms.button>
            </x-forms.form>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">№ п\п</th>
                <th scope="col">ФИО</th>
                <th scope="col">Должность</th>
                <th scope="col">Подразделение</th>
                <th scope="col">Телефон</th>
            </tr>
            </thead>
            <tbody>
{{--            @dd($staffs)--}}
            @foreach($employees as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->fio}}</td>
                    <td>{{$item->post->name}}</td>
                    <td>{{$item->department->name}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        <x-forms.form method="get" action="{{route('employee.edit',['id'=>$item->id])}}">
                            <x-forms.button>&#9998</x-forms.button>
                        </x-forms.form>
                    </td>
                    <td>
                        <x-forms.form method="post" method-attribute="delete" action="{{route('employee.destroy',['id'=>$item->id])}}">
                            <x-forms.button>&#10006</x-forms.button>
                        </x-forms.form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
