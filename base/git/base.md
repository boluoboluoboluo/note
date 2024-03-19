

### 初始化

```sh 
#空目标目录下
git init		#初始化git仓库
```

### 拉取远程分支

```sh
git pull origin main	#拉取main分支
```

### 克隆

```sh
git clone url			#克隆一个远程仓库
```

### 提交

```sh
git add .				#添加文件到暂存区
git commit -am "注释"		#提交代码到本地仓库
git push				#推送代码到远程仓库
```

### 日志

```sh
git log -3				#查看最近3次提交历史
git log --stat -2		#查看最近的2次提交，显示文件名
git log --pretty=oneline
git log origin -3		#查看远程仓库3次提交历史
git reflog 				#查看提交记录

git show --raw			#查看最近的一次提交
git show 				#查看本次提交详情
git show <commitid>		#查看某次提交详情 commitid为版本id前7位
```

### 回退

```sh
git log					#查看版本号
git reset --hard d8fc1e10c9exxxxxxxxxxxxxx	#恢复到指定版本 hard后面为版本id
git reset --hard x	回退到某个本地版本,x为git log中出现的hash值的前七位
git push -f origin master			#强制push
```



### 补充

```sh
git diff		#工作区和暂存区差异
git diff branch1 branch2 	#2个分支对比
git diff commit1 commit2			#2次提交记录对比 commitid为版本id前7位
git diff commit1 commit2 --/xx/xx.xx			#2次提交的某文件对比

git clean -nf		#如果莫名生成Untracked files，使用此命令查看
git clean -f			#删除untracked files 
git clean -fd		#删除untracked files (连同untracked目录)

git rm <file>	#删除文件

git reset head~		#撤销上一次的commit和add
```

### 分支

```sh
git branch 			#查看本地所有分支
git branch -r		#查看远程所有分支
git branch <branchname>		#新建分支
git branch -d <branchname>	#删除本地分支

git branch -M main		#分支重命名为 main

git checkout <branchname>	#切换分支

#以下命令将本地的 master 分支推送到 origin 主机的 master 分支。
git push origin master

git remote add origin git@xx.com:test/test.git		#添加远程仓库
git remote -v		#查看远程仓库地址
git push -u origin master		#推送至远程仓库，（使用了u参数，下次可直接用git push推送

#合并开发分支 到当前分支
git merge branchname

git log branchname		#查看分支日志
```

### 导出

```sh
git archive --format zip --output "./output.zip" master -0
git archive -v --format=zip v0.1 > v0.1.zip		#将tag为v0.1的版本导出
git archive -o ../version-1.0.0.tar 9976c24		#导出指定提交记录
```

```sh
#导出日志清单
git log --date=iso --pretty=format:’"%h","%an","%ad","%s"’ >> c:/gitcommit.txt
#导出日志清单 根据日期
git log --date=iso --pretty=format:’"%h","%an","%ad","%s"’ --since="2023-07-01" --until="2023-12-31" >> c:/gitcommit.txt
#%d表示显示ref，分支、tag 名称，带括号
git log --date=iso --pretty=format:’"%h","%an","%ad","%s","%d"’ >> c:/gitcommit.txt	
#只导出带标签的日志
git log --no-walk --tags --date=iso --pretty=format:’"%h","%an","%ad","%s","%d"’ >> c:/gitcommit.txt
```

### tag

```sh
git tag -a v1.0 -m "tag test.."		#当前提交打标签
git tag -a v1.0 -m "tag test.."	 9976c24	#给指定提交打标签
git tag 	#查看所有tag
git show v1.0	#查看某个tag
git tag -d v1.0		#删除tag
git push origin <Tag 名字> 	#推送单个Tag
git push origin --tags		#推送所有tag

git log --no-walk --tags	#显示标签的log
git log --no-walk --tags --oneline	#单行显示
git log --no-walk --tags=*some_string*	#字符串匹配
```

### 邮箱

```sh
#查看当前仓库用户名和邮箱 在git项目目录下:
git config user.name
git config user.email

#配置当前仓库用户名和邮箱 在git项目目录下:
git config user.name "xxx"
git config user.email "xx@xxx.com"

#配置全局用户名和邮箱
git config --global user.name
git config --global user.email

```











