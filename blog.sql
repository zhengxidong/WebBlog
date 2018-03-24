use blog;

-- 文章表
CREATE TABLE `bg_article`(
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_title` text NOT NULL COMMENT '文章标题',
  `article_author` bigint(20) NOT NULL DEFAULT '0' COMMENT '文章作者,对应作者ID',
  `article_date` datetime NOT NULL COMMENT '新增时间',
  `article_excerpt` text NOT NULL COMMENT '摘录',
  `article_content` longtext NOT NULL COMMENT '文章内容',
  `article_status` varchar(20) NOT NULL DEFAULT 'open' COMMENT '文章状态，open为公开，close不公开',
  `article_password` varchar(255) NOT NULL DEFAULT '' COMMENT '文章密码',
  `article_name` varchar(200) NOT NULL DEFAULT '' COMMENT '文章缩略名',
  `article_modified_on` datetime NOT NULL COMMENT '修改时间',
  `comment_count` bigint(20) NOT NULL DEFAULT '0' COMMENT '评论总数',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open' COMMENT '评论状态',
  PRIMARY KEY (`id`),
  KEY `idx_name` (`article_name`(191)),
  KEY `idx_date` (`article_status`,`article_date`,`id`),
  KEY `idx_author` (`article_author`)
)ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=UTF8 COMMENT='文章表';

-- 管理员表
CREATE TABLE `bg_admin`(
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(100) NOT NULL COMMENT '账号',
  `admin_password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `admin_email` varchar(255) NOT NULL COMMENT '邮箱',
  `admin_date` datetime NOT NULL COMMENT '创建时间',
  `admin_status` varchar(20) NOT NULL DEFAULT 'open' COMMENT '管理员状态，open为公开，close不公开',
  `admin_modified_on` datetime NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `idx_user` (`admin_user`(99)),
  KEY `idx_date` (`admin_status`,`admin_date`,`id`)
)ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=UTF8 COMMENT='管理员表';
