 
import {
    createBrowserRouter 
  } from "react-router-dom"; 
import Resigter from "../pages/Resigter";
import GuestLayout from "../layouts/GuestLayout";
import Login from "../pages/Login";

export const router = createBrowserRouter([
    {
        path: '/',
        element: <GuestLayout/>,
        children: [
            {
                path: 'login',
                element: <Login/>
            },
            {
                path: '/resigter',
                element: <Resigter/>
            }
        ]
    }
]);
