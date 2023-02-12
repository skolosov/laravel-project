<x-forms.form method="{{$metod}}"
              method-attribute="{{$metodAttribute}}"
              action="{{route('storageLocation.update',['id'=>$storageLocation->id])}}">
    <x-forms.input input-type="text" name-input="name"
                   label-title="{{$name}}"
                   placeholder="{{$name}}"
                   value="{{$storageLocation->name ?? ''}}"/>
    <x-forms.select :options="{{$massiv}}"
                    :selected="$storageLocation->{{$massiv_name_id}}"
                    :is-submit="false"
                    name="{{$massiv_name_id}}"/>
    <x-forms.button>Обновить</x-forms.button>
</x-forms.form>
