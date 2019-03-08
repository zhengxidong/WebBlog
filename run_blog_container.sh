#!/bin/bash

docker run -d -p 80:80 --name blog \
	-v ./application:/usr/local/nginx/html/www.itellyou.site/application \
	-v ./extend:/usr/local/nginx/html/www.itellyou.site/extend \
	-v ./public:/usr/local/nginx/html/www.itellyou.site/public \
	-v ./thinkphp:/usr/local/nginx/html/www.itellyou.site/thinkphp \
	-v ./vendor:/usr/local/nginx/html/www.itellyou.site/vendor \
	blog
