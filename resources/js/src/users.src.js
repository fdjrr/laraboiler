import { apiFormData, apiJson } from "@/libs/api.js";

export const createUser = async (formAction, formData) => {
  try {
    return await apiJson.post(formAction, formData);
  } catch (error) {
    return error.response.data;
  }
};

export const updateUser = async (formAction, formData) => {
  try {
    return await apiJson.patch(formAction, formData);
  } catch (error) {
    return error.response.data;
  }
};

export const deleteUser = async (formAction) => {
  try {
    return await apiJson.delete(formAction);
  } catch (error) {
    return error.response.data;
  }
};

export const updateProfile = async (formAction, formData) => {
  try {
    return await apiJson.patch(formAction, formData);
  } catch (error) {
    return error.response.data;
  }
};

export const exportUser = async (formAction, formData) => {
  try {
    return await apiJson.post(formAction, formData);
  } catch (error) {
    return error.response.data;
  }
};

export const importUser = async (formAction, formData) => {
  try {
    return await apiFormData.post(formAction, formData);
  } catch (error) {
    return error.response.data;
  }
};
