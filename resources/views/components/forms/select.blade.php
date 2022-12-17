<select class="form-select" id="actionSelect" name="type">
    <option value="alcohols" selected>Алкоголь</option>
    <option value="drugs">Наркотики</option>
    <option value="moneys">Деньги</option>
    <option value="transports">Транспорт</option>
</select>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const select = document.querySelector('#actionSelect');
        const inputType = document.querySelector('#typeInput');
        const bindValue = (value) =>
            inputType.value = value;
        const onChange = (e) => {
            bindValue(e.target.value)
        }
        select.addEventListener('change', onChange);
        bindValue(select.value);
    });
</script>
