<template>
    <a-button @click="showModal">Создать новое место хранения</a-button>
    <a-modal v-model:visible="visible" title="Создать новое место хранения" @ok="handleOk">
        <a-form
            layout="vertical"
            ref="form"
            :model="formState"
            name="basic"
            autocomplete="off"
            @finish="onFinish"
            @finishFailed="onFinishFailed"
        >
            <a-form-item
                label="Место хранения"
                name="name"
                :rules="[{ required: true, message: 'Please input your name division!' }]"
            >
                <a-input v-model:value="formState.name"/>
            </a-form-item>
            <a-form-item
                label="Division"
                name="divisionId"
                :rules="[{ required: true, message: 'Please select division!' }]"
            >
                <a-select
                    ref="select"
                    v-model:value="formState.divisionId"
                >
                    <template v-for="(item) in divisionsOptions" :key="item.id">
                        <a-select-option :value="item.id">{{ item.name }}</a-select-option>
                    </template>
                </a-select>
            </a-form-item>
        </a-form>
    </a-modal>
</template>

<script>
import FormComponent from "./Basic/Form/FormComponent.vue";

export default {
    name: "StorageLocationCreateForm",
    components: {FormComponent},
    props: {
        divisionsOptions: {
            type: Array,
            default: [],
        }
    },
    data: () => ({
        visible: false,
        formState: {
            name: '',
            divisionId: null,
        }

    }),
    methods: {
        showModal() {
            this.visible = !this.visible;
        },
        handleOk(e) {
            this.$refs.form.validateFields().then((data) => {
                this.onFinish(data);
                this.$refs.form.resetFields();
            }).catch((...props) => {
                console.log('HUI', props)
            })
            // this.visible = false;
        },
        onFinish(...props) {
            console.log('finish', props)
        },
        onFinishFailed(...props) {
            console.log('finishFailed', props)
        },
    }
}
</script>

<style scoped>

</style>
