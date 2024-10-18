--建表
drop table if exists `bl_sys_admin`;
create table `bl_sys_admin`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`admin_name` varchar(50) not null default "" comment "用户名",
	`password` varchar(500)  not null default "" comment "密码",
	`nick_name` varchar(100) not null default "" comment "昵称",
	`role_id` int(11) not null default 0 comment "角色id",
	`email` varchar(100) not null default ''comment "邮箱",
	`createtime` int(11) not null default 0 comment "创建时间戳",
	`updatetime` int(11) not null default 0 comment "更新时间戳",
	`is_del` int(1) not null default 0 comment "是否逻辑删除状态，0启用1停用",

	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
--插入数据,密码：123456
insert into `bl_sys_admin` (admin_name,password,nick_name,email,createtime,updatetime) 
values('admin','$2y$10$tOpw3S2m95f2by5BjwEN/uVd9fBMMW351emgnGz6zm53BCeeMVvy6','管理员','',unix_timestamp(now()),unix_timestamp(now()));


