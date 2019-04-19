FROM blog

COPY ./application /usr/local/nginx/html/www.itellyou.site/application
COPY ./extend /usr/local/nginx/html/www.itellyou.site/extend
COPY ./public /usr/local/nginx/html/www.itellyou.site/public
COPY ./runtime /usr/local/nginx/html/www.itellyou.site/runtime
COPY ./thinkphp /usr/local/nginx/html/www.itellyou.site/thinkphp
COPY ./vendor /usr/local/nginx/html/www.itellyou.site/vendor
COPY ./etc/nginx/conf.d/itellyou.site.conf /etc/nginx/conf.d/itellyou.site.conf

EXPOSE 80
CMD ["/usr/bin/supervisord"]
 
