export default [
    {path : '/', component:()=>import('../pages/listTasks.vue')},
    {path: '/add-task',component:()=> import('../pages/addEditTask.vue')},
    {path: '/edit-task/:id',component:()=> import('../pages/addEditTask.vue')},
];