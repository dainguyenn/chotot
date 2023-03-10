import {   ArrowUpOnSquareIcon, BellIcon, ChatBubbleLeftRightIcon , FaceSmileIcon, HomeIcon, MagnifyingGlassIcon, ShoppingBagIcon } from "@heroicons/react/24/solid";
import Button from "./Button";
import NavItem from "./NavItem";

function GuestNav() {
    const navItem = [
        {
            icon:<HomeIcon/> ,
            title:'Trang chủ',
            to:'/'
        },
        {
            icon:<FaceSmileIcon/> ,
            title:'Quản lý tin',
            to:''
        },
        {
            icon:<ShoppingBagIcon/> ,
            title:'Đơn hàng',
            to:''

        },
        {
            icon:<ChatBubbleLeftRightIcon/>,
            title:'Chat',
            to:''

        },
        {
            icon:<BellIcon  /> ,
            title:'Thông báo',
            to:''

        },
    ]

    return ( <div className="bg-[#ffba00] fixed w-full ">
        <div className="max-w-[960px] mx-auto">
        <div className="flex items-center h-[52px]">
            <img className="h-[35px]" src="src/assets/transparent_logo.webp" alt="" />
            <div className="flex-1 flex items-center justify-between ml-[123px]">
                {navItem.map((item,index) => (
                    <NavItem key={index}  item={item}/>
                ))}
                {false ? <div className="flex"><img className="w-[34px] h-[34px] rounded-lg" src="" alt="" /> User</div>:
                    <Button to={'/login'}>Login</Button>
                }
            </div>
            
         </div>
         <div className="flex h-12 pb-3">
                <div className="flex-1 relative">
                    <input className="w-full h-full focus:outline-none rounded-md px-2 py-2" type="text" name="" id=" " placeholder="Tìm kiếm trên chợ tốt"/>
                    <div className="flex items-center absolute right-[-6px] top-[3px]">
                    <Button className={'bg-[#FF8800]'}>
                        <MagnifyingGlassIcon className="w-4"/>
                    </Button>
                    </div>
                </div>
                <div>
                    <Button className="bg-[#FF8800] flex items-center " warning>
                        <ArrowUpOnSquareIcon className="w-[24px] mr-3"/>
                        Đăng tin</Button>
                </div>
            </div>
        </div>
    </div> );
}

export default GuestNav;