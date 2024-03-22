### common

#### 示例

```py
# -*- coding:utf-8 -*-
import time
import sys
import os
import gc

print("hello")	#打印
print("hello",end="")	#不换行
print("hello",flush=True)	#立即输出缓冲区

#随机数
r = random.randint(1,10)

#暂停3秒 
time.sleep(3)

#输入函数，回车结束
s = input("请输入：")

#退出，默认0正常
exit(0)

#命令行参数
print(sys.argv)	#执行py test.py a b c 输出：['test.py','a','b','c']

#执行系统命令
os.system("mkdir today")

#删除变量，释放资源
#不会删除变量引用的对象
del a

#清除内存，尽量避免主动调用gc.collect()
#除非当你new出一个大对象，使用完毕后希望立刻回收，释放内存
gc.collect()

class A:
    __a=1	#私有方法/属性 前加2个下划线__
	__test():
        print("A.test()")
def empty():
    ''' 此闭合区间为段落注释'''
    pass	#占位符，空方法需要
def main():
    print("hello world")
if __name__ == '__main__':	#必须放在文件最后
	main()
```

#### 安装运行

```sh
#查看版本 终端输入
python
#pip升级
pip install --upgrade pip	
#查看已安装的模块 (列表，路径)
pip list
#查看模块安装路径
python -m site-packages		#site-packages 即为库安装的位置
#安装模块
pip install xxx
python -m pip install xxx 		#此命令适用于pip没有添加到环境变量
#卸载模块
pip uninstall xxx
#终端运行命令
python xxx.py
#或者
py xxx.py
```

#### 引入模块

```python
#说明，当前文件为a.py，x为目录与a.py同级，y.py在x目录下，__init__.py与a.py同级
from x import y 		#c从子目录x导入y.py 
#若在__init__.py中引入y，则为：
from .x import y

#从父目录导入 --需添加到sys
import sys
sys.path.append("..") 
import a	#从父目录引入a.py文件
```

#### 关键字

#### 变量 

```py
#变量定义 常见类型变量，局部变量，私有变量，常量
i = 3
f = 3.0
s = "abc"
arr = [1,2,3]
bl = True		#False

#打印(整型，浮点，字符串，json，数组，集合等)
print("hello world")
print("%04d,%.2f,%s,%s," % (i,f,s,arr) )		
#python3.6之后使用f函数，例：f'i is {i}'

#变量类型
t = type(arr)
isinstance(i,int)

#判断变量是否存在
if t in vars():
#或者 
if t in dir(): 
   
#调用全局表量
a=1	#方法外定义全局变量
def x():
    global a #声明a为全局变量 #方法内使用 
```

#### 流程控制 

```python
#if语句
if i > 3:
    print("if")
elif i == 3:
    print("elif")
else:
    print("else")
	
#无switch语句	#python3.10支持match case
	
#while语句
while i > 0:
    print(i)
    i = i - 1
    continue	#继续下一次循环
    # break		#退出本层循环
		
#for循环
for x in range(1,100):	#范围
    print(x)
arr = [1,2,3]
for i in arr:	#数组
    print(i)
```

#### 函数

```py
# *args表示所有参数数组
# **kargs表示传入的多个键值对key = value 形式的参数
def test(param,*args,**kargs):
	print(param)
	print(args)
	print(kargs)

if __name__ == "__main__":
	param = 1
	arg = "a"
	arg2 = ["123"]
	arg3 = {"k":"v","k2":"v2"}
	v = "value"
	v2 = "value2"
	test(param,arg,arg2,arg3,k=v,k2=v2)
```

执行结果：

```
1
('a', ['123'], {'k': 'v', 'k2': 'v2'})
{'k': 'value', 'k2': 'value2'}
```

#### 类

