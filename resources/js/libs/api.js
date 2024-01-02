import { showLoading } from "@/libs/utils";

export const apiJson = axios.create();
apiJson.interceptors.request.use(
  (config) => {
    showLoading();

    config.headers["Accept"] = "application/json";
    config.headers["Content-Type"] = "application/json";
    config.headers["Authorization"] = `Bearer ${access_token}`;

    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);
apiJson.interceptors.response.use(
  (response) => {
    Swal.close();

    return response.data;
  },
  (error) => {
    return Promise.reject(error);
  }
);

export const apiFormData = axios.create();
apiFormData.interceptors.request.use(
  (config) => {
    showLoading();

    config.headers["Authorization"] = `Bearer ${access_token}`;

    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);
apiFormData.interceptors.response.use(
  (response) => {
    Swal.close();

    return response.data;
  },
  (error) => {
    return Promise.reject(error);
  }
);
