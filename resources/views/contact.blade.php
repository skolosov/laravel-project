@extends('layouts.app')

@section('ttitle_doc')<h1>Контакты</h1>@endsection

@section('content')
    <h1>Контакты</h1>
    <form action="/contact/submit" metod="post">
        <div class="form-group">
            <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">
            <input type="text" name="status_id" placeholder="Введите статус" id="status_id" class="form-control">
        </div>
    </form>

    <button type="button" class="w-100 btn btn-lg btn-outline-primary">
        Загрузить
    </button>
@endsection
