
<template>
	<div class="header">
		<Header></Header>
	</div>
	<div class="mdir" :class="{hidden:ishidden }" :style="{height:winHeight + 'px'}">
		<Dir></Dir>
	</div>
	<div class="content">
		<Content></Content>
	</div>

</template>

<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import Content from '../components/Content.vue'
import Header from '../components/Header.vue'
import Dir from '../components/Dir.vue'
import {ref} from 'vue'
import { isMobileOrPc } from "../utils/common";

let winHeight = window.innerHeight-50;		//浏览器高度减去顶部
// console.log(localStorage.getItem("token"))

</script>

<script lang="ts">
const ishidden = ref(false)
if(isMobileOrPc()){
	ishidden.value = true
}
//点击切换目录菜单
export function mdir_toggle(){
	ishidden.value = !ishidden.value
}

</script>

<style scoped>
.header {
	width:100%;
	height:50px;
	line-height: 40px;
	border-bottom: 1px solid #eee;
}
.dir{
	float:left;
	width:20%;
	/* height:1000px; */

	border-right: 1px solid #eee;
}
.content{
	float:left;
	width:60%;
}
.mdir{
	float:left;
	width:30%;
	border-right: 1px solid #eee;
	transition: transform .3s;
	transform: translateX(0);
}
.mdir.hidden {
	transform: translateX(-110%);
}
</style>
