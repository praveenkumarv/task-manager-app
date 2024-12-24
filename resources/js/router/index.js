import { createWebHistory, createRouter } from "vue-router";
import { useUsers } from "../store/users";

// const ExampleComponent = () => import("../components/ExampleComponent.vue");

const Login = () => import("../components/auth/Login.vue");
const Register = () => import("../components/auth/Register.vue");

const Dashboard = () => import("../components/Dashboard.vue");
const Users = () => import("../components/users/Index.vue");

const StatusIndex = () => import("../components/status/Index.vue");
const StatusEdit = () => import("../components/status/Edit.vue")

const Task = () => import("../components/tasks/Index.vue");
const UserTask = () => import("../components/userTasks/Index.vue");
const TaskEdit = () => import("../components/tasks/Edit.vue")
const Upcoming = () => import("../components/tasks/Upcoming.vue")



// const useStore = useUsers();

// /* Guest Component */
// const Login = () => import('@/components/Login.vue')
// const Register = () => import('@/components/Register.vue')
/* Guest Component */

// /* Layouts */
// const DahboardLayout = () => import('@/components/layouts/Default.vue')
// /* Layouts */

// /* Authenticated Component */
// const Dashboard = () => import('@/components/Dashboard.vue')
// /* Authenticated Component */

const routes = [
    {
        name: "login",
        path: "/login",
        component: Login,
        meta: {
            middleware: "guest",
            title: `Login`,
        },
    },
    {
        name: "register",
        path: "/register",
        component: Register,
        meta: {
            middleware: "guest",
            title: `Register`,
        },
    },
    {
        name: "dashboard",
        path: "/dashboard",
        component: Dashboard,
        meta: {
            title: `Users Dashboard`,
        },
        children: [
            {
                name: "users",
                path: "/users",
                component: Users,
            },

            {
                name: "status",
                path: "/status",
                component: StatusIndex,
                children: [
                ],

                meta: {
                    title: `Status Dashboard`,
                },
            },
            {
                name: "status_edit",
                path: "/status/edit/:id",
                component: StatusEdit
            },
            {
                name: "tasks",
                path: "/tasks",
                component: Task,
                children: [],

                meta: {
                    title: `Task Dashboard`,
                },
            },
            {
                name: "upcoming",
                path: "/tasks/upcoming",
                component: Upcoming,
                children: [],
                meta: {
                    title: `Upcoming Tasks`,
                },
            },
            {
                name: "tasks_edit",
                path: "/tasks/edit/:id",
                component: TaskEdit
            },
            {
                name: "user_tasks",
                path: "/user_tasks",
                component: UserTask,
                children: [

                ],

                meta: {
                    title: `User Tasks Dashboard`,
                },
            }

        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// protect the dashboard and example component pages
router.beforeEach((to, from, next) => {
    const useStore = useUsers();
    const authToken = localStorage.getItem('auth_token');

    document.title = to.meta.title;

    console.log(authToken);

    if (to.meta.middleware == "guest") {
        if (useStore.$state.userAuthenticated) {
            next({name: 'dashboard'});
        }
        next();
    } else {
        if (useStore.$state.userAuthenticated) {
            next();
        } else {
            next({ name: "login" });
        }
    }
});

export default router;
