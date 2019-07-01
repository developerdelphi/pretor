import Dashboard from './components/dashboard/dashboard.vue'
import PaisIndex from './components/pais/PaisIndex.vue'
import EstadoIndex from './components/estado/EstadoIndex.vue'
import CidadeIndex from './components/cidade/CidadeIndex.vue'
import Area from './components/area/Area.vue'
import AreaIndex from './components/area/AreaIndex.vue'
import AreaForm from './components/area/AreaForm.vue'
import Configure from './components/shared/conf/conf.vue'
import Calendar from './components/agenda/calendar.vue'
import Kind from './components/kind/Kind.vue'
import KindForm from './components/kind/KindForm.vue'
import KindIndex from './components/kind/KindIndex.vue'
import Entity from './components/entity/Entity.vue'
import EntityForm from './components/entity/EntityForm.vue'
import EntityIndex from './components/entity/EntityIndex.vue'
import Process from './components/process/Process.vue'
import ProcessIndex from './components/process/ProcessIndex.vue'
import ProcessNew from './components/process/ProcessNew.vue'
import Persona from './components/persona/Persona.vue'
import PersonaIndex from './components/persona/PersonaIndex.vue'
import PersonaForm from './components/persona/PersonaForm.vue'
import Attribute from './components/attribute/Attribute.vue'
import AttributeIndex from './components/attribute/AttributeIndex.vue'
import AttributeForm from './components/attribute/AttributeForm.vue'
import Qualification from './components/qualification/Qualification.vue'
import QualificationIndex from './components/qualification/QualificationIndex.vue'
import QualificationForm from './components/qualification/QualificationForm.vue'

export const routes = [{
        path: '*',
        component: Dashboard
    },
    {
        path: '/dashboard',
        component: Dashboard
    },
    {
        path: '/attributes',
        component: Attribute,
        children: [{
                path: 'index',
                component: AttributeIndex
            },
            {
                path: 'new',
                component: AttributeForm
            },
            {
                path: 'edit/:id',
                component: AttributeForm
            }
        ]
    },
    {
        path: '/qualifications',
        component: Qualification,
        children: [{
                path: 'index',
                component: QualificationIndex
            },
            {
                path: 'new',
                component: QualificationForm
            },
            {
                path: 'edit/:id',
                component: QualificationForm
            }
        ]
    },
    {
        path: '/personas',
        component: Persona,
        children: [{
                path: 'index',
                component: PersonaIndex
            },
            {
                path: 'new',
                component: PersonaForm
            },
            {
                path: 'edit/:id',
                component: PersonaForm
            }
        ]
    },
    {
        path: '/process',
        component: Process,
        children: [{
                path: 'index',
                component: ProcessIndex
            },
            {
                path: 'new',
                component: ProcessNew
            },
        ]
    },
    {
        path: '/entities',
        component: Entity,
        children: [{
                path: 'index',
                component: EntityIndex
            },
            {
                path: 'new',
                component: EntityForm
            },
            {
                path: 'edit/:id',
                component: EntityForm,
                props: true
            },
        ]
    },
    {
        path: '/kinds',
        component: Kind,
        children: [{
                path: 'index',
                component: KindIndex
            },
            {
                path: 'new',
                component: KindForm
            },
            {
                path: 'edit/:id',
                component: KindForm,
                props: true
            },
        ]
    },
    {
        path: '/areas',
        component: Area,
        children: [{
                path: 'index',
                component: AreaIndex
            },
            {
                path: 'new',
                component: AreaForm
            },
            {
                path: 'edit/:id',
                component: AreaForm,
                props: true
            },
        ]
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
        path: '/configure',
        component: Configure
    },
    {
        path: '/agenda',
        component: Calendar
    },
]
