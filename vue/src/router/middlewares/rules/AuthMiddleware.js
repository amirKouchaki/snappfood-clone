import store from "../../../store";

const AuthMiddleware = (to, from, next) => {
    if (!store.getters["authenticated"]) next({ name: "landingPage" });
    else next();
};

export default AuthMiddleware;
