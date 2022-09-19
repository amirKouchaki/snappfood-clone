import axios from "axios";
import store from "./src/store/index.js";

const axiosClient = axios.create({
    baseURL: "http://localhost:8000",
    withCredentials: true,
});

export default axiosClient;
