import localforage from "localforage";
import { createStore } from "vuex";
import VuexPersistence from "vuex-persist";
import axiosClient from "../../axios";

const vuexLocal = new VuexPersistence({
    storage: localforage,
    asyncStorage: true,
});
const store = createStore({
    state: {
        user: null,
    },
    plugins: [vuexLocal.plugin],
    getters: {},
    mutations: {
        setAuthUser: (state, payload) => {
            state.user = payload.user;
        },
        logout: (state, payload) => {
            state.user = null;
        },
    },
    actions: {
        sendRegisterEmail: async ({ commit }, email) => {
            await axiosClient.get("/sanctum/csrf-cookie");
            const res = await axiosClient.post("/api/register", {
                email: email,
            });

            return res;
        },
        verifyRegisterWithCode: async ({ commit }, payload) => {
            const res = await axiosClient.post(
                "/api/verifyRegisterWithCode",
                payload
            );
            if (res.data.loginSuccess) commit("setAuthUser", res.data);
            return res;
        },
        verifyRegisterWithPass: async ({ commit }, payload) => {
            const res = await axiosClient.post(
                "/api/verifyRegisterWithPass",
                payload
            );
            if (res.data.loginSuccess) commit("setAuthUser", res.data);
            return res;
        },
        getUser: async ({ commit }) => {
            await axiosClient
                .get("/api/user")
                .then((res) => {
                    commit("setAuthUser", res.data);
                })
                .catch((err) => {
                    throw err.response;
                });
        },
    },
    modules: {},
});

export default store;
