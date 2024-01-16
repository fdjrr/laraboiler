import { apiJson } from "@/libs/api.js";

export const createRole = async (formAction, formData) => {
  try {
    return await apiJson.post(formAction, formData);
  } catch (error) {
    return error.response.data;
  }
};

export const updateRole = async (formAction, formData) => {
  try {
    return await apiJson.patch(formAction, formData);
  } catch (error) {
    return error.response.data;
  }
};
