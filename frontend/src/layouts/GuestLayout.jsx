import { Outlet } from "react-router-dom";  
import GuestNav from "../components/GuestNav";

function GuestLayout() {
    return ( <div className="w-full min-h-screen relative">
        <GuestNav/>
        <div className=" flex flex-col max-w-[960px] mx-auto">
            <Outlet/>
        </div>
    </div> );
}

export default GuestLayout;