import {createRouter,createWebHistory} from 'vue-router';
import NotFound from "@/components/Not-Found/NotFound.vue";
import Tasks from "@/components/Tasks/pages/listTasks.vue";
import TasksRoutes from '../components/Tasks/routes/routes'
const routes = [
        ...TasksRoutes,
    {path:'/:catchAll(.*)',component:NotFound},
];
const router= createRouter({
    routes:routes,
    history:createWebHistory(),
});
export default router;