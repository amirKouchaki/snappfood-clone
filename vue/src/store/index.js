import { createStore } from "vuex";
import axiosClient from "../../axios";

const store = createStore({
    state: {
        user: {
            token: sessionStorage.getItem("TOKEN"),
        },
    },
    getters: {},
    mutations: {},
    actions: {
        sendRegisterEmail: async ({ commit }, email) => {
            const res = await axiosClient.post("/register", { email: email });

            return res;
        },
    },
    modules: {},
});

export default store;
