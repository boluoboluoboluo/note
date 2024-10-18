import { Md5 } from "ts-md5"


//判断是移动端还是 pc 端 ，true 表示是移动端，false 表示是 pc 端
export function isMobileOrPc() {
	if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
	  return true
	} else {
	  return false
	}
}

//登录检查
export function login_check(){
	if(localStorage.getItem("token")){
		return true
	}else{
		return false
	}
}


//md5加密
export function md5(str:string){
	const md5:any = new Md5()
	md5.appendAsciiStr(str)
	const restr = md5.end()
	return restr
}


