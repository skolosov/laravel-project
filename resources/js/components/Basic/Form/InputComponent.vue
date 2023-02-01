<template>
    <a-input-password
        v-if="type === 'password'"
        v-model:value="valueModel"
        @input="onInput"
        :placeholder="placeholder"
    />
    <a-input-number
        v-if="type === 'number'"
        style="width: 100%"
        :precision="afterDotNumbers"
        v-model:value="valueModel"
        @change="onNumberInput"
        :placeholder="placeholder"
    />
    <a-radio-group
        v-if="type === 'radio'"
        v-model:value="valueModel"
        @change="onInput"
        :options="options"
    />
    <a-date-picker
        v-if="type === 'date'"
        style="width: 100%"
        v-model:value="valueModel"
        @change="onInputDate"
    />
    <a-textarea
        v-if="type === 'textarea'"
        v-model:value="valueModel"
        @input="onInput"
        :placeholder="placeholder"
    />
    <a-input
        v-if="type === 'text'"
        v-model:value="valueModel"
        @input="onInput"
        :placeholder="placeholder"
    />
    <a-switch
        v-if="type === 'switch'"
        v-model:checked="valueModel"
        @change="onNumberInput"
    />
    <a-select
        v-if="type === 'select'"
        style="width: 100%"
        v-model:value="valueModel"
        @change="onNumberInput"
        :options="options"
        :placeholder="placeholder"
    />
    <a-checkbox
        v-if="type === 'checkbox'"
        v-model:value="valueModel"
        style="line-height: 32px"
        @change="onNumberInput"
    >
        {{ placeholder }}
    </a-checkbox>
    <a-checkbox-group
        v-if="type === 'checkboxGroup'"
        v-model:value="valueModel"
        @change="onChangeCheckboxGroup"
    >
        <a-row>
            <template v-for="(option, i) in options" :key="i">
                <a-col :span="option.span">
                    <a-checkbox
                        :value="option.id"
                        style="line-height: 32px">
                        {{ option.name }}
                    </a-checkbox>
                </a-col>
            </template>
        </a-row>
    </a-checkbox-group>
</template>

<script>

export default {
    name: "InputComponent",
    emits: ['input'],
    props: {
        type: {
            type: String,
            default: 'text'
        },
        value: {
            required: false,
            type: [String, Number, Object, Boolean],
        },
        placeholder: {
            type: String,
            default: '',
        },
        field: {
            required: true,
            type: String,
        },
        afterDotNumbers: {
            type: Number,
            default: 0,
        },
        options: {
            type: Array,
            default: [],
        },
    },
    data: () => ({
        valueModel: null,
    }),
    beforeMount() {
        this.valueModel = this.value;
    },
    mounted() {
        console.log('inputFieldMount',
            {
                field: this.field,
                value: this.value,
            })
    },
    methods: {
        onInput(e) {
            this.$emit('input', {value: e.target.value, field: this.field});
        },
        onNumberInput(val) {
            this.$emit('input', {value: val, field: this.field});
        },
        onInputDate(e, dateString) {
            this.$emit('input', {value: e, field: this.field});
        },
        onChangeCheckboxGroup(val) {
            this.$emit('input', {value: val, field: this.field});
        }
    }
}
</script>

<style scoped>

</style>
