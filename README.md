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

```

解决方法

赋予runtime目录下执行权限

> chmod 777 -R runtime
