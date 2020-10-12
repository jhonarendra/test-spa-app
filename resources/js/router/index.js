import Home from '../components/Home.vue'
import About from '../components/About.vue'
import Contact from '../components/Contact.vue'
import ContactAdd from '../components/ContactCreate.vue'

export default {
    mode: 'history',

    routes: [{
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/contact/add',
            name: 'contact-add',
            component: ContactAdd
        }

    ]
}