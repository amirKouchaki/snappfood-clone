import { createRouter, createWebHistory } from "vue-router";

import LandingPage from "./../views/LandingPage.vue";
import GuestLayout from "./../layouts/GuestLayout.vue";
const routes = [
    {
        path: "/guest",
        name: "guest",
        component: GuestLayout,
        children: [
            {
                path: "/",
                name: "landingPage",
                component: LandingPage,
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
