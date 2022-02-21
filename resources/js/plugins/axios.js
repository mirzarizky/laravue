import Vue from "vue";
import axios from "axios";

const axiosIns = axios.create({
    // You can add your headers here
    // ================================
    // baseURL: `${process.env.MIX_APP_URL}`,
    // timeout: 1000,
    headers: { Accept: "application/json", "Content-Type": "application/json" },
    withCredentials: true,
});

// axiosIns.interceptors.response.use(
//     (response) => response,
//     (error) => {
//         if (error.response.status === 401) {
//             window.location.reload()
//         }

//         return Promise.reject(error)
//     }
// )

Vue.prototype.$http = axiosIns;

export default axiosIns;
