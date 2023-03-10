import {  Link  } from "react-router-dom";

function NavItem({item}) { 
    return ( <Link to={item.to} className="flex items-center hover:opacity-[0.6]">
        <div  className="w-[24px]">
        {item.icon}
        </div>
        <span>{item.title}</span>
    </Link> );
}

export default NavItem;