```py
class Car:
	a=1
    def __init__(self):
	def test(self):	#类的方法必须有一个额外的第一参数名称，惯例为self
		self.a 		#类中自己调用
        
	@staticmethod		#静态方法
    def static_func(self):
        print("static func...")
        
 	def test2():
        Car.static_func()	#调用静态方法
        
c = Car()		#new对象
c.a 			#属性
c.test()		#方法
Car.static_func()	#调用静态方法

class Bmw(Car):	#继承（多重继承，逗号分开）
	price = 100
	def __init__(self):		#初始化方法，（如子类有该方法，则不再调用父类的该方法）
		super().__init__(self)		#调用父类
```

### numeric

```python
import math

i = 3

#是否为数字，浮点数
r = isinstance(i,int)	#判断是否int
r = isinstance(i,float)	#判断是否float
r = str(i).isdigit()	#判断是否数字

#取整，四舍五入，向上取整，向下取整
r = int(i)			#取整
r = round(i,3)		#保留3位 四舍五入
r = math.floor(i)	#向下取整
r = math.ceil(i)	#向上取整

#绝对值
r = abs(i)

#数字类型转换（整数，浮点数，字符串）
r = int(i)
r = float(i)
r = str(i)

#进制转换：2，8，10，16
r = bin(i)
r = oct(i)
r = int(i)
r = hex(i)

#加减乘除
r = i+i-i
r = i*i/i
r = r%r
```

### string

```python
import base64

c = "a"
i = ord(c)	#转ascii
c = chr(i)	#转字符

s = "123"

#字符串太长续行
s2 = "本句太长" \
    "需要须行"

#字符串连接
s = "abc" + "bcd"

#空和none
s = None
if s is None:	#判断none
    print("none...")

#字符串长度
i = len(s)

#去除两端空格，去左lstrip，去右rstrip
s2 = s.strip(" ")	

#字符串转int，float（互转）
s = str(22)
i = int(s)
f = float(s)

#下标截取子串
#使用切片 参考切片

#字串是否存在 2种方式
if "abc" in s:
    print("exists..")
if s.find("abc") != -1:
    print("exists..")

#替换指定字符
s = "123"
s2 = s.replace("3","4")		#结果：124

#字符串转列表
li = list(s)	

#根据字符分割成列表
li = s.split()	#默认根据空格

#字符串转json  先 import json
s = '{"name": "Alice", "age": 25}'
json_obj = json.loads(s)
print(json_obj)
#json转字符串
data = {'name': 'Alice', 'age': 25, 'city': 'New York'}
json_str = json.dumps(data)
print(json_str)

#大小写转换
s2 = title(s)	#首字母大写，其他小写
s2 = lower(s)	#转小写
s2 = upper(s)	#转大写

#字符串编码解码
b = s.encode(encoding="utf-8")
s = b.decode(encoding="utf-8")		#注意，decode方法需要待解码字符串为字节形式，否则报错

```

#### url编码

```py
import urllib.parse

s = "dd d+ee="
url_s = urllib.parse.quote(s)	#编码
print(url_s)
s = urllib.parse.unquote(url_s)		#解码
print(s)
```

#### base64

```py
#base64编码，需导入base64
def base64_ex():
	s = "abc"
	
	#base64编码
	r = base64.b64encode(s.encode("utf-8"))			#需先通过encode方法将字符串转为字节形式
	r2 = base64.b64decode(r).decode("utf-8")		#b64解码后为字节形式，需decode，否则打印 b'abc'

```

#### md5

```py
#md5方法
import hashlib

 def md5_ex():
    code = 'xxx'		#初始
	hl = hashlib.md5()
	hl.update(code.encode(encoding='utf-8'))
	md5code = hl.hexdigest()		#md5加密后
```

#### 正则

> 字符

| 字符 | 功能                             |
| ---- | -------------------------------- |
| .    | 匹配任意1个字符（除了\n）        |
| [ ]  | 匹配[ ]中列举的字符              |
| \d   | 匹配数字，即0-9                  |
| \D   | 匹配非数字，即不是数字           |
| \s   | 匹配空白，即 空格，tab键         |
| \S   | 匹配非空白                       |
| \w   | 匹配单词字符，即a-z、A-Z、0-9、_ |
| \W   | 匹配非单词字符                   |

