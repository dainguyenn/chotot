import Button from "../components/Button";

 

function Login() {
    return ( <div className="flex justify-center mt-[150px]"> 
        <form className="bg-white container rounded-3xl w-[65%]  border-solid border-2" method="POST">
            <input type="hidden" name="prev" />

            <h3 className="text-4xl mt-5 font-bold text-center">Đăng nhập</h3>
          
            <div className="mt-11 m-auto px-14">
                <label className="font-medium" >Tài khoản:</label>
                <input name="username" className="block w-full border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" type="text"/>

            </div>
            <div className="my-9 m-auto px-14">
                <label className="font-medium" >Mật Khẩu:</label>
                <input name="password" type="password" className="block w-full border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300"  />
            </div>
            <div className="px-14 py-5 m-auto flex justify-center items-center">

                <Button primary name="submit">Đăng nhập</Button>
                <Button danger to={'/resigter'}>Đăng ký</Button>
                <a href="">Quên mật khẩu</a>
            </div>
        </form>
    </div> );
}

export default Login;