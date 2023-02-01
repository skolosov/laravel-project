<template>
    <div class="form-container">
        <template v-if="formConfig.title">
            <h2>{{ formConfig.title }}</h2>
            <hr/>
        </template>
        <a-form
            ref="formRef"
            has-feedback
            :layout="formConfig.direction || 'vertical'"
            :model="formData"
            name="form"
            @finish="finish"
        >
            <template v-for="(inputData, idx) in formConfig.fieldsMap" :key="idx">
                <a-row :gutter="[16, 16]">
                    <template v-if="Array.isArray(inputData)">
                        <template v-for="inputDataCol in inputData" :key="inputDataCol.key">
                            <a-col
                                :span="inputDataCol.span || 12"
                            >
                                <a-form-item
                                    :name="inputDataCol.name"
                                    :label="inputDataCol.label"
                                    :rules="getValidator(inputDataCol?.rules)"
                                    :label-col="labelCol"
                                >
                                    <input-component
                                        :type="inputDataCol.type"
                                        :placeholder="inputDataCol.placeholder"
                                        :value="formData[inputDataCol.name]"
                                        :field="inputDataCol.name"
                                        :after-dot-numbers="inputDataCol.decimal"
                                        :options="inputDataCol.options"
                                        @input="inputChange"
                                    />
                                </a-form-item>
                            </a-col>
                        </template>
                    </template>
                    <template v-else>
                        <a-col
                            :span="inputData.span || 12"
                        >
                            <a-form-item
                                :name="inputData.name"
                                :label="inputData.label"
                                :rules="getValidator(inputData.rules)"
                                :label-col="labelCol"
                            >
                                <input-component
                                    :type="inputData.type"
                                    :placeholder="inputData.placeholder"
                                    :value="formData[inputData.name]"
                                    :field="inputData.name"
                                    :after-dot-numbers="inputData.decimal"
                                    :options="inputData.options"
                                    @input="inputChange"
                                />
                            </a-form-item>
                        </a-col>
                    </template>
                </a-row>
            </template>
            <template v-if="!!formConfig.buttons">
                <a-row :gutter="[16,16]">
                    <template v-for="button in formConfig.buttons" :key="button.key">
                        <a-col>
                            <a-form-item>
                                <a-button
                                    :name="button.name"
                                    :type="button.color || 'primary'"
                                    :html-type="button.type"
                                >
                                    {{ button.title }}
                                </a-button>
                            </a-form-item>
                        </a-col>
                    </template>
                </a-row>
            </template>
        </a-form>
    </div>
</template>

<script>
import InputComponent from "./InputComponent.vue";

export default {
    name: "FormComponent",
    emits: ['finish'],
    props: {
        formConfig: {
            type: Object,
            required: true,
        },
    },
    components: {
        InputComponent,
    },
    data: () => {
        return {
            formData: {}
        }
    },
    beforeMount() {
        console.log(this.formData);
        this.formData = {...this.formConfig.dataMap};
    },
    computed: {
        labelCol() {
            return this.formConfig.direction === 'horizontal'
                ? {span: 8}
                : {};
        }
    },
    methods: {
        finish(props) {
            console.log('finish', props)
            this.$emit('finish', props)
            this.formConfig.resetAfterSubmit && this.$refs.formRef.resetFields();
        },
        inputChange({value, field}) {
            this.formData[field] = value;
        },
        getValidator(rules)
        {
            if (!rules) {
                return [];
            }
            if (rules.some((item) => "validator" in item)) {
                return rules.map((item) => {
                    if (!!item.validator) {
                        return {
                            ...item,
                            validator: async (...props) => {
                                return await item.validator(this.formData, ...props);
                            },
                        };
                    }
                    return item;
                })
            }
            return rules;
        },
    },
}
</script>

<style scoped>
.form-container {
    padding: 16px;
}
</style>