> 数量

| 字符  | 功能                                                |
| ----- | --------------------------------------------------- |
| *     | 匹配前一个字符出现0次或者无限次，即可有可无         |
| +     | 匹配前一个字符出现1次或者无限次，即至少有1次        |
| ？    | 匹配前一个字符出现1次或者0次，即要么有1次，要么没有 |
| {m}   | 匹配前一个字符出现m次                               |
| {m,}  | 匹配前一个字符至少出现m次                           |
| {m,n} | 匹配前一个字符出现从m到n次                          |

> 边界

| 字符 | 功能               |
| ---- | ------------------ |
| ^    | 匹配字符串开头     |
| $    | 匹配字符串结尾     |
| \b   | 匹配一个单词的边界 |
| \B   | 匹配非单词边界     |

> 分组

| 字符       | 功能                             |
| ---------- | -------------------------------- |
| \|         | 匹配左右任意一个表达式           |
| (ab)       | 将括号中字符作为一个分组         |
| \num       | 引用分组num匹配到的字符串        |
| (?P<name>) | 分组起别名                       |
| (?P=name)  | 引用别名为name分组匹配到的字符串 |

示例

```py
import re

reg = r"\d+"		#匹配首部是数字
s = "23433aaa"
pattern = re.compile(reg)
r = pattern.match(s)
print(r)
```



```py
import re

s = "the nights"
reg = "t"
m = re.match(reg,s)	#匹配，返回对象（match object),否则返回None
if m:
	data = m.group()	#若匹配，可提取数据	
	print(data)

#字符串内查找模式匹配,只到找到第一个匹配然后返回
ret = re.search(r"\d+", "阅读次数为 9999")
ret.group()

#返回所有满足匹配条件的结果,放在列表里
ret=re.findall(r'\d+',"商品：辣条,数量：5,价格：5")
print(ret)

#Python里数量词默认是贪婪的（在少数语言里也可能是默认非贪婪），总是尝试匹配尽可能多的字符；
#非贪婪则相反，总是尝试匹配尽可能少的字符。
#在"*","?","+","{m,n}"后面加上？，使贪婪变成非贪婪。

#邮箱正则
reg = r'^[\w\.-]+@[\w\.-]+\.\w+$'
ret=re.match(reg,"gmpzm@163.com")

#手机号正则
reg = r"^1[3-9]\d{9}$"
ret=re.match(reg,"13478777777")

#身份证正则
reg = r"[1-9]\d{5}(19|20)\d{2}((0[1-9])|(1[0-2]))(([0-2][1-9])|10|20|30|31)\d{3}[\d|X|x]$"

#根据身份证获取出生年月日
def get_birthday(id_number):
    pattern = r'^\d{6}(\d{4})(\d{2})(\d{2})\d{3}[\dxX]$'
    match = re.match(pattern, id_number)
    if match:
        year = int(match.group(1))
        month = int(match.group(2))
        day = int(match.group(3))
        return f"出生年月日为：{year}年{month}月{day}日"
    else:
        return "无法从身份证号码中提取出生年月日信息"

```



### list

```python
#列表方法
def arr_ex():
	arr = [1,2,3]

	#数组长度
	#i = len(arr)
	
	#数组是否为空
	#if arr:	
	#或者 if len(arr)==0:
	
	#数组添加元素，删除元素，插入元素
	#arr.append(obj)			#追加元素
	#arr.remove(obj)			#删除元素
	#arr.insert(index,obj)		#插入元素
	#arr.pop()					#删除最后一个元素
	#arr.clear()				#清空
	
	#数组是否包含某元素
	#if obj in arr:
	
	#数组合并
	#arr1 + arr2
	
	#数组字符串互转
	# '-'.join(arr)				#列表转字符串(需要arr中的元素为字符串，否则应该先转化一下，可使用map(str,arr)方法)
	# s.split("-")				#字符串根据字符分割列表
	# list(s)					#字符串转列表
	
	#数组和json互转
	#jsonstr = json.dumps(arr,ensure_ascii=False)		#需import json
	#json转obj（如list,dict）
	#obj = json.loads(jsonstr)			#需import json
    

```

