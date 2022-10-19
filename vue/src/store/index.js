import localforage from "localforage";
import { createStore } from "vuex";
// import VuexPersistence from "vuex-persist";
import axiosClient from "../../axios";
import AuthenticationModule from "./modules/AuthenticationModule";
// const vuexLocal = new VuexPersistence({
//     storage: localforage,
//     asyncStorage: true,
// });
const store = createStore({
    state: {},
    // plugins: [vuexLocal.plugin],
    getters: {},
    mutations: {},
    actions: {},
    modules: { AuthenticationModule },
});

export default store;
