#### 登录相关

```sql
登录：

 --到mysql 安装bin路径
 -- mysql -u 用户名 -p 密码

数据库创建，用户名密码，访问操作权限。。锁表
```

#### 导入导出

导入：

```sql
#mysql命令导入
mysql -u 用户名 -p 密码 testdb < dbname.sql	#testdb：库名，导入到指定库

#source命令导入
#登录
#创建数据库
create database testdb;
#使用
use test;
#设置编码
set names utf8;
#导入
source c:/dbname.sql

```

导出：

```sql
mysqldump -h [host] -P [port] -u [username] -p[passwd] [dbname] [tablename] --where="create_time>='2017-07-01' and is_current=1" --skip-lock-tables>dbname.sql
#示例
mysqldump -h 10.8.1.1 -P 3306 -u lj -pxxxxx wuchuang qnh_goods --where="id>9620" --skip-lock-tables>dbname.sql

#注意：导出包含表结构，导出的sql不能直接引用，直接引入的话会把原表数据清除!!
```

#### 远程操作

```sql
#连接访问权限等
#TODO..
```

#### 数据库操作

```mysql
create database database_name;
CREATE DATABASE database_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
show databases;

SHOW VARIABLES LIKE 'character_set_database';	#查看字符集
show create database database_name	#查库的字符集
alter database database_name default character set utf8	#修改默认字符集

ALTER DATABASE database_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

```

##### 表操作

```sql
#建表
SET FOREIGN_KEY_CHECKS=0;	#禁用外键检查

#建表
create table `test`(
	id int(11) not null auto_increment,
	name varchar(255) not null default '',
	age int(4) not null default 0,
	score decimal(10,2) NOT NULL default 0.00 COMMENT '',
	primary key (id)
)engine=innodb default charset=utf8 row_format=dynamic;

#删除表
drop table if exists test;

#查看表结构
desc test;
show columns from test; #同上
explain test;	#同上，更详细

#查看建表sql
SHOW CREATE TABLE my_table;

#查看表详细信息
SHOW TABLE STATUS LIKE 'your_table_name';
#查看表引擎
SELECT TABLE_NAME, ENGINE FROM information_schema.TABLES 
WHERE TABLE_SCHEMA = 'your_database_name' AND TABLE_NAME = 'your_table_name';

#表添加注释
ALTER TABLE my_table COMMENT='这是表的注释信息';

#查看表注释
SELECT TABLE_COMMENT 
FROM INFORMATION_SCHEMA.TABLES 
WHERE TABLE_SCHEMA = 'your_database_name' 
AND TABLE_NAME = 'your_table_name';
```

##### 列操作

```mysql
#添加列
alter table test add column sex int(1) not null default 0 comment '性别' after age;

#修改列类型
alter table test modify column sex char(3) not null default '0';
#修改列名+数据类型
alter table test change column sex sex_2 int(2) not null default 0;

#删除列
alter table test drop column sex;
```

##### 数据操作

```sql
#添加数据
insert into test (name,age) value("aaa",10);
insert into test(name,age) value("bbb",11);
#添加多条数据
insert into test values(null,'ccc',12,3333),(null,'ddd',22,444);

#查询数据
select * from test where id=1;

#修改数据
update test set name='ccc' where id=1;

#删除数据
delete from test where id=1;
```

#### 索引操作

```sql
#索引：
##创建索引：
CREATE INDEX indexName ON table_name (column_name)
##修改表索引：
ALTER table tableName ADD INDEX indexName(columnName)
##删除索引：
DROP INDEX [indexName] ON mytable; 
##显示索引：
SHOW INDEX FROM table_name\G		--\G表示格式化显示
```

#### 函数语句

```sql
#查询语句需某列为固定字符串：
#查询结果最后一列字段为'班级'，内容为'五年3班'
select name as '姓名',age as '年龄','五年3班' as '班级' from t_class;

#case条件判断
case 字段 
when 表达式 then 结果
when 表达式 then 结果
else 结果
```

#### 日期相关

```sql
#当前时间转字符串
date_format(now(),'%Y-%m-%d %w %H:%i:%s');	//%w为周，0为周天

#当前时间转时间戳
unix_timestamp(now());

#字符串转时间戳
unix_timestamp('2020-01-01')

#时间戳转字符串
from_unixtime(13434345454,'%Y-%m-%d');
```

