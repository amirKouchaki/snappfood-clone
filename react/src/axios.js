import axios from "axios";

const axiosClient = axios.create({
    baseURL: "http://localhost:8000/api",
});

axiosClient.interceptors.request.use((config) => {
    //Todo: token
    config.headers.Authorization = `Bearer EXAMPLE_TOKEN`;
    return config;
});

export default axiosClient;
