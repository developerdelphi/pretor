import Dashboard from './components/dashboard/dashboard.vue'
import PaisIndex from './components/pais/PaisIndex.vue'
import EstadoIndex from './components/estado/EstadoIndex.vue'
import CidadeIndex from './components/cidade/CidadeIndex.vue'
import Area from './components/area/Area.vue'
import AreaIndex from './components/area/AreaIndex.vue'
import AreaForm from './components/area/AreaForm.vue'

export const routes = [
    {
        path: '*',
        component: Dashboard
    },
    {
        path: '/dashboard',
        component: Dashboard
    },
    {
        path: '/paises',
        component: PaisIndex
    },
    {
        path: '/estados',
        component: EstadoIndex
    },
    {
        path: '/cidades',
        component: CidadeIndex
    },
    {
        path: '/areas',
        //name: 'areas',
        component: Area,
        children: [
            { path: '', name: 'index', component: AreaIndex },
            { path: ':view', name: 'index', component: AreaIndex },
            { path: ':view', name: 'form', component: AreaForm },
        ]
    }
]



