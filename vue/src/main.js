import { createApp } from "vue";
import "./style.scss";
import App from "./App.vue";
import store from "./store/index.js";
import router from "./router/index.js";
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

import {
    faAngleLeft,
    faAngleRight,
    faPaperclip,
    faXmark,
    faBars,
    faMessage,
    faEdit,
    faUser,
} from "@fortawesome/free-solid-svg-icons";
library.add(
    faUser,
    faAngleLeft,
    faAngleRight,
    faPaperclip,
    faXmark,
    faBars,
    faMessage,
    faEdit
);

const app = createApp(App)
    .use(router)
    .use(store)
    .component("font-awesome-icon", FontAwesomeIcon)
    .mount("#app");
