import Button from "../components/Button";

function Resigter() {
    return ( <div className="flex justify-center mt-[150px]"> 
    <form class="bg-white container rounded-3xl w-[65%]  border-solid border-2" method="POST">
        <input type="hidden" name="prev" />

        <h3 class="text-4xl mt-5 font-bold text-center">Đăng Ký</h3>
        <div class="mt-11 m-auto px-14">
            <label class="font-medium" for="">Tên:</label>
            <input name="name" class="block w-full border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" type="text"/>

        </div>
        <div class="mt-11 m-auto px-14">
            <label class="font-medium" for="">Email:</label>
            <input name="email" class="block w-full border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" type="text"/>

        </div>
        <div class="mt-11 m-auto px-14">
            <label class="font-medium" for="">Tài khoản:</label>
            <input name="username" class="block w-full border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" type="text"/>

        </div>
        <div class="my-9 m-auto px-14">
            <label class="font-medium" for="">Mật Khẩu:</label>
            <input name="password" type="password" class="block w-full border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300"  />
        </div>
        <div class="px-14 py-5 m-auto flex justify-center items-center">

            <Button primary name="submit">Đăng ký</Button>
            <div>
                <span>Bạn đã có tài khoản?</span><Button outlineNone to={'/login'}><span className="text-[#e84755]">Đăng nhập</span></Button>
            </div>
            
        </div>
    </form>
</div> );
}

export default Resigter;