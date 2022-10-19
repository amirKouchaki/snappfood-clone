import store from "../../../store";

const GuestMiddleware = (to, from, next) => {
    if (store.getters["authenticated"]) next({ name: "dashboard" });
    else next();
};

export default GuestMiddleware;