#### 切片

```py
#切片
def slipce_ex():
    list = ['a','b','c']
    #切片说明
    #list[start_index: stop_index: step]。
 	#起始位置 : start_index (空时默认为 0)。
 	#终点位置: stop_index (空时默认为列表长度) 需要注意起点与终点索引的位置关系。
 	#步长: step (空时默认为 1，不能为 0)。
    
    #当 step>0，start_index 的空值下标为 0，stop_index 的空值下标为 length，step 的方向是左到右；
	#当 step<0，start_index 的空值下标为 length，stop_index 的空值下标为 0，此时反向为右到左了！
	#也就是说 start_index、 stop_index 空值代表的头和尾，是随着 step 的正负而改变的。
```



### date

```python
#日期
# from datetime import datetime
# from datetime import date
# from datetime import time
# from datetime import timedelta
def date_ex():
	
	d = "2023-01=01"
	
	#日期
	#datetime.now()				#2023-07-13 02:41:01.965626
	#datetime.utcnow()
	#dt = datetime(2023,7,1,8,0,0)	#2023-07-01 08:00:00
	#dt.date()					#2023-07-01
	#dt.time()					#08:00:00
	#date.today()				#2023-07-13
	#d = date(2023,7,1)				#2023-07-1
	#d.year
	#d.month
	#d.day
	
	#时间
	# %H：2位数字表示的24小时制  %I：2位数字表示的12小时制  %M：两位数字表示的分钟  %S：2位数字表示的秒  %f：6位数字表示的毫秒
	#dt = datetime.now()
	#t = dt.time()				#当前时间-> H:M:S
	#t2 = time(8,10,10)			# 08:10:00
	#t2.hour
	#t2.minute
	#t2.second
	#t2.microsecond
	#t2.tzinfo
	
	#日期，时间和字符串互转
	#d = datetime.now()
	#s = d.strftime("%Y-%m-%d")
	#s2 = "2023-01-01"
	#d2 = datetime.strptime(s2,"%Y-%m-%d").date()
	
	#时间戳
	#stamp = datetime.now().timestamp()			#示例：1689190536.17592
	#sec = int(stamp)							#当前的秒数
	#int(round(stamp*1000))						#当前的毫秒
	
	#时间戳转日期，时间
	#stamp = datetime.now().timestamp()
	#d = datetime.fromtimestamp(stamp)


	#日期计算，n天后日期，n月后日期，n年后日期
	#d= datetime.now()
	#tomorrow = d + timedelta(days=1)
	#tomorrow.strftime("%Y-%m-%d")
	
	#某日期为星期几
	#d = datetime.now()
	#w = d.weekday()				#0周一，1为周二，... ,6为周日
```

### file

#### 示例

```py
import os

def file_ex():
	sfile = 's.txt'		#源文件
	dfile = 'd.txt'		#目的文件

	if not os.path.exists(sfile):
		print("源文件不存在，请检查")
		exit(0)
	
	fin = open(sfile,'r',encoding='utf-8')
	fout = open(dfile,'a+')
	for row in fin:
		print(row)
		fout.write(row+'\n')
	fin.close()
	fout.close()
```

#### 基础

