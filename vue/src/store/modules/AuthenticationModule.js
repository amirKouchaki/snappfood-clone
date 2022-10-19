import axiosClient from "../../../axios";

const AuthenticationModule = {
    state: { user: null, authenticated: localStorage.getItem("authenticated") },
    getters: { authenticated: (state) => state.authenticated },
    mutations: {
        setAuthUser: (state, payload) => {
            state.user = payload.user;
            state.authenticated = true;
            localStorage.setItem("authenticated", true);
        },
        logout: (state) => {
            localStorage.removeItem("authenticated");
            state.authenticated = false;
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
        loginWithCode: async ({ commit }, payload) => {
            const res = await axiosClient.post("/api/loginWithCode", payload);
            if (res.data.loginSuccess) commit("setAuthUser", res.data);
            return res;
        },
        loginWithPassword: async ({ commit }, payload) => {
            const res = await axiosClient.post(
                "/api/loginWithPassword",
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
        logout: async ({ commit }) => {
            const res = await axiosClient.post("api/logout");

            if (res.status == 200) commit("logout");
            return res;
        },
    },
};

export default AuthenticationModule;
