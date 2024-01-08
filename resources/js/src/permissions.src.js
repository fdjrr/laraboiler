import {apiJson} from "@/libs/api.js";

export const createPermission = async (formAction, formData) => {
  try {
    return await apiJson.post(formAction, formData);
  } catch (error) {
    return error.response.data
  }
}

export const updatePermission = async (formAction, formData) => {
  try {
    return await apiJson.patch(formAction, formData);
  } catch (error) {
    return error.response.data
  }
}
