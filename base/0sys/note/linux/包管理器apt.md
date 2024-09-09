#### common

**apt针对debian系列系统**  

```sh
#备份配置源
cp /etc/apt/sources.list /etc/apt/sources.list.bak
#配置清华源：清华源镜像站

#包管理器apt 
#apt-get适合脚本，apt适合终端交互
apt-cache madison package_name	#查询源可用版本
sudo apt update
sudo apt search <keyword>	#查找
apt show <package_name>		#查看软件包的信息
sudo apt install
sudo apt install /full/path/file.deb		# 安装本地包
sudo apt remove
sudo apt autoremove		# 删除不需要的包（无依赖的）
sudo apt purge <package_name>	#移除软件包及配置文件
apt list --installed		#列出本地已安装的包
apt list --all-versions	#列出所有已安装的包的版本信息
#如果我们想安装一个软件包，但如果软件包已经存在，则不要升级它，可以使用 –no-upgrade 选项
sudo apt install <package_name> --no-upgrade	

#说明：如果出现依赖关系问题，提示 依赖: libcurl4 (= 7.64.0-4+deb10u3) 但是 7.74.0-1.3+deb11u1 正要被安装
#解决方法：
sudo apt install libcurl4=7.64.0-4+deb10u3		#指定安装版本(降级)

#清理配置文件残留
dpkg -l |grep "^rc"|awk '{print $2}' |xargs aptitude -y purge
```



#### 包管理器

```sh
#核心功能：
1，制作软件包
2，安装、卸载、升级、查询、校验
3，
```

