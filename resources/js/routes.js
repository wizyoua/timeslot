import Example from './components/ExampleComponent.vue'
import Create from './components/CreateComponent.vue'
import Edit from './components/EditComponent.vue'

export default {
    mode: 'history',
    base: '/',
    fallback: true,
    routes : [
        {
            path: '/',
            component: Example,
            name: 'Example'
        },
        {
            path:'/create',
            component: Create,
            name: 'Create'
        },
        {
            path:'/edit/:id',
            component: Edit,
            name: 'edit'
        }
    ]
}