--建表(菜单表)
drop table if exists `bl_sys_tab`;
create table `bl_sys_tab`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`tab_name` varchar(50) not null default '' comment "菜单(或权限节点)名称",
	`tab_level` int(1) not null default 0 comment "菜单级别，0一级菜单，1二级菜单，2三级节点",
	`parent_id` int(11) not null default 0 comment "所指向的父id",
	`icon` varchar(50) not null default '' comment "图标代码，一级菜单有显示图标",
	`mode_code` varchar(50) not null default '' comment "权限标识，唯一，在具体的后台请求方法配置该项，实现绑定",
	`jmp_url` varchar(50) not null default '' comment "跳转路径，点击二级菜单实现跳转",
	`ordering` int(11) not null default 0 comment "菜单排序",
	`createtime` int(11) not null default 0 comment "创建时间戳",
	`updatetime` int(11) not null default 0 comment "更新时间戳",

	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


