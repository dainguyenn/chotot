import * as request from '../utils/request';

export const sigup = async (data) => {
    try{
        const res = await request.post('sigup',data)
        return res.data;
    }catch(error){
        console.log(err);
    }
} 

export const login = async (data) => {
    try{
        const res = await request.post('login',data)
        return res.data;
    }catch(error){
        console.log(err);
    }
} 


