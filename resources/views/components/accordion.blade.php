<div class="accordion" id="accordionExample">
    @foreach($data as $key => $item)
    <div class="accordion-item">
        <h2 class="accordion-header" id="{{"heading$key"}}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="{{"#collapse$key"}}"
                    aria-expanded="true" aria-controls="collapseOne">
                {{$item['title']}}
            </button>
        </h2>
        <div id="{{"collapse$key"}}" class="accordion-collapse collapse" aria-labelledby="headingOne"
             data-bs-parent="#accordionExample">
            <div class="accordion-body">
                {{$item['text']}}
            </div>
        </div>
    </div>
    @endforeach
</div>
