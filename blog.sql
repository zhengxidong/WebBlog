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
  `article_modified_on` datetime NULL DEFAULT NULL COMMENT '修改时间',
  `comment_count` bigint(20) NOT NULL DEFAULT '0' COMMENT '评论总数',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open' COMMENT '评论状态',
  PRIMARY KEY (`id`),
  KEY `idx_name` (`article_name`(191)),
  KEY `idx_date` (`article_status`,`article_date`,`id`),
  KEY `idx_author` (`article_author`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8 COMMENT='文章表';

-- 管理员表
CREATE TABLE `bg_admin`(
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(100) NOT NULL COMMENT '账号',
  `admin_password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `admin_email` varchar(255) NOT NULL COMMENT '邮箱',
  `admin_date` datetime NOT NULL COMMENT '创建时间',
  `admin_status` varchar(20) NOT NULL DEFAULT 'open' COMMENT '管理员状态，open为公开，close不公开',
  `admin_modified_on` datetime NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `idx_user` (`admin_user`(99)),
  KEY `idx_date` (`admin_status`,`admin_date`,`id`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8 COMMENT='管理员表';


-- 友情链接表
CREATE TABLE `bg_links`(
  `link_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '链接URL',
  `link_name` varchar(255) NOT NULL DEFAULT '' COMMENT '链接标题',
  `link_image` varchar(255) NOT NULL DEFAULT '' COMMENT '链接图片',
  `link_target` varchar(255) NOT NULL DEFAULT '' COMMENT '链接打开方式',
  `link_description` varchar(255) NOT NULL DEFAULT '' COMMENT '链接描述',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y' COMMENT '是否可见(Y/N)',
  `link_rss` varchar(255) NOT NULL DEFAULT '' COMMENT '链接RSS地址',
  `link_create` datetime NULL DEFAULT NULL COMMENT '新增时间',
  `link_updated` datetime NULL DEFAULT NULL COMMENT '最后一次更新时间',
  PRIMARY KEY (`link_id`),
  KEY `idx_link_id` (`link_id`),
  KEY `idx_visible` (`link_visible`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8 COMMENT='友情链接表';

-- 分类表
CREATE TABLE `bg_cate`(
  `cate_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(200) NOT NULL DEFAULT '' COMMENT '分类名称',
  `cate_slug` varchar(200) NOT NULL DEFAULT '' COMMENT '缩略名',
  `cate_parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属父分类ID',
  `cate_create_on` datetime NULL COMMENT '添加时间',
  `cate_update_on` datetime NULL COMMENT '更新时间',
  PRIMARY KEY (`cate_id`),
  KEY `idx_cate_id` (`cate_id`),
  KEY `idx_cate_name` (`cate_name`(191)),
  KEY `idx_cate_slug` (`cate_slug`(191)),
  KEY `idx_cate_parent_id` (`cate_parent_id`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8 COMMENT='栏目表';


-- 文章表增加字段及索引
alter TABLE `bg_article` add cate_id int(11) NOT NULL COMMENT '栏目ID';
ALTER TABLE `bg_article` add INDEX idx_cate_id (`cate_id`);
