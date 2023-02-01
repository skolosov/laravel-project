// export default {
//     formConfig: {
//         name: 'StorageLocation',
//             title: 'Форма',
//             resetAfterSubmit: true,
//             direction: 'vertical',
//             dataMap: {
//             textField: '',
//                 numberField: 0,
//                 numberField2: 0,
//                 numberField3: 0,
//                 textareaField: '',
//                 radioField: null,
//                 dateField: null,
//                 switchField: true,
//                 selectField: null,
//                 checkboxField: false,
//                 checkboxGroupField: [],
//         },
//         buttons: [
//             {
//                 key: 'btn_1',
//                 name: 'enter',
//                 title: 'Отправить',
//                 type: 'submit',
//             }
//         ],
//             fieldsMap: [
//             [
//                 {
//                     key: 1,
//                     type: 'text',
//                     name: 'textField',
//                     label: 'Тестовое поле',
//                     model: 'textField',
//                     span: 12,
//                     placeholder: 'Введите текст',
//                     rules: [
//                         {
//                             required: true,
//                             message: `Поле должно быть заполнено`
//                         },
//                     ]
//                 },
//                 {
//                     key: 2,
//                     type: 'number',
//                     name: 'numberField',
//                     label: 'Числовое поле',
//                     model: 'numberField',
//                     span: 4,
//                     rules: [
//                         {
//                             type: 'number',
//                             trigger: 'change',
//                             message: `числовое поле`
//                         },
//                     ]
//                 },
//                 {
//                     key: 4,
//                     type: 'number',
//                     name: 'numberField2',
//                     label: 'Числовое поле',
//                     model: 'numberField2',
//                     decimal: 4,
//                     span: 4,
//                     rules: [
//                         {
//                             type: 'number',
//                             trigger: 'change',
//                             message: `числовое поле`
//                         },
//                     ]
//                 },
//                 {
//                     key: 5,
//                     type: 'number',
//                     name: 'numberField3',
//                     label: 'Числовое поле',
//                     model: 'numberField3',
//                     decimal: 2,
//                     span: 4,
//                     rules: [
//                         {
//                             type: 'number',
//                             trigger: 'change',
//                             message: `числовое поле`
//                         },
//                     ]
//                 },
//             ],
//             {
//                 key: 3,
//                 type: 'textarea',
//                 name: 'textareaField',
//                 label: 'TextField поле',
//                 model: 'textareaField',
//                 // span: 12,
//                 // rules: [
//                 //     {
//                 //         required: true,
//                 //         message: `Поле должно быть заполнено`
//                 //     },
//                 // ]
//             },
//             [
//                 {
//                     key: 4,
//                     type: 'radio',
//                     name: 'radioField',
//                     label: 'radioField поле',
//                     model: 'radioField',
//                     options: [
//                         {label: 'one', value: 1},
//                         {label: 'two', value: 2},
//                         {label: 'three', value: 3},
//                     ],
//                     span: 4,
//                     rules: [
//                         {
//                             required: true,
//                             message: `Поле должно быть заполнено`
//                         },
//                     ]
//                 },
//                 {
//                     key: 8,
//                     type: 'switch',
//                     name: 'switchField',
//                     label: 'switchField поле',
//                     model: 'switchField',
//                     span: 4,
//                 },
//                 {
//                     key: 9,
//                     type: 'select',
//                     name: 'selectField',
//                     label: 'selectField поле',
//                     model: 'selectField',
//                     placeholder: 'Выберете какую то хрень',
//                     span: 8,
//                     options: [
//                         {label: 'one', value: 1},
//                         {label: 'two', value: 2},
//                         {label: 'three', value: 3},
//                     ],
//                 },
//                 // {
//                 //     key: 10,
//                 //     type: 'checkbox',
//                 //     name: 'checkboxField',
//                 //     // label: 'checkboxField поле',
//                 //     placeholder: 'checkboxField поле',
//                 //     model: 'checkboxField',
//                 //     span: 4,
//                 // },
//                 {
//                     key: 11,
//                     type: 'checkboxGroup',
//                     name: 'checkboxGroupField',
//                     // label: 'checkboxGroupField поле',
//                     model: 'checkboxGroupField',
//                     span: 8,
//                     options: [
//                         {label: 'one', value: 1, span: 12},
//                         {label: 'two', value: 2, span: 12},
//                         {label: 'three', value: 3, span: 12},
//                         {label: 'four', value: 4, span: 12},
//                     ],
//                     rules: [
//                         {required: true, message: `Поле должно быть заполнено`}
//                     ]
//                 }
//
//             ],
//             {
//                 key: 7,
//                 type: 'date',
//                 name: 'dateField',
//                 label: 'dateField поле',
//                 model: 'dateField',
//                 // span: 12,
//                 rules: [
//                     {
//                         required: true,
//                         message: `Поле должно быть заполнено`
//                     },
//                 ]
//             },
//
//         ],
//     },
// }
