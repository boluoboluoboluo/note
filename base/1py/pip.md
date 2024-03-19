#### pip

```sh
#pip更新
python -m pip install --upgrade pip

#设置全局源
pip config set global.index-url https://pypi.tuna.tsinghua.edu.cn/simple

#查看某个包可用版本
pip install packge_name==

#安装指定版本
pip install pyside6==6.4.1

#从某个源安装pyside6包
pip install --index-url=https://pypi.tuna.tsinghua.edu.cn/simple pyside6 
```

#### 常见源

```
阿里云镜像源：http://mirrors.aliyun.com/pypi/simple/
 
清华大学镜像源：https://pypi.tuna.tsinghua.edu.cn/simple/
 
中国科技大学镜像源：http://pypi.mirrors.ustc.edu.cn/simple/
 
华中理工大学镜像源：http://pypi.hustunique.com/
 
山东理工大学镜像源：http://pypi.sdutlinux.org/
 
豆瓣镜像源：https://pypi.douban.com/simple/
```

