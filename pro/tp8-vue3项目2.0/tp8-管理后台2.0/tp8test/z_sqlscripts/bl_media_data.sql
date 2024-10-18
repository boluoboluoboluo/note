--建表(media_data)
drop table if exists `bl_media_data`;
create table `bl_media_data`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(50) not null default '' comment "",
	`desc` text comment "description...",
	`type` int(1) not null default 0 comment "media type:article(0) or video(1) or music(2) or pic(3)",
	`url` varchar(255) not null default '' comment "media url,empty if article",
	`context` mediumtext comment "article content.",
	`ordering` int(11) not null default 0 comment "ordering.",
	`createtime` int(11) not null default 0 comment "",
	`updatetime` int(11) not null default 0 comment "",

	PRIMARY KEY (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


