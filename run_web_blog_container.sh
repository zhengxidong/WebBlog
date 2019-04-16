#!/bin/bash

#停止容器
docker stop web-blog
#删除容器
docker rm web-blog
#删除镜像
#docker rm web-blog

#重build镜像
#./build_web_blog_image.sh

# 切换目录
#cd ..

# 更新
git pull

# 实例化容器
docker run -d --restart=always -p 8080:80 --name web-blog \
	-v /home/www/WebBlog/application:/usr/local/nginx/html/www.itellyou.site/application \
	-v /home/www/WebBlog/extend:/usr/local/nginx/html/www.itellyou.site/extend \
	-v /home/www/WebBlog/public:/usr/local/nginx/html/www.itellyou.site/public \
	-v /home/www/WebBlog/runtime:/usr/local/nginx/html/www.itellyou.site/runtime \
	-v /home/www/WebBlog/thinkphp:/usr/local/nginx/html/www.itellyou.site/thinkphp \
	-v /home/www/WebBlog/vendor:/usr/local/nginx/html/www.itellyou.site/vendor \
	-v /home/www/WebBlog/etc/nginx/conf.d/itellyou.site.conf:/etc/nginx/conf.d/itellyou.site.conf \
	-v /home/data/uploads:/usr/local/nginx/html/www.itellyou.site/public/static/uploads \
	blog
