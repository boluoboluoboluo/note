	
<?php
	
	function common(){
		$str = "123456";
		//md5加密
		$re_str = md5($str);

		
	}

	//==================== Aes-256-Ecb（PKCS7Padding） start ====================
	//加密
	function aes_encrypyt($params){
		$appKey = "d279fb107a04cd885573183d3afcuuuu";	//key
		return openssl_encrypt($params,'aes-256-ecb',$appKey);
	}
	//解密
	function aes_decrypt($params){
		$appKey = "d279fb107a04cd885573183d3afcuuuu";	//key
		return openssl_decrypt($params,'aes-256-ecb',$appKey);
	}
	//==================== Aes-256-Ecb（PKCS7Padding） end ====================
    
    //==================== aes-256-cbc 加密相关 start ====================
    //加密
    public function cbc_encrypyt($params){
        $key_info = $this->btc_key();
        $appKey = $key_info["appKey"];  //key
        $iv = $key_info["iv"];

        return base64_encode(openssl_encrypt($params,'aes-256-cbc',$appKey,OPENSSL_RAW_DATA,$iv));
    }
    //解密
    public function cbc_decrypt($params){
        $key_info = $this->btc_key();
        $appKey = $key_info["appKey"];  //key
        $iv = $key_info["iv"];

        return openssl_decrypt(base64_decode($params),'aes-256-cbc',$appKey,OPENSSL_RAW_DATA,$iv);
    }
    private function btc_key(){
        $data["appKey"] = "cV7caSeH9rp4C6Enr2kiyttCc8YG****";
        $data["iv"] = "ur6Cp/o3ftAuS8xH";       //偏移

        return $data;
    }
    //==================== aes-256-cbc 加密相关 end ====================