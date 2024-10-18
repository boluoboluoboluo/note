--角色表
drop table if exists `bl_sys_role`;
create table `bl_sys_role`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`role_name` varchar(50) not null default '' comment "角色名称",
	`role_desc` varchar(500) not null default '' comment "角色描述",
	`role_action` text not null comment "角色权限，以英文逗号隔开得权限节点id",
	`createtime` int(11) not null default 0 comment "创建时间戳，秒",
	`updatetime` int(11) not null default 0 comment "更新时间戳，秒",
	`is_del` int(1) not null default 0 comment "是否逻辑删除状态，0正常1删除",

	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


--插入数据
insert into `bl_sys_role` (role_name,role_desc,role_action,createtime,updatetime) 
values('管理员','管理员权限','1,2',unix_timestamp(now()),unix_timestamp(now()));

insert into `bl_sys_role` (role_name,role_desc,role_action,createtime,updatetime) 
values('经理','经理权限','2',unix_timestamp(now()),unix_timestamp(now()));

insert into `bl_sys_role` (role_name,role_desc,role_action,createtime,updatetime) 
values('客服','管理员权限','3',unix_timestamp(now()),unix_timestamp(now()));


