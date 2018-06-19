use blog;

-- 文章表
CREATE TABLE `bg_article`(
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_title` text NOT NULL COMMENT '文章标题',
  `article_author` bigint(20) NOT NULL DEFAULT '0' COMMENT '文章作者,对应作者ID',
  `article_date` datetime NOT NULL COMMENT '新增时间',
  `article_excerpt` text NOT NULL COMMENT '摘录',
  `article_content` longtext NOT NULL COMMENT '文章内容',
  `cate_id` int(11) NOT NULL DEFAULT NULL COMMENT '栏目ID',
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

-- 访问记录表
CREATE TABLE `bg_access_records`(
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) DEFAULT NULL COMMENT 'ip地址',
  `article_id` int(11) DEFAULT NULL COMMENT '访问文章',
  `country_name` varchar(50) DEFAULT NULL COMMENT '国家名称',
  `province_name` varchar(50) DEFAULT NULL COMMENT '省名称',
  `city_name` varchar(50) DEFAULT NULL COMMENT '市名称',
  `area_name` varchar(50) DEFAULT NULL COMMENT '区/县名称',
  `access_time` datetime NOT NULL COMMENT '访问时间',
  `access_date` date NOT NULL COMMENT '访问日期',
  PRIMARY KEY (`id`),
  KEY `idx_article_id` (`article_id`),
  KEY `idx_country_name` (`country_name`),
  KEY `idx_province_name` (`province_name`),
  KEY `idx_city_name` (`city_name`),
  KEY `idx_area_name` (`area_name`),
  KEY `idx_access_date` (`access_date`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8 COMMENT='访问记录表';




-- 添加访问量字段
ALTER TABLE `bg_article` add article_views int(11) DEFAULT '0' COMMENT '访问量';

-- 给访问量字段加索引
ALTER TABLE `bg_article` add INDEX idx_article_views (article_views);


-- 添加赞字段
ALTER TABLE `bg_article` add article_like int(11) DEFAULT '0' COMMENT '赞';

-- 给赞字段加索引
ALTER TABLE `bg_article` add INDEX idx_article_like (article_like);

-- 资料地址表
CREATE TABLE `bg_url`(
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL COMMENT 'url地址',
  `url_title` varchar(50) DEFAULT NULL COMMENT 'url标题',
  `url_content` text DEFAULT NULL COMMENT 'url内容',
  `cate_id` int(11) DEFAULT NULL COMMENT '资料分类ID',
  `created_by` varchar(15) NOT NULL COMMENT '创建人',
  `created_on` datetime NOT NULL COMMENT '创建时间',
  `modify_by` varchar(15) DEFAULT NULL COMMENT '创建人',
  `modify_on` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `idx_url_title` (`url_title`),
  KEY `idx_cate_id` (`cate_id`),
  KEY `idx_created_on` (`created_on`)
)ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=UTF8 COMMENT='资料地址表';


-- 添加文章名称字段
ALTER TABLE `bg_access_records` add article_name varchar(150) DEFAULT '' COMMENT '文章名称';

-- 给访问记录表文章名称字段加索引
ALTER TABLE `bg_access_records` add INDEX idx_article_name (article_name);
