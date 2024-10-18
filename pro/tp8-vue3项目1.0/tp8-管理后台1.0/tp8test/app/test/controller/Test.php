<?php

namespace app\test\controller;

use app\BaseController;
use think\Request;
use think\facade\Db;
use think\facade\View;
use think\facade\Cache;
use think\facade\Filesystem;

class Test extends BaseController{

    public function test(){
        // sleep(5);
        return view('',["name"=>"ddd"]); 
    }

	public function test2(){

		$url = "/sdfwe/weffe";
		$url = explode("?",$url)[0];
		dump($url);
	}


	public function hash_test(){
		$password = '123456';
		// $options = array('salt' => 'salt_value', 'cost' => 12);
 
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
		echo "哈希密码: " . $hashedPassword;
		echo "<br>";
		$f = password_verify("123456",$hashedPassword);

        echo $f;
	}

	


    public function uploadtest(){
        return view();
    }
     

    //文件上传
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');

        // 上传到本地服务器,/runtime/starage
        // $savename = \think\facade\Filesystem::putFile( 'topic', $file);

        //上传到/public/storage
        $savename = \think\facade\Filesystem::disk('public')->putFile( 'topic', $file);
    }

    //多文件上传
    public function uploadFiles(){
        // 获取表单上传文件
        $files = request()->file('images');
        $savename = [];
        foreach($files as $file){
            $savename[] = \think\facade\Filesystem::putFile( 'topic', $file);
        }
    }

    public function uploads(){
        // 获取表单上传文件
        $files = request()->file();
        try {
            validate(['images'=>'fileSize:10240|fileExt:jpg|image:200,200,jpg'])
                ->check($files);
            $savename = [];
            foreach($files as $file) {
                $savename[] = \think\facade\Filesystem::putFile( 'topic', $file);
            }
        } catch (\think\exception\ValidateException $e) {
            echo $e->getMessage();
        }
    }


    //一些
    public function some(Request $request){

        $arr = ["id"=>3,"name"=>"sdfwefwefsdfew"];
        // return json($arr);

        // dump($request);

        halt("调试...");
        // halt($request);
        

        // input("get.id");     //助手函数
        
        // session("x");       //session 默认关闭
        
         // return download(root_path().'image.jpg', 'my.jpg');    //下载
         
         // return view("index/test");      //需安装tihnk-view扩展
         
         //Log::write("");              //记日志，需要use think\facade\Log;
         trace("mihao");        //记日志助手函数
    }


    //route/app.php定义了路由规则，导致该路由 http://localhostindex/hello 失效
    //正确访问方式：http://localhost/hello/xxx
    public function hello($name = 'ThinkPHP8'){
        return 'hello,' . $name;
    }

}