```python
import os

f = __file__	#当前文件名

#获取当前文件完整路径
fpath = os.path.abspath(__file__)      
fpath2 = os.path.realpath(__file__)	#同上

#当前文件所在目录完整路径
dpath = os.path.dirname(os.path.abspath(__file__))

#文件名
os.path.basename(fname)
# 分割文件名与后缀
name, extension = os.path.splitext(fname)

#当前工作目录
r = os.getcwd()

dname = "./a"
fname = "./b.txt"
r = os.path.exists(fname)	#判断文件是否存在
r = os.path.isdir(dname)	#判断是否目录
r = os.path.isfile(dname)	#判断是否文件

if len(os.listdir(dname)) == 0:		#判断目录是否为空

#目录遍历
li = os.listdir()	#遍历当前目录，返回目录下的子目录和文件列表（不包含.和..目录）
li2 = os.listdir(dpath)	#遍历指定目录

#目录创建
os.mkdir(dname)	#创建目录
os.makedirs(dname)	#递归创建
os.rename(dname,nname)	#重命名

f = open('example.txt', 'w')	#文件不存在则创建
s = os.path.getsize(fpath)		#文件大小

#open函数
open(file, mode='r', buffering=-1, encoding=None, errors=None, newline=None, closefd=True, opener=None)

#打开文件 --只读，写入，追加，读写。编码方式
# 打开文本文件（字符流），r：只读 w：写入 a：追加 
# 打开二进制文件（字节流），rb：只读 wb：写入 ab：追加
file = open("filename.txt", "r")  # 打开文本文件，只读模式

#读取文件 
f.read()	#读取整个文件 （包括换行符）
f.read(size)	#读取指定字节内容 （包括换行符）
f.readline()	#读一行 （包括换行符）
f.readlines()	#读整个文件，返回列表 （包括换行符） 比readline()快，但是耗内存

#使用with，不需要使用close来关闭文件
with open('/path/to/file', 'r') as f:
    print(f.read())
    
for line in f:
    print(line)		#读一行

#写入文件
#参考读取

#换行符判断
#系统换行符 linux为\n windows为\r\n
#读取时，默认所有\n, \r, or \r\n被默认转换为\n 
#写入时，\n会转换成系统默认换行符,windows下\r\n 会转换成\r\r\n
#open函数的newline参数用来指定换行符
os.linesep	 

#路径分隔符 linux为/ windows为\\
os.sep

#文件末尾判断
f.readline()	#返回空字符串，则认为到了文件末尾

#关闭文件
f.flush()	#刷新缓冲区
f.close		#也会执行刷新动作

#文件指针
f.seek(10)		#移动指针到第10个字节
f.seek(10,1)	#相对当前位置移动10个字节，1表示相对当前位置
f.seek(0,2)		#移动到文件末尾，2表示相对文件末尾移动
f.tell()	#获取文件指针位置

#文件权限，设置文件权限
st = os.stat(filename)
mode = st.st_mode
print("文件权限: ", oct(mode & 0o777))	#8进制

os.chmod(fname,0o755)	#所有者全部权限，用户组和其他用户读、执行权限
# u：所有者 g：用户组 o：其他用户  +表示添加，-表示删除，=表示设置
os.chmod(fname,"u+rwx,g=rx,o=r")	
```

##### 创建目录

```py
import os

def create_folder(folder: str):
    folder = os.path.abspath(folder)
    if not os.path.exists(folder):
        try:
            os.makedirs(folder)
            print(f"创建了文件夹:{folder}")
        except FileExistsError:
            print(f"文件夹已存在, 无需创建:{folder}")
        except Exception as e:
            msg = f"创建文件夹失败, folder:{folder}, e:{e}"
            print(msg)

def main():
    create_folder('A')

if __name__ == '__main__':
    main()
```

##### 拷贝目录

