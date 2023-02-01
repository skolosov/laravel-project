@extends('layouts.app')

@section('content')
    <div class="container">
{{--        @dump($evidencesArray)--}}
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-secondary" href="{{route('evidences.create')}}">Создать новое вещественное доказательство</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">№ п\п</th>
                <th scope="col">Наименование</th>
                <th scope="col">Кол-во(Сумма, литры, граммы)</th>
                <th scope="col">Номер</th>
            </tr>
            </thead>
            <tbody>
            @foreach($evidencesArray as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->resource->name}}</td>
                    <td>{{
                        $item->resource->quantity
                        ?? $item->resource->amount
                        ?? $item->resource->weight
                        ?? $item->resource->liter
                        ?? null
                    }}
                    </td>
                    <td>{{
                        $item->resource->number
                        ?? $item->resource->registration_number
                        ?? null
                    }}
                    </td>
                    <td>
                        <x-forms.form method="get" action="{{route('evidences.edit',['id'=>$item->id])}}">
                            <x-forms.button>&#9998</x-forms.button>
                        </x-forms.form>
                    </td>
                    <td>
                        <x-forms.form method="post" method-attribute="delete" action="{{route('evidences.destroy',['id'=>$item->id])}}">
                            <x-forms.button>&#10006</x-forms.button>
                        </x-forms.form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
