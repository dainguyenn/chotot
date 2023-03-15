import axios from "axios";

const request = axios.create({
    baseURL: `http://127.0.0.1:8000/api/`
})

export const post = async (path,option={}) => {
     
        const res = await request.post(path,option
        );

        return res.data;
     
}

export default request;
