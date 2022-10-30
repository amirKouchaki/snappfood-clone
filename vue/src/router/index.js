import { createRouter, createWebHistory } from "vue-router";

import LandingPageView from "./../views/LandingPageView.vue";
import GuestLayout from "./../layouts/GuestLayout.vue";
import DashboardView from "./../views/DashboardView.vue";
import VenderMenuView from "./../views/VenderMenuView.vue";
import AuthLayout from "./../layouts/AuthLayout.vue";
import store from "../store";
import middleware from "./middlewares";

const routes = [
    {
        path: "/",
        name: "landingPage",
        component: LandingPageView,
        beforeEnter: middleware.guest,
    },
    {
        path: "/guest",
        name: "guest",
        component: GuestLayout,
        beforeEnter: middleware.guest,
        children: [],
    },
    {
        path: "/auth",
        name: "auth",
        component: AuthLayout,
        beforeEnter: middleware.auth,
        children: [
            {
                path: "/dashboard",
                name: "dashboard",
                component: DashboardView,
            },
            {
                path: "/venders/:vender",
                name: "venders.show",
                component: VenderMenuView,
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    // await store.restored;
    next();
});

export default router;
