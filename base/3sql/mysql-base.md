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

#### 增删改查

```sql
#建表
SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for qnh_ikang_data
-- ----------------------------
DROP TABLE IF EXISTS `hwc_ikang_data`;
CREATE TABLE `hwc_ikang_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_sn` varchar(255) NOT NULL default "" COMMENT '体检订单号',
  `order_from` int(11) NOT NULL default 0 COMMENT '订单来源，此字段暂未使用',

  `out_order_sn` varchar(255) NOT NULL default "" COMMENT '爱康订单编号',
  `buy_date` varchar(255) NOT NULL default "" COMMENT '购买日期',
  `out_goods_name` varchar(255) NOT NULL default "" COMMENT '爱康套餐名称',
  `out_amount` decimal(10,2) NOT NULL default 0.00 COMMENT '采购金额',
  `is_bussiness_fee` int(11) NOT NULL default 0 COMMENT '是否作为商务费用,0否1是',
  `belong_to` varchar(255) NOT NULL default "" COMMENT '商务费用归属',

  `createtime` int(11) NOT NULL default 0 COMMENT '',
  `updatetime` int(11) NOT NULL default 0 COMMENT '',
  `status` int(11) NOT NULL default 0 COMMENT '',

  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#添加列
ALTER TABLE hwc_package ADD COLUMN package_settle_price decimal(10,2)  NOT NULL COMMENT '加项包结算价' after package_price;
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

