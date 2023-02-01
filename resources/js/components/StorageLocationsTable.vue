<template>
    <div class="table-container" ref="tableContainer">
        <table-component
            :data="dataRows"
            :columns="columns"
            :on-dblclick-callback="selectRow"
        >
            <template v-slot:edit="props">
                <a-button type="primary" shape="circle">
                    <template #icon>
                        <edit-outlined/>
                    </template>
                </a-button>
            </template>
            <template v-slot:delete="props">
                <a-button type="danger" shape="circle">
                    <template #icon>
                        <delete-outlined/>
                    </template>
                </a-button>
            </template>
        </table-component>
    </div>
</template>

<script>
import TableComponent from './Basic/Table/TableComponent.vue';
import {DeleteOutlined, EditOutlined} from '@ant-design/icons-vue';

export default {
    name: "StorageLocationsTable",
    components: {
        TableComponent,
        DeleteOutlined,
        EditOutlined,
    },
    props: {
        dataRows: {
            type: Array,
            default: [],
        },
    },
    data: () => ({
        columns: [
            {
                title: '№ п\\п',
                dataIndex: 'id',
                key: 1,
                width: 50,
                fixed: 'left', // left, right закрепить столбцы
                // children // многоуровневая шапка,
            },
            {
                title: 'Наименование',
                dataIndex: 'name',
                width: 100,
                key: 2,
            },
            {
                title: 'Кол-во хранимых вещественных доказательств',
                dataIndex: 'evidences_count',
                width: 60,
                align: 'right',
                key: 3,
            },
            {
                title: '',
                dataIndex: 'edit',
                width: 30,
                key: 4,
                align: 'center',
                custom: true,
            },
            {
                title: '',
                dataIndex: 'delete',
                width: 30,
                key: 5,
                align: 'center',
                custom: true,
            },
        ],
    }),
    methods: {
        selectRow({record}) {
            window.location.href = ROUTES.route(ROUTES.evidences.index, record.id);
        }
    }
}
</script>

<style scoped>
.table-container {
    display: flex;
    box-sizing: border-box;
}
</style>
