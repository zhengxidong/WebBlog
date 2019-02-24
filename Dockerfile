FROM zhengxidong/lnp7.2

COPY ./application /usr/local/nginx/html/www.itellyou.site/application 
COPY ./extend /usr/local/nginx/html/www.itellyou.site/extend  
COPY ./public /usr/local/nginx/html/www.itellyou.site/public  
COPY ./thinkphp /usr/local/nginx/html/www.itellyou.site/thinkphp 
COPY ./vendor /usr/local/nginx/html/www.itellyou.site/vendor 

# 安装配置https
#RUN wget https://dl.eff.org/certbot-auto && chmod a+x certbot-auto

# 生成证书
#RUN ./certbot-auto certonly --standalone --email `541410830@qq.com` -d `itellyou.site`

CMD ["/usr/bin/supervisord"]



