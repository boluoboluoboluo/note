import service from "./service";

//登录
export function api_act_login(params:any){
	let url = "/test/apiTest/act_login"
	return service.post(url,params)
}