```py
import os.path
import shutil

def copy_folder(src: str, target: str):
    # 如果target是已存在的目录 则抛出FileExistsError异常
    # 如果target是已存在的文件 则抛出FileExistsError异常
    # 如果target不存在, 则拷贝
    src = os.path.abspath(src)
    target = os.path.abspath(target)
    try:
        shutil.copytree(src, target)
        print(f"拷贝文件夹成功, src:{src}, target:{target}")
    except FileExistsError as e:
        print(f"由于target已存在, 导致拷贝文件夹失败, src:{src}, target:{target}, e:{e}")
    except Exception as e:
        print(f"拷贝文件夹失败, src:{src}, target:{target}, e:{e}")

def main():
    copy_folder("A", 'C')

if __name__ == '__main__':
    main()
```

##### 移动目录

```py
import os.path
import shutil

def mv_folder(src: str, target: str):
    # 如果target是已存在的目录, 则移动src到该target目录下 target中出现同名的src文件夹
    # 如果target是已存在的文件 则抛出FileExistsError异常
    # 如果target不存在, 则重命名src为target 相当于移动
    src = os.path.abspath(src)
    target = os.path.abspath(target)
    try:
        shutil.move(src, target)
        print(f"移动文件夹成功, src:{src}, target:{target}")
    except FileExistsError as e:
        print(f"由于target已存在, 导致移动文件夹失败, src:{src}, target:{target}, e:{e}")
    except Exception as e:
        print(f"移动文件夹失败, src:{src}, target:{target}, e:{e}")

def main():
    mv_folder("A", 'B')

if __name__ == '__main__':
    main()
```

##### 删除目录

```py
import os.path
import shutil

def rm_folder(folder: str):
    folder = os.path.abspath(folder)
    if os.path.isdir(folder):
        try:
            shutil.rmtree(folder)
            print(f"删除文件夹成功, folder:{folder}")
        except FileNotFoundError as e:
            print(f"文件夹不存在, 无需删除, folder:{folder}, e:{e}")
        except Exception as e:
            print(f"删除文件夹失败, folder:{folder}, e:{e}")

def main():
    rm_folder("A")

if __name__ == '__main__':
    main()
```

##### 拷贝文件

```py
import os
import shutil

def copy_file(src: str, target: str):
    # 如果target是一个已存在的文件, 则覆盖文件内容
    # 如果target是一个已存在的文件夹, 则拷贝src到文件夹中, target文件夹中多一个src文件 如果target中存在同名src文件 则覆盖
    src = os.path.abspath(src)
    target = os.path.abspath(target)
    if os.path.isfile(src):
        try:
            shutil.copy2(src, target)
            print(f"拷贝文件成功, src:{src}, target:{target}")
        except Exception as e:
            print(f"拷贝文件失败, src:{src}, target:{target}, e:{e}")

def main():
    copy_file('a.txt', 'a.txt')


if __name__ == '__main__':
    main()
```

##### 移动文件

```py
import os.path
import shutil

def mv_file(src: str, target: str):
    # 如果target是一个已存在的文件, 则覆盖文件内容
    # 如果target是一个已存在的文件夹, 则移动src到文件夹中, target文件中多一个src文件 如果target中存在同名src文件 则覆盖
    src = os.path.abspath(src)
    target = os.path.abspath(target)
    if os.path.isfile(src):
        try:
            shutil.move(src, target)
            print(f"移动文件成功, src:{src}, target:{target}")
        except FileExistsError as e:
            print(f"由于target已存在, 导致移动文件失败, src:{src}, target:{target}, e:{e}")
        except Exception as e:
            print(f"移动文件失败, src:{src}, target:{target}, e:{e}")

def main():
    mv_file('a.txt', 'b.txt')

if __name__ == '__main__':
    main()
```

##### 删除文件

```py
import os.path

def rm_file(filename: str):
    filename = os.path.abspath(filename)
    if os.path.isfile(filename):
        try:
            os.remove(filename)
            print(f"删除文件成功, filename:{filename}")
        except FileNotFoundError:
            print(f"无需删除不存在的文件, filename:{filename}")
        except Exception as e:
            print(f"删除文件失败, filename:{filename}, e:{e}")

def main():
    rm_file("a.txt")

if __name__ == '__main__':
    main()
```



