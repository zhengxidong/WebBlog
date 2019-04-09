## 部署

### nginx配置

重写地址
```js
location / {

     if (!-e $request_filename) {
         rewrite  ^(.*)$  /index.php?s=/$1  last;
         break;
     }
}
```

### 注意事项

访问站点出现以下错误

```js
file_put_contents(/usr/local/nginx/html/blog/runtime/temp/f8b69fbc1e64f49a2a62a21dd941bfea.php): failed to open stream: Permission denied
```

解决方法

赋予runtime目录下执行权限

> chmod 777 -R runtime
