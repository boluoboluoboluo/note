

### 异常

```py
try:
    raise TypeError("dd")
except Exception as e:
    print(e)
finally:
    pass
```



### 闭包

#### 概念

闭包(Closure)是词法闭包(Lexical Closure)的简称，是函数式编程的重要语法结构。如果一个函数里定义了一个内部函数，这个函数引用了外部函数的相关参数或变量，外部函数最终把这个内部函数返回了，那么这个内部函数被称为闭包

```py
#示例
def func(x):
    def inner(y):		#inner函数就是闭包
        return x + y
    return inner
```

#### 外部局部变量注意

```py
#注意：闭包无法修改外部局部变量
def func():
    x = 0
    def inner():
        x = 1
        print('inner x:',x)
    print('func x before run inner:',x)
    inner()
    print('func x after run inner:', x)

func()

'''
运行结果：
func x before run inner: 0
inner x: 1
func x after run inner: 0
'''
```

```py
#注意2：闭包无法访问外部局部变量
def func():
    x = 10
    def inner():
        x = 2*x
        print(x)
    return inner

func()()

'''
运行结果：
UnboundLocalError: local variable 'x' referenced before assignment
'''
```

```py
# 通过nonlocal关键字来解决访问外部局部变量
def func():
    x = 10
    def inner():
        nonlocal x   #把x声明为非局部变量
        x = 2*x
        print(x)
    return inner

func()()
```

#### 应用场景：装饰器

装饰器本身就是一个闭包，它可以保留被装饰函数的状态信息，并在被装饰函数执行前后添加额外的功能。

```py
import time

#示例，计算函数运行时间
def run_time(func):
    def wrapper(*args,**kwargs):
        time_start = time.time()
        func(*args,**kwargs)
        time_end = time.time()
        print("运行时间为{}秒".format(int(time_end-time_start)))
    return wrapper

@run_time 
def func(x):
    time.sleep(x)

func(2)
```

#### 其他

闭包还有许多其他应用场景，包括事件驱动编程，状态机等

### 反射

#### 概念

 所谓反射是指通过字符串的方式获取对象，然后执行对象的属性或方法。在python中一切皆对象，因此我们可以对一切事物进行发射。

反射即想到4个内置函数分别为:getattr、hasattr、setattr、delattr  获取成员、检查成员、设置成员、删除成员

可使用反射的地方：

```
1、反射类中的变量：静态属性,类方法，静态方法
2、反射对象中的变量、对象属性、普通方法
3、反射模块中的变量、反射本文件中的变量
```

#### getattr

判断类、对象或者模块中是否有相应的属性或方法。

```py
#用法：判断obj中是否有str属性，有就返回，没有时有传入第三参数就返回第三参数，没有就报错
#getattr(obj,str,default=None) 

class A:
    name = 'zs'
    age = 18
print(getattr(A,'name'))
print(getattr(A,'language','notfound'))
```

#### setattr

设置属性。第三参数为新的属性值

```py
class A:
    name = 'zs'
    age = 18
setattr(A,'name','ls')
setattr(A,'language','Chinese')
print(getattr(A,'name'))
print(getattr(A,'language','notfound'))
```

#### hasattr

判断时候有某个属性，有就返回True，没有就返回False

```py
class A:
    name = 'zs'
    age = 18
if hasattr(A,'name'):
    print(getattr(A,'name'))
```

#### delattr

删除某个属性

```py
class A:
    name = 'zs'
    age = 18

delattr(A,'name')
print(hasattr(A,'name'))
```

#### dir

返回包含大多数属性名的列表

```py
class A:
    name = 'zs'
    age = 18

atts = dir(A)
#a = A()
#atts2 = dir(a)
print(atts)
```

### 泛型

#### 概念

泛型本质是指类型参数化。意思是允许在定义类、接口、方法时使用类型形参，当使用时指定具体类型，所有使用该泛型参数的地方都被统一化，保证类型一致。

```py
from typing import TypeVar

T = TypeVar('T')

#List[T]表示一个由任意类型T的元素组成的列表，Optional[T]表示一个可能为空的T类型的变量。
def first(l: List[T]) -> Optional[T]:
    if l:
        return l[0]
    else:
        return None
```

示例需求：参数value的type是int，就返回int类型；如果value的type是float，就返回float类型。

```py
from typing import TypeVar

T = TypeVar('T')

#参数类型是什么，返回值类型就是什么
def func(value: T) -> T:
    return value

result = func(1)
```

### 依赖注入

#### 类的执行过程

```py
class Foo:
    def __init__(self，name):
        self.name =123
    def f1(self):
        print(self.name)
 
#解释器解析：
#1、遇到class Foo，执行type的__init__方法
#2、Type的init的方法里面做什么呢？
obj = Foo(123)
#3、执行Type的__call__方法
#    然后执行Foo类的__new__方法
#    最后执行Foo类的__init__方法
```

#### 依赖注入示例

```py
class Mapper:
    __mapper_relation ={}
    @staticmethod
    def register(cls,value): #把对象cls和参数value注册进去
        Mapper.__mapper_relation[cls]=value
    @staticmethod
    def exist(cls): #判断这个cls是否存在__mapper_relation中
        if cls in Mapper.__mapper_relation:
            return True
        return False
    @staticmethod
    def value(cls):
        return Mapper.__mapper_relation[cls]
 
class MyType(type):
    def __call__(cls, *args, **kwargs):
        obj =cls.__new__(cls, *args, **kwargs)
        # print('==========')
        arg_list =list(args) #把cls的参数（元祖），转变成list对象
        if Mapper.exist(cls):
            value = Mapper.value(cls)
            arg_list.append(value)
        obj.__init__(*arg_list, **kwargs)
        return obj
 
class Foo(metaclass=MyType):
    def __init__(self,name):
        print('----------')
        self.name =name
    def f1(self):
        print(self.name)
 
class Bar(metaclass=MyType):
    def __init__(self, name):
        print('----------')
        self.name = name
    def f1(self):
        print(self.name)
 
Mapper.register(Foo,'123')  #这样Foo()就不需要加入参数了
Mapper.register(Bar,'456')  #这样Bar()就不需要加入参数了
f = Foo()
print(f.name)
b = Bar()
print(b.name)
```

### 生成器

```py
# 生成器
>>> glist_num = (x for x in range(10))   # 只需要把中括号换成小括号就成了生成器
>>> glist_num
<generator object <genexpr> at 0x7fc3d7375830>
>>> glist_num.__next__()
0
>>> glist_num.__next__()
1
>>> next(glist_num)		#同__next__()方法
2
>>> next(glist_num)
3
```

```py
# 1 生成器函数	调一次函数执行一次yield
>>> def my_func():
        print("Hello")
        yield 
    
>>> my_func()
<generator object my_func at 0x7fc3d6c70e08>
>>> res = my_func()
>>> res
<generator object my_func at 0x7fc3d6c70e60>
>>> next(res)
Hello
>>> 
>>> next(res)
Traceback (most recent call last):
  File "<stdin>", line 1, in <module>
StopIteration
```





### 协程

#### 生产者消费者问题

```py
def consumer():
    r = ''
    while True:
        n = yield r
        if not n:
            return
        print('[CONSUMER] Consuming %s...' % n)
        r = '200 OK'

def produce(c):
    c.send(None)
    n = 0
    while n < 5:
        n = n + 1
        print('[PRODUCER] Producing %s...' % n)
        r = c.send(n)
        print('[PRODUCER] Consumer return: %s' % r)
    c.close()

c = consumer()
produce(c)
```

