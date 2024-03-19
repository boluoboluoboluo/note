<template>
	<div class="box">
		<p></p>
		用户名：<input v-model="username"/><br><br>
		密&nbsp;&nbsp;&nbsp;码：<input type="password" v-model="password"/><br><br>
		<input type="button" name="sub_login" value="登录" @click="act_login"/>
	</div>
		
</template>
<script setup lang="ts">
	import {api_act_login} from "@/utils/api"
	import { ElMessage } from "element-plus"
	import {useRouter} from 'vue-router'
	import {ref} from 'vue'
	import { userStore } from "@/stores/user"
	import {md5} from "@/utils/common"

	const router = useRouter()
	const username = ref("")
	const password = ref("")
	
	//登录
	async function act_login(): Promise<void>{
		if(!username){
			ElMessage.error("用户名不能为空")
			return
		}
		if(!password){
			ElMessage.error("密码不能为空")
			return
		}

		let hash_password =  md5(password.value)
		let login_params = {username:username.value,password:hash_password}
		const data:any = await api_act_login(login_params)
		if(data.code == 1){
			ElMessage.success("success")
			userStore().userInfo = data.data.data
			localStorage.setItem("token",data.data.token)
			router.push('/')
		}else{
			ElMessage.error(data.msg)
		}
	}

</script>
<style scoped>
.box{
	text-align:center;
}

</style>
