<?php

	//生成登录随机token，用于前端登录加密 lj20211028
	//token即加密秘钥key
	public function get_rand_token(){
		$chars = 'abcdefghijklmnopqrstuvwxyz0123456789'; 
		$length = 32;
		$token = "";
		for($i = 0; $i < $length; $i++) { 
			$token .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
		} 
		return $token;
	}
	//对前端登录数据aes解密	lj20210129
	//$str:需解密的字符串
	public function wu_aes_decrypt($str){
		$key = $this->get_rand_token();
		if(!$str || !$key){
			return false;
		}
		return openssl_decrypt($str,'aes-256-ecb',$key);
	}

