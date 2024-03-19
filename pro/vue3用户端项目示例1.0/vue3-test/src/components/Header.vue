<template>
	<div class="top">
		<div  class="title-box">
			<input v-if="isMobileOrPc()" type="button" class="menu" @click="mdir_toggle" value="目录"/>
		</div>
		<div class="navbar-box">

				<span v-if="isLogin()" class="navbar-title">
					<a href="" @click="logout">退出</a>
					<!-- <RouterLink to="/logout">退出</RouterLink> -->
				</span>
				<span v-else class="navbar-title">
					<RouterLink to="/login">登录</RouterLink>
				</span>

		</div>
	</div>
</template>
<script setup lang="ts">
	import {mdir_toggle as out_mdir_toggle} from "@/views/Home.vue"
	import { isMobileOrPc,login_check } from "../utils/common";
	import {useRouter} from 'vue-router'

	const router = useRouter()

	function mdir_toggle(){
		out_mdir_toggle()
	}
	function isLogin(){
		return login_check()
	}
	function logout(){
		//TODO..后端退出登录代码
		localStorage.removeItem('token')
		router.push('/')
	}
</script>
<style scoped>
.title-box{
	width:30%;
	/* padding-left:20px; */
	display:inline-block;
}
.navbar-box{
	width:69%;
	display: inline-block;
	text-align: right;
	
}

</style>
