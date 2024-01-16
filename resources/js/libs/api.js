import { showLoading, modalApplicationError } from "@/libs/utils";

export const apiJson = axios.create();
apiJson.interceptors.request.use(
  (config) => {
    showLoading();

    config.headers["Accept"] = "application/json";
    config.headers["Content-Type"] = "application/json";
    if (access_token) {
      config.headers["Authorization"] = `Bearer ${access_token}`;
    }

    return config;
  },
  (error) => {
    modalApplicationError(error);

    return Promise.reject(error);
  },
);
apiJson.interceptors.response.use(
  (response) => {
    Swal.close();

    return response.data;
  },
  (error) => {
    modalApplicationError(error);

    return Promise.reject(error);
  },
);

export const apiFormData = axios.create();
apiFormData.interceptors.request.use(
  (config) => {
    showLoading();

    if (access_token) {
      config.headers["Authorization"] = `Bearer ${access_token}`;
    }

    return config;
  },
  (error) => {
    modalApplicationError(error);

    return Promise.reject(error);
  },
);
apiFormData.interceptors.response.use(
  (response) => {
    Swal.close();

    return response.data;
  },
  (error) => {
    modalApplicationError(error);

    return Promise.reject(error);
  },
);
