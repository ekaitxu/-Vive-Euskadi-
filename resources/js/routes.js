/* CREAMOS LAS RUTAS PARA LOS COMPONENTES DE ADMIN */
const adminComentarios = () => import('./components/gestionComentarios-admin.vue')
const adminUsuarios = () => import('./components/gestionUsuarios-admin.vue')

export const routes = [
    {
        name: 'gestionComentarios',
        path: '/gestionComentarios',
        component: adminComentarios
    },
    {
        name: 'gestionUsuarios',
        path: '/gestionUsuario',
        component: adminUsuarios
    },
]