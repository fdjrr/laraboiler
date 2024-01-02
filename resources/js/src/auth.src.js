import { apiJson } from "@/libs/api";

export const login = async (action, data) => {
  try {
    return await apiJson.post(action, data);
  } catch (error) {
    return error.response.data;
  }
};
