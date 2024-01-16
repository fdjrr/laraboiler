import { apiJson } from "@/libs/api";

export const login = async (formAction, formData) => {
  try {
    return await apiJson.post(formAction, formData);
  } catch (error) {
    return error.response.data;
  }
};

export const logout = async (formAction) => {
  try {
    return await apiJson.get(formAction);
  } catch (error) {
    return error.response.data;
  }
};
