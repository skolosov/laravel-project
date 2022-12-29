@extends('layouts.app')

@section('content')
    <div class="container">
{{--        @dump($evidencesArray)--}}
        <table class="table">
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
