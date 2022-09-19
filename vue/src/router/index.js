import { createRouter, createWebHistory } from "vue-router";

import LandingPageView from "./../views/LandingPageView.vue";
import GuestLayout from "./../layouts/GuestLayout.vue";
import DashboardView from "./../views/DashboardView.vue";
import AuthLayout from "./../layouts/AuthLayout.vue";
import store from "../store";
const routes = [
    {
        path: "/",
        name: "landingPage",
        component: LandingPageView,
        meta: { isGuest: true },
    },
    {
        path: "/guest",
        name: "guest",
        component: GuestLayout,
        meta: { isGuest: true },
        children: [],
    },
    {
        path: "/auth",
        name: "auth",
        component: AuthLayout,
        meta: { requiresAuth: true },
        children: [
            {
                path: "/dashboard",
                name: "dashboard",

                component: DashboardView,
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    await store.restored;
    if (to.meta.requiresAuth && !store.state.user)
        next({ name: "landingPage" });
    else if (to.meta.isGuest && store.state.user) next({ name: "dashboard" });
    else next();
});

export default router;
