##### 初始化

1,优化建议，关闭git相关，关闭自动搜索插件？关闭影响内存的索引？
2,菜单，设置界面外观
3,设置缩进为tab缩进 --4空格
  -- 文件-首选项-设置：搜索tab，
    --【Editor: Tab Size】设置为4
  --【Editor: Accept Suggestion On Enter】设置为off
  --【Editor: Insert Spaces】取消勾选
    --【Editor: Detect Indentation】取消勾选
4,外观显示空字符
5,安装chinese插件



##### 其他

关闭eslint语法检查，方法：
  --1，文件首行添加：/* eslint-disable */
 --2，当前项目下eslintignore文件里添加当前项目目录src

go插件关闭保存时自动格式化，以及import自动引入移除：
	--在settings.json中加入如下代码：
	"[go]": {
        "editor.formatOnSave": false,
        "editor.codeActionsOnSave": {
            "source.organizeImports": false
        }
    